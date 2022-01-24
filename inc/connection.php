<?php
try{
$db = NEW PDO('sqlite:'.__DIR__.'/to-do.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo 'Connection Successful';
}catch (exception $e){
        echo "Error! Unable to connect to the database". $e->getMessage();
        exit;
}
