<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>To Do List Challenge</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <body>
        <h1>To Do List</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="text" name="addedItems"> 
            <input type="submit" value="Add">
        </form>
        
        <?php
            if(isset($_POST['addedItems'])){
                if(!(isset($_SESSION['list-items']))){
                    $_SESSION['list-items'] = array();
                    $_SESSION['list-items'][] = $_POST['addedItems'];
                }else {
                    $_SESSION['list-items'][]= $_POST['addedItems'];
                }
            }
                echo "<ul>";
                foreach($_SESSION['list-items'] as $item) {
                 echo "<li>".$item."</li>";
                }
                 echo "</ul>";
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>