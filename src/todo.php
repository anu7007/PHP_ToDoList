<?php
session_start();
?>

<html>
    <head>
        <title>TODO List</title>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form action="function.php" method="POST">
            <h2>TODO LIST</h2>
            <h3>Add Item</h3>
            <input id="new-task" type="text" name="input" value="<?php echo $_SESSION['myVar']; ?>"><button name="addBtn">
                <?php
                if($_SESSION['count']==0){
                    ?>
                    Add
                <?php
                }else{
                    ?>
                    Update
                <?php
                $_SESSION['count']=0;
                }
                ?></button>
            </form>
    
            <h3>Todo</h3>
            <ul id="incomplete-tasks">
                <?php if(isset($_SESSION['todo'])){
            foreach($_SESSION['todo'] as $key => $value){
                echo '<form action="function.php" method="POST"><li><input type="checkbox" onchange="this.form.submit()" name="check"><label>.'.$value.'</label><input type="text"><button class="edit" name="editButton">Edit</button><button class="delete" name="deleteBtn">Delete</button></li><input type="text" hidden name="mVal" value="'.$key.'"></form>';
            }
        } ?>
            </ul>
    
            <h3>Completed</h3>
            <ul id="completed-tasks">
                 <?php 
                if(isset($_SESSION['checkBox'])){
                    foreach($_SESSION['checkBox'] as $key1=>$value1){
                        echo '<form action="function.php" method="POST"><li><input type="checkbox" checked><label>.'.$value1.'</label><input type="text"><button class="edit" name="editButton2">Edit</button><button class="delete" name="deleteBtn2">Delete</button></li><input type="text" hidden name="mVal" value="'.$key1.'"></form>';
                    }
                }
                ?> 
                </ul>
        </div>
        

    </body>
</html>