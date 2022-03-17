<?php
session_start();
//add items in todo list
if(isset($_POST['addBtn'])){
    if(!empty($_POST['input'])){
    if(isset($_SESSION['todo'])){
        array_push($_SESSION['todo'],$_POST['input']);
    }
else{
        $_SESSION['todo']=array($_POST['input']);

    }
    }
}
//edit button
if(isset($_POST['editButton'])){
    $_SESSION['myVar']=$_SESSION['todo'][$_POST['mVal']];
    // unset($_SESSION['todo'][$_POST['mVal']]);
    if(isset($_SESSION['myVar'])){
        $_SESSION['count']=1;
    }else{
        $_SESSION['count']=0;
    }
}
if(isset($_POST['updateBtn'])){
    $_SESSION['count']=0;
    $_SESSION['myVar']=$_SESSION['todo'][$_POST['mVal']];
    $_SESSION['todo'][$_POST['mVal']] = $_POST['input'];
    array_splice($_SESSION['todo'],$_POST['mVal'],1); 
    if(isset($_SESSION['myVar'])){
        $_SESSION['count']=1;
    }else{
        $_SESSION['count']=0;
    }
}
//delete button
if(isset($_POST['deleteBtn'])){
    unset($_SESSION['todo'][$_POST['mVal']]);
}
// add item in checkbox
if(isset($_POST['check'])){
    $_SESSION['val2']=$_SESSION['todo'][$_POST['mVal']];
    unset($_SESSION['todo'][$_POST['mVal']]);
    if(isset($_SESSION['checkBox'])){
    array_push($_SESSION['checkBox'],$_SESSION['val2']); 
}else{
    $_SESSION['checkBox']=array($_SESSION['val2']);
}
}
//edit and delete
if(isset($_POST['editButton2'])){
    $_SESSION['myVar']=$_SESSION['checkBox'][$_POST['mVal']];
    unset($_SESSION['checkBox'][$_POST['mVal']]);
    if(isset($_SESSION['myVar'])){
        $_SESSION['count']=1;
    }else{
        $_SESSION['count']=0;
    }
}
if(isset($_POST['deleteBtn2'])){
    unset($_SESSION['checkBox'][$_POST['mVal']]);
}

header('location: todo.php');
?>