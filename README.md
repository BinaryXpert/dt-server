# dt-server
Datatable server side processing


#Example 
On Server side just use

Add package via composer

```
composer require raza/datatable
```

```php
$dt = new datatables("localhost","5432","db_name","user_name","password");
$dt->setTable("tablename");
$dt->setPrimaryKey("key");

$dt->addColumn(array( 'db' => 'id', 'dt' => 0 , 'type' => 1 ));
$dt->addColumn(array( 'db' => 'first_name', 'dt' => 1 , 'type' => 2));
$dt->addColumn(array( 'db' => 'last_name', 'dt' => 2 , 'type' => 2));
$dt->addColumn(array( 'db' => 'email', 'dt' => 3 , 'type' => 2));
$dt->addColumn(array( 'db' => 'contact_no', 'dt' => 4 , 'type' => 2));
$dt->addColumn(array(
    'db'        => 'created_date',
    'dt'        => 5,
    'type'        => 99,
    'formatter' => function( $d, $row ) {
        return date( 'd-m-Y', strtotime($d));
    }
));
echo json_encode($dt->getData());
```
