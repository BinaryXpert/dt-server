<?php

namespace Raza\Datatable;


/**
 *  A Datable Class class
 *
 *  This is the Class to interact with database to fech data for datatabke jQuery plugin server side processing.
 *
 * @author Asim Raza
 */
class datatables
{

    /** @var string $_table_name hold the name of the table */
    public $table_name = '';

    /** @var string $_primary_key hold the name of the primary key */
    public $primary_key = '';

    /** @var mix $_colums hold the list of the columns */
    private $_colums = array();

    private $database;



    public function __construct($host, $port, $db_name, $user_name, $password)
    {
        $this->database = new database($host, $port, $db_name, $user_name, $password);

    }

    /**
     * Add Column
     *
     * Add column for datatable
     *
     * @param mix $param1 An array containing the parameter
     *
     * @return null
     */
    public function addColumn($param)
    {
        $this->_colums[] = $param;
    }

    /**
     * Fetch Data
     *
     * Get Data for datatable
     *
     * @return mix
     */
    public function getData(){

        return $this->database->simple($_GET, $this->table_name, $this->primary_key, $this->_colums);
    }



}