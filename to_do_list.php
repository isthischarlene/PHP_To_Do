<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>To Do List Challenge</title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>To Do List</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="text" name="addedItems"> 
            <input type="submit" value="Add">
        </form>
        
        <?php
            if($_POST) {
                echo "<ul>";
                foreach($_SESSION['list-items'] as $items) {
                "li".$items."</li>";
                }
                echo "</ul>";
            }


            if(isset($_POST['addedItems'])){
                if(!(isset($_SESSION['list-items']))){
                    $_SESSION['list-items'] = array();
                    $_SESSION['list-items'][] = $_POST['list-items'];
                    var_dump($_SESSION['list-items']);
                }else {
                    $_SESSION['list-items'][]= $_POST['addedItems'];
                    var_dump($_SESSION['list-items']);
                }
            }
        ?>
        
        <script>
           $(document).ready(function (){
            var tickedItem = 0;
            $("li").click(function (){
            if(tickedItem == 0) {
                $(this).css("text-decoration", "line-through");
                tickedItem = 1;
                console.log(tickedItem);
            } else {
                    $(this).css("text-decoration", "none");
                    tickedItem = 0;
                    console.log(tickedItem);
                };
            });
        });

        </script>

    </body>
</html>