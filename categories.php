<?php
require'functions.php';
$pg_title = 'Categories | ✅ To Do List';


if($_SERVER['REQUEST_METHOD']== 'POST'){
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
    echo $title;
    if(empty($title)){
      $error_message = "Please fill in the Title of the Category";
      }else{
        if(add_category($title)){
            header('Location: categories.php');
            exit;
        }else{
            $error_message= "Could not add the new Category!";
        }
    }
  }
include('header.php');
?>

<h1>Your categories</h1>
<p>Use your cateogories to organise your work. Helping you prioritise your work load. You can add new ones buy completing the form below</p>
            <?php 
              if (isset($error_message)){
                echo "<p class='message'> $error_message</p>";
              }
            ?>

<form action="categories.php" method='POST'>
    <label>Category Name* &ensp;</label><input type="text" id="title" name="title" value="" required>
    <input class="button button--primary button--topic-php" type="submit" value="Submit" />
</form>

<div>
    <div><h3>Current Categories</h3></div>
    <?php
        foreach(get_categories() as $cat){
                echo'<div>';
                echo $cat['categoryTitle'];
                echo'</div>';
        }

    ?>
</div>