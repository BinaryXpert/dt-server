# dt-server
Datatable server side processing


#Example 
On Server side just use

Add package via composer

```
composer require raza/datatable
```

```php
$dt->setTable("dr_iq.users u");
$dt->setPrimaryKey("u.id");
$dt->joinTable(array(
    'type' => "left",
    'table' => "dr_iq.user_group ug",
    'primary' => 'u.id',
    'secondary' => 'ug.user_id'
));
$dt->joinTable(array(
    'type' => "left",
    'table' => "dr_iq.organization o",
    'primary' => 'o.id',
    'secondary' => 'ug.organization_id'
));

$dt->addColumn(array( 'db' => 'u.id', 'alies' => 'uid',  'dt' => 0 , 'type' => 1 ));
$dt->addColumn(array( 'db' => 'first_name', 'alies' => '', 'dt' => 1 , 'type' => 2));
$dt->addColumn(array( 'db' => 'last_name', 'alies' => '', 'dt' => 2 , 'type' => 2));
$dt->addColumn(array( 'db' => 'email', 'alies' => '', 'dt' => 3 , 'type' => 2));
$dt->addColumn(array( 'db' => 'o.name', 'alies' => 'org_name', 'dt' => 4 , 'type' => 2));
$dt->addColumn(array(
    'db'        => 'u.created_date',
    'alies' => 'user_created_date',
    'dt'        => 5,
    'type'        => 99,
    'formatter' => function( $d, $row ) {
        return date( 'd-m-Y', strtotime($d));
    }
));

echo json_encode($dt->getData());
```
