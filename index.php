<!DOCTYPE html>
<?php
define('RAILING_LENGTH', 1.5 );
define('POST_LENGTH', 0.1);
$userInputPosts = $_GET['userInputPosts'];
$userInputRailings = $_GET['userInputRailings'];

function addRailings($railings){

}

//echo 'you have input ' .$_GET['userInputPosts']. ' posts and ' .$_GET['userInputRailings']. ' Railings.'
echo 'You have input ' .$userInputPosts. ' posts and ' .$userInputRailings. ' railings.'
?>
<html lang="en">
<meta charset="UTF-8">

<body>
<form action="index.php" method="get">
    Posts<input type="text" name="userInputPosts">
    Railings<input type="text" name="userInputRailings">
    <input type="submit" value="Submit!">
</form>
</body>
</html>

