<?php
include('functions.php');

$pg_title = "Edit your task here! ✅ To Do List";
include('header.php');

if($_SERVER['REQUEST_METHOD']== 'GET'){
    $task_id = $_GET['id'];
}

if(isset($task_id)){
    var_dump($task_id);
    $task = get_task($task_id);
    var_dump($task);
}elseif(empty($task_id)){
    $errorMessage = "Please go to <a href='reports.php'> the reports page </a> and choose a task to edit.";
}
?>

<?php
    if(isset($errorMessage)){
        echo "<p class='message'>$errorMessage</p>";
    }
?>

<?php echo $task["title"]?>

<form action="edit.php" method='POST'>

<div>   
<label>Title*<input type="text" name="task_title" value='' required></label>
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
                <label>Description*<textarea name="task_description" value='<?php echo $task['description']?>' required></textarea></label>
            </div>
            <div>
            <input class="button button--primary button--topic-php" type="submit" value="Submit" />
            </div>
                        
    
</form>

<?php 
include('footer.php');
?>