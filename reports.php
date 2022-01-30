<?php
include('header.php');
include('functions.php');
?>

foreach(get_tasks() as $task){
    echo $task['taskTitle'];
}


<?php 
include('footer.php');
?>