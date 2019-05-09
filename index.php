<!-- Adding a session start that will be used to in the program to help keep the list items saved when the user refreshes the page or adds another item to the list-->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>To List Application</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    </head>
    <body>
       <h1 class="heading">To Do List</h1>
       <p class="sub-heading"> Helping you stay organised</p>
       <!-- Form for user to input to-do list items-->
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
           <input type="text" name="addedItems" class="inputBox" required autofocus>
           <input type="submit" value="Add">
       </form>

       <?php
       // isset function that will take what the user inputs and adds it into an array of list-items (in the Session variable). 
           if(isset($_POST['addedItems'])){
               if(!(isset($_SESSION['list-items']))){
                   $_SESSION['list-items'] = array();
                   $_SESSION['list-items'][] = $_POST['addedItems'];
                   itemUpdate();
               }else {
                   $_SESSION['list-items'][]= $_POST['addedItems'];
                  itemUpdate();
               };
           }

        //function that adds item user added to the list   
         function itemUpdate(){   
            echo '<div class="displayItem"';
            echo "<ul>";
            foreach($_SESSION['list-items'] as $item) {
            echo "<li>".$item."</li>";
            }
            echo "</ul>";
            echo '</div>';
            }   
        ?>

        <script>
          $(document).ready(function (){
            //the variable where the clicked items will be stored
           var tickedItem = 0;

           //the function that runs when the user clicks on an item
           $("li").click(function (){
                var numCheck = $(this).index();
                console.log(numCheck);

           //conditonal for if the list item is not initially struckthorugh, then give the list item an in     
           if(tickedItem == 0) {
               $(this).css("text-decoration", "line-through");
               sessionStorage.setItem($(this).index(),1);
               tickedItem = 1;
               console.log(tickedItem);
           } else {
               //conditional - if the list item is not clicked, then the list item should not have a strikethrough line through it
               $(this).css("text-decoration", "none");
               tickedItem = 0;
               sessionStorage.setItem($(this).index(),0);
               console.log(tickedItem);
               }
             });

           //to make sure struckthrough items stay struckthrough after page refresh
           $("li").each(function(i) {
           if (sessionStorage.getItem(i)==1) {
           $(this).css("text-decoration", "line-through");
           };
           });
         });
        </script>

    </body>
</html>