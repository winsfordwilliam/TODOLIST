<?php
include('functions.php');


if($_SERVER['REQUEST_METHOD']== 'POST'){
    $task_id = trim(filter_input(INPUT_POST, "task_id", FILTER_SANITIZE_NUMBER_INT));
    $task_title = trim(filter_input(INPUT_POST, "edited_task_title", FILTER_SANITIZE_STRING));
    $task_category = trim(filter_input(INPUT_POST, "edited_category_id", FILTER_SANITIZE_NUMBER_INT));
    $task_date = trim(filter_input(INPUT_POST, "edited_date", FILTER_SANITIZE_STRING));
    $task_description = trim(filter_input(INPUT_POST, "edited_description", FILTER_SANITIZE_STRING));

    $task_id = intval($task_id);
            if(empty($task_title)||empty($task_category)||empty($task_date)||empty($task_description)){
                $errorMessage = "please fill in all the form fields";
            }else{
                $edited_task = edit_task($task_id, $task_title, $task_category, $task_date, $task_description);
                $success_message = "Successfully updated";
                header('location:reports.php');
                exit;
            }
}?>

