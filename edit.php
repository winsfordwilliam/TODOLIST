<?php
include('functions.php');

$pg_title = "Edit your task here! ✅ To Do List";
include('header.php');

if($_SERVER['REQUEST_METHOD']== 'GET'){
    $task_id = trim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT));
}

if(isset($task_id)){
    $task = get_task($task_id);
}else{
    $errorMessage = "Please go to <a href='reports.php'> the reports page </a> and choose a task to edit.";
}
?>

<?php
    if(isset($errorMessage)){
        echo "<p class='message'> $error_message</p>";
    }
?>

<?php 
include('footer.php');
?>