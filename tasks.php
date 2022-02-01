<?php
include('functions.php');
$pg_title = '✅ To Do List | What do you need to get done today?';


if($_SERVER['REQUEST_METHOD']== 'POST'){
    $title = trim(filter_input(INPUT_POST, "task_title", FILTER_SANITIZE_STRING));
    $category_id = trim(filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_NUMBER_INT));
    $description = filter_input(INPUT_POST, 'task_description', FILTER_SANITIZE_STRING);
    $task_date = filter_input(INPUT_POST, 'task_date', FILTER_SANITIZE_STRING);



    //echo $title;
    if(empty($title) || empty($category_id)|| empty($description)|| empty($task_date)){
      $error_message = "Please fill in all of the form fields below";
      }else{
        if(add_task($title,$category_id, $description, $task_date)){
            header('Location: reports.php');
            exit;
        }
    }
  }
include('header.php');

?>

<h1>What do you need to get done today?</h1>
<?php 
              if (isset($error_message)){
                echo "<p class='message'> $error_message</p>";
              }
            ?>

<form action="tasks.php" method='POST'>
<div>   
<label>Title*<input type="text" name="task_title" required></label>
</div> 
<div>
    <label>Category
        <select name='category_id'>
                <option> Select One...</option>
                <?php
                    foreach(get_categories() as $cat){
                    echo"<option name='category_id' value='".$cat['category_id']."'>";
                    echo $cat['categoryTitle'];
                    echo'</option>';
                    }
                ?>
            </select>
    </label>
            
</div>
    <div>
            <label>Due Date*<input type="date" name="task_date" required></label>
            </div>
            <div>
                <label>Description*<textarea name="task_description" required></textarea></label>
            </div>
            <div>
            <input class="button button--primary button--topic-php" type="submit" value="Submit" />
            </div>
                        
    
</form>

<?php 
include('footer.php');
?>