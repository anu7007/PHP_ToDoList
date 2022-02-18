<?php
	session_start();
	if(!ISSET($_SESSION['todo'])){
		$_SESSION['todo']=array();
    }
    include('function.php');
    if(isset($_GET['action'])){
        $task = $_GET['task'];
        switch ($_GET['task']){
            case "add":
                add($task);
                break;
            case "delete":
                delete($_GET['id']);
                break;
            case "update":
                update($_GET['task'], $_GET['id']);
                break;
            case "check":
                complete($_GET['id']);
                break;
        }
    }
    ?>



<html>
    <head>
        <title>TODO List</title>
        <link href="style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container">
            <h2>TODO LIST</h2>
            <h3>Add Item</h3>
            <p>
                <form action="" method="GET">
                    <?php
                    if($_GET['action']=='edit'){
                        ?>
                <input id="new-task" type="text" name="task" value=<?php gettsk($_GET['id']); ?>>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <input type="submit" name="add" value="Update"/>

            </p>
            <?php
                    }
                    else {
                        ?>
                        <input id="new-task" type="text" name="task" value=<?php if($_GET['action']=="edit"){
                            ?>
                            <?php
                            gettsk($_GET['id']);
                            ?><?php } else {
                                ?>
                                 ""
                                 <?php } 
                                ?>
                                 <input type="submit" name="add" value="Update"/>
                            <?php } ?>
                        
                            </form>

            <h3>Todo</h3>
            <ul id="incomplete-tasks">
                <?php display(); ?>
            </ul>
    
            <h3>Completed</h3>
            <ul id="completed-tasks">
           <?php display2(); ?>
        </ul>
        </div>
    
    </body>
</html>