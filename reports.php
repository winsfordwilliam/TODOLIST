<?php
$pg_title = "Reports | ✅ TO DO List applicaiton";

include('functions.php');

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $task_id = trim(filter_input(INPUT_POST, "task_id", FILTER_SANITIZE_NUMBER_INT));
    $edit_task =trim(filter_input(INPUT_POST, "edit_task", FILTER_SANITIZE_NUMBER_INT));
}

if(isset($task_id)){
    remove_task($task_id);
    header('location:reports.php');
    exit;
}else if(isset($edit_task)){
    header("location:edit.php?id=$edit_task");
    exit;
}

include('header.php');

?>

<div><h3>Your on going tasks</h3>
    <div class="list-container">
    <table>
            <?php 
                $tasks = get_tasks();
                foreach($tasks as $task){
                
                echo "<tr class='category_list'>";
                echo "<td class='reports-title'>";
                echo $task['title'];
                echo "</td>";
                echo "<td style='display:flex;'>";
                echo "<form class='edit-button'action='reports.php' method='POST'>";
                echo "<button  style='border: none; background:transparent; cursor: pointer;' type='submit' name='edit_task' value='".$task['id'].">'"."<i class='fas fa-pencil-alt fa-2x'></i>"."</button>";
                echo "</form>";
                echo "<form class='remove-button' action='reports.php' method='POST'>";
                echo "<button style='border: none; background:transparent; cursor: pointer;' type='submit' name='task_id' value='".$task['id'].">'"."<i class='far fa-times-circle fa-2x' ></i>"."</button>";
                echo "</form>";
                echo "</tr>";
                echo "<tr class='category_list'>";
                echo "<td style='background-color: #F0B800; border-radius: 5px; padding: 3px 8px;'>";
                echo $task['dueDate'];
                echo"</td>";
                echo "<td style='margin-left: -100px;'>";
                echo $task['categoryTitle'];
                echo"</td>";
                echo "</tr>";
                echo "<tr class='category_list'>";
                echo "<td class='description'>";
                echo $task['description'];
                echo"</td>";
                echo "</tr>";
                
                echo "</tr>";
            }
            ?>
        </table>
            
    </div>
    </div>

<?php 
include('footer.php');
?>
