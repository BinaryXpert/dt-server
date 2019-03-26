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
    private $_table_name = '';

    /** @var string $_primary_key hold the name of the primary key */
    private $_primary_key = '';

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
     * Add Column
     *
     * Add column for datatable
     *
     * @param mix $param1 An array containing the parameter
     *
     * @return null
     */
    public function setTable($param)
    {
        $this->_table_name = $param;
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
    public function setPrimaryKey($param)
    {
        $this->_primary_key = $param;
    }

    /**
     * Fetch Data
     *
     * Get Data for datatable
     *
     * @return mix
     */
    public function getData(){

        return $this->database->fetchData($_GET, $this->_table_name, $this->_primary_key, $this->_colums);
    }



}