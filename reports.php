<?php
$pg_title = "Reports | ✅ TO DO List applicaiton";

include('functions.php');

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $task_id = trim(filter_input(INPUT_POST, "task_id", FILTER_SANITIZE_NUMBER_INT));
}

if(empty($task_id)){
    $error_mesage = "Unable to remove the task from the database";
}else if(remove_task($task_id)){
    header('location:reports.php');
    exit;
}

include('header.php');

?>

<div><h3>Your on going tasks</h3>
    <div class="list-container">
            <?php 
                $tasks = get_tasks();
                foreach($tasks as $task){
                
                echo "<table>";
                echo "<tr>";
                echo "<div class='category_list'>";
                echo "<td class='category_title'>";
                echo $task['title'];
                echo "</td>";
                echo "<td style='margin: auto 20px;'>";
                echo "<form action='reports.php' method='POST'>";
                echo "<button style='border: none; background:transparent; cursor: pointer;' type='submit' name='task_id' value='".$task['id'].">'"."<i class='far fa-times-circle fa-lg' ></i>"."</button>";
                echo "</form>";
                echo "</div>";
                echo "</tr";
                echo "<tr>";
                echo "<td>";
                echo $task['dueDate'];
                echo"</td>";
                echo "<td>";
                echo $task['category'];
                echo"</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo $task['description'];
                echo"</td>";
                echo "</tr>";
                
                echo "</tr>";
                echo "</table>";
            }
            ?>
    </div>
    </div>
    <div>
        <table>
            <tr><td>Title</td><td>Edit</td><td>Delete</td></tr>
            <tr><td>date</td><td>Category</td></tr>
            <tr><td>Decription</td></tr>
        </table>
    </div>
<?php 
include('footer.php');
?>
