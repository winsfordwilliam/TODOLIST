<?php
$pg_title = '✅ To Do List';
include('header.php');
include('functions.php');

?>

<h1>What do you need to get done today?</h1>

<form action="reports.php" method='get'>
    <label>Title*</label><input type="text" id="task_title" required>
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
    <label>Description</label><input type="text" id="task_description" required>
    <label>Due Date</label><input type="date" value="task_date" required>
</form>