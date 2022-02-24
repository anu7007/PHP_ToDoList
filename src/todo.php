<?php
session_start();
if (!isset($_SESSION['todo'])) {

    $_SESSION['todo'] = array();
}
include('function.php');
if (isset($_GET['action'])) {

    $tsk = $_GET['tsk'];


    switch ($_GET['action']) {


        case "add":
            add($tsk);
            break;

        case 'delete':
            delete($_GET['id']);
            break;

        case "update":
            update($_GET['tsk'], $_GET['idd']);
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
            if ($_GET['action'] == 'edit') {

            ?>

                <input id="new-task" type="text" name="tsk" value=<?php gettsk($_GET['id']) ?>>>


                <input type="hidden" name="idd" value=<?php echo $_GET['id']; ?>>

                <input type="submit" name="action" value="update">>


            <?php } else { ?>
                <input id="new-task" type="text" name="tsk" value=<?php
                                                                    if ($_GET['action'] == 'edit') {
                                                                    ?>
                                                                    <?php

                                                                        gettsk($_GET['id']);
        
                                                                        ?> 
                                                                        <?php 
                                                                    } else 
                                                                    { ?>
                                                                    "" <?php 
                                                                } 
                                                                ?>>
                <input type="submit" name="action" value="add">

            <?php } ?>


        </form>
        </p>

        <h3>Todo</h3>
        <ul id="incomplete-tasks">

            <?php display(); ?>
        </ul>

        <h3>Completed</h3>
        <ul id="completed-tasks">

            <?php display2() ?>
        </ul>
    </div>

</body>

</html>