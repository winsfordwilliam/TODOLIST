<?php
//Collecting the categories

function get_categories(){
    include('inc/connection.php');
    try{
       return $db -> query('SELECT * FROM categories');
    }catch(exception $e){
        echo 'Error retrieving the information from the database. </br>'.$e -> getMessage();
        return array();
    }
}


function add_category($title){
    include('inc/connection.php');
    try{
        $results = $db -> prepare("INSERT INTO categories (category_id, categoryTitle) VALUES (null, ?)");
        $results -> bindValue(1, $title, PDO::PARAM_STR);
        $results -> execute();
    } catch (exception $e){
        echo 'Error retrieving the information from the database. </br>'.$e->getMessage();
        return array();
    }
}

function remove_category($category_id){
    include('inc/connection.php');
    try{
        $results = $db -> prepare('DELETE FROM categories WHERE category_id = ?');
        $results -> bindValue(1, $category_id, PDO::PARAM_INT);
        $results -> execute();
    }catch (exception $e){
        echo "Error! Unable to remove this from the database ". $e->getMessage();
    }
}

function add_task($title, $category_id, $description, $task_date){
    include('inc/connection.php');
    try{
        $results = $db -> prepare('INSERT INTO tasks (title, category, description , dueDate) VALUES (?,?,?,?)');
        $results -> bindValue(1, htmlspecialchars($title), PDO::PARAM_STR);
        $results -> bindValue(2, $category_id, PDO::PARAM_INT);
        $results -> bindValue(3, htmlspecialchars($description), PDO::PARAM_STR);
        $results -> bindValue(4, $task_date, PDO::PARAM_STR);
        $results -> execute();
    }catch (exception $e){
        echo "Error! Unable to add this task ". $e->getMessage();
    }
}

function get_tasks(){
    include('inc/connection.php');
    try{
      return $tasks = $db -> query('SELECT * FROM tasks JOIN categories ON tasks.category=categories.category_id');
    }catch(exception $e){
        echo 'Error retrieving the tasks from the database. </br>'.$e -> getMessage();
        return array();
    }
}

function remove_task($task_id){
    include('inc/connection.php');
    try{
        $results = $db -> prepare('DELETE FROM tasks WHERE id = ?');
        $results -> bindValue(1, $task_id, PDO::PARAM_INT);
        $results -> execute();
    }catch (exception $e){
        echo "Error! Unable to remove this from the database ". $e->getMessage();
    }
}

function edit_task($task_id, $task_title, $task_category, $task_date, $task_description){
    include('inc/connection.php');
    try{
            $results = $db -> prepare("UPDATE tasks SET title = ?, category = ?, description = ?, dueDate = ? WHERE id = ? ");
            $results -> bindValue(1, $task_title, PDO::PARAM_STR);
            $results -> bindValue(2, $task_category, PDO::PARAM_INT);
            $results -> bindValue(3, $task_description, PDO::PARAM_STR);
            $results -> bindValue(4, $task_date, PDO::PARAM_STR);
            $results -> bindValue(5, $task_id, PDO::PARAM_INT);
            $results -> execute();

    }catch(exception $e){
        echo "Error! Unable to update the task!".$e->getMessage();
    }
}

function start_edit($task_id){

}


function get_task($id = null ){
    include('inc/connection.php');

    $sql= "SELECT * FROM tasks JOIN categories ON tasks.category=categories.category_id";
    $where = "";

    if(isset($id)){
        $where = " WHERE id = $id";
    }

    try{
      $tasks = $db -> prepare($sql.$where);
      $tasks -> execute();
      return $tasks ->fetchAll(PDO::FETCH_ASSOC);

    }catch(exception $e){
        echo 'Error retrieving the task from the database. </br>'.$e -> getMessage();
        return array();
    }
}