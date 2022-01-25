<?php
include('functions.php');
$pg_title = '✅ To Do List';


if($_SERVER['REQUEST_METHOD']== 'POST'){
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
    $project_id = filter_input(INPUT_POST, 'project_id', FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST, 'task_description', FILTER_SANITIZE_STRING);
    $task_date = filter_input(INPUT_POST, 'task_date', FILTER_SANITIZE_STRING);

    

    //echo $title;
    if(empty($title)){
      $error_message = "Please fill in all of the form fields below";
      }else{
        if(add_category($title)){
            header('Location: tasks.php');
            exit;
        }else{
            $error_message= "An Error occured! Could not add the new Task!";
        }
    }
  }
include('header.php');


?>

<h1>What do you need to get done today?</h1>

<form action="reports.php" method='get'>
<div>   
<label>Title*</label><input type="text" id="task_title" required>
<?php 
              if (isset($error_message)){
                echo "<p class='message'> $error_message</p>";
              }
            ?>
</div> 
<div>
    <label>Category</label>
                        <select>
                            <option> Select One...</option>
                            <?php
                               foreach(get_categories() as $cat){
                                echo'<option value="'.$cat['category_id'].'">';
                                echo $cat['categoryTitle'];
                                echo'</option>';
                               }
                            ?>
                        </select>
                        </div>
    <div>
    <label>Description</label><input type="text" id="task_description" required>
    </div>
    <div>
    <label>Due Date</label><input type="date" value="task_date" required>
    </div>
</form>