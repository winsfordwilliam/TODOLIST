<?php
include('header.php');
include('functions.php');

foreach(get_tasks() as $task){
    echo $task['taskTitle'];
}


include('footer.php');