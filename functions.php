<?php
//Collecting the categories

function get_categories(){
    include('inc/connection.php');
    try{
       return $db -> query('SELECT * FROM categories');

    } catch (exception $e){
        echo 'Error retrieving the information from the database. </br>'.$e -> getMessage();
        return array();
    }
}


function add_category($title){
    include('inc/connection.php');
    try{
       $results = $db -> prepare("INSERT INTO categories (categoryTitle) VALUES('?')");
       $results -> bindValue(1, $title, PDO::PARAM_STR);
       $results -> execute();

    } catch (exception $e){
        echo 'Error retrieving the information from the database. </br>'.$e->getMessage();
        return array();
    }
}