<?php
require'functions.php';
$pg_title = 'Categories | ✅ To Do List';


if($_SERVER['REQUEST_METHOD']== 'POST'){
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
    $category_id = trim(filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT));
    //echo $title;
    
    if(isset($category_id)){
        remove_category($category_id);
         
    }

    if(empty($title) && empty($cateogry_id)){
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
               //if (isset($error_message)){
               // echo "<p class='message'> $error_message</p>";
               // }
            ?> 

<form action="categories.php" method='POST'>
    <label>Category Name* &ensp;</label><input type="text" id="title" name="title" value="" required>
    <input class="button button--primary button--topic-php" type="submit" value="Submit" />
</form>

<div>
    <div><h3>Current Categories</h3></div>
        <div class="list-container">
            <?php
                foreach(get_categories() as $cat){
                        echo"<div class='category_list'>";
                        echo"<div class='category_title'>";
                        echo $cat['categoryTitle'];
                        echo'</div>';
                        echo"<div style='margin: auto 20px;'>";
                        echo "<form action='categories.php' method='POST'>";
                        echo "<button style='border: none; background:transparent; cursor: pointer;' type='submit' name='category_id' value='".$cat['category_id'].">'"."<i class='far fa-times-circle fa-2x' ></i>"."</button>";
                        echo "</form>";
                        echo'</div>';
                        echo'</div>';
                }
            ?>
        </div>
</div>

<?php 
include('footer.php');
?>