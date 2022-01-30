<?php
$pg_title = "Reports | ✅ TO DO List applicaiton";
include('header.php');
include('functions.php');
?>

<?php foreach(get_tasks() as $task){
    echo $task['taskTitle'];
}
?>


<?php 
include('footer.php');
?>