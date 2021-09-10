<?php


//config of data base
$host     = "localhost";
$user     = "root";
$password = "";
$database = "todo_list";

$connect = mysqli_connect($host, $user, $password, $database);
//add task to the list
if(isset($_POST['add'])){
    $task=$_POST['task'];

    $insert      = "INSERT INTO `list` VALUES (NULL,'$task',0)";
    $insertQuery = mysqli_query($connect, $insert);
   
}
//show tasks
 $select="SELECT * FROM `list` ";
    $selectQuery = mysqli_query($connect, $select);
//delete task from the list
    if(isset($_GET['delete'])){
     $del_id = $_GET["delete"];
        $delete  = "DELETE FROM `list`  WHERE id = $del_id ";
        $deleteQuery = mysqli_query($connect, $delete);
    }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
    *{
        color:honeydew;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; 
    }
</style>

</head>
<body>
    <div class="top"   >
      
        <img src="2.png" alt="" style="width:70%; height:400px;  margin-left:180px; ">
          <h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color:gray; text-align:center;">To Do List</h1>
    </div>
<!-- form to add new task-->
<form  method="post"class=" container col-4 mt-5  input-group mb-3 ">
  <input type="text" class="form-control" placeholder="Add Task" aria-label="Recipient's username" aria-describedby="button-addon2" name=
  "task">
  <button class="btn btn-outline-secondary"  name="add" type="submit" id="button-addon2">Add</button>
</form>
<!-- list of tasks-->
<div class=" container col-6 mt-5 list-group">
  <?php  foreach( $selectQuery as $selected){?>

  <label  style="background-color:#F0D9FF
;"class="list-group-item">
  <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input"  id="btnControl">
 <?php echo  $selected['task'] ; ?>
<a  style=" text-decoration: none; color:black; float:right;" class="btn btn-secondary" name="delete" href="/todo/list.php?delete=<?php echo$selected["id"]; ?>"><i class="material-icons" >delete_forever</i></i>


</a>

 
  </label> <?php } ?>

</div>  
</body>
</html>



