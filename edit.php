<?php
include('functions.php');

$pg_title = "Edit your task here! ✅ To Do List";
include('header.php');


if($_SERVER['REQUEST_METHOD']== 'GET'){
    $edit_task_id = $_GET['id'];
    if(isset($edit_task_id)){
        //var_dump($edit_task_id);
        $editing_task = get_task($edit_task_id);
        //var_dump($editing_task);
    }elseif(empty($edit_task_id)){
        $errorMessage = "Please go to <a href='reports.php'> the reports page </a> and choose a task to edit.";
    }
};



?>

<h1> Edit your task</h1>
<?php
    if(isset($errorMessage)){
        echo "<p class='message'>$errorMessage</p>";
    }elseif(isset($success_message)){
        echo"<p class='suc_message'>".$success_message."</p>";
    }
?>
<form action="editing_task.php" method='POST'>

<div>   
<label>Title*<input type="text" name="edited_task_title" value='<?php echo $editing_task[0]["title"];?>' required></label>
</div> 
<div>
    <label>Category
        <select name='edited_category_id'>
                <option value="<?php echo $editing_task[0]['category'];?>"> <?php echo "Current Cateogry is '".$editing_task[0]["categoryTitle"]."'";?></option>
                <?php
                    foreach(get_categories() as $cat){
                    echo"<option name='edited_category_id' value='".$cat['category_id']."'>";
                    echo $cat['categoryTitle'];
                    echo'</option>';
                    }
                ?>
            </select>
    </label>
            
</div>
    <div>
            <label>Due Date*<input type="date" name="edited_date" value="<?php echo $editing_task[0]['dueDate'];?>" required></label>
            </div>
            <div>
                <label>Description*<textarea name="edited_description" required><?php echo $editing_task[0]['description']?> </textarea></label>
            </div>
            <input type='hidden' name='task_id' value='<?php echo $editing_task[0]['id'];?>'>
            <div>
            <input class="button button--primary button--topic-php" type="submit" value="Submit" />
            </div>
                        
    
</form>

<?php 
include('footer.php');
?>