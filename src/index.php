<?php 
session_start(); 
$op = $_GET['op']; 
$input= ""; 
$opVal = 'Add'; 
$editId = 0; 
switch($op) 
{     
case 'edit':
$input= $_SESSION['list'][$_GET['id']];   
$opVal = 'Update';        
$editId = $_GET['id'];     
break;     
case 'editd':        
$input= $_SESSION['todo'][$_GET['id']];        
$opVal = 'update';       
$editId = $_GET['id']; 
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <style>
    <?php include('style.css');
    ?>
    </style>
</head>

<body>
    <div class="container">
        <h2>TODO LIST</h2>
        <h3>Add Item</h3>
        <p>
        <form action="operation.php<? echo " /id=" . $editId ?>" method="post">
            <input id="new-todo" name='todo' type="text" value="<? echo $input; ?>">
            <input type='submit' name='btn' value='<? echo $opVal; ?>'>
        </form>
        </p>
        <h3>Todo</h3>
        <ul id="incomplete-todos">
            <? if (gettype($_SESSION['list']) == 'array') {
           foreach ($_SESSION['list'] as $k => $v) { ?>
            <li>
                <input type="checkbox" onclick="location.href ='/operation.php?op=c&id=<? echo $k; ?>'" />
                <label>
                    <? echo $v ?>
                </label>
                <a style="margin: 5px;" href="/?op=edit&id=<? echo $k ?>" class="edit">Edit</a>
                <a style="margin: 5px;" href="/operation.php?op=del&id=<? echo $k ?>">Delete</a>
            </li>
            <? }
        } ?>
        </ul>
        <h3>Completed</h3>
        <ul id="completed-todos">
            <? if (gettype($_SESSION['todo']) == 'array') {
   foreach ($_SESSION['todo'] as $k => $v) {
        ?>
            <li>
                <input type="checkbox" checked />
                <label>
                    <? echo $v ?>
                </label>
                <a style="margin: 5px;" href="/?op=editd&id=<? echo $k ?>" class="edit">Edit</a>
                <a style="margin: 5px;" href="/operation.php?op=deld&id=<? echo $k ?>">Delete</a>
            </li>
            <? }
        } ?>
        </ul>
    </div>
</body>

</html>