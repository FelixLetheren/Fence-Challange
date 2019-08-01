<!DOCTYPE html>
<?php
require_once ('functions.php');

if (checkInput($userInputPosts) && checkInput($userInputRailings)) {
    echo 'You have input ' . $userInputPosts . ' posts and ' . $userInputRailings . ' railings.';
    echo '<br>';
    echo 'The maximum length of fence that can be created is ' . getMaxLength($userInputRailings, $userInputPosts);
}
if (checkInput($userInputLength)){
    $fenceLength = calculatePossibleFenceLength($userInputLength);
    echo 'You will need ' .$fenceLength['posts']. ' posts and ' .$fenceLength['railings'].' railings to build this fence.';
    echo '<br>';
    echo 'It will be ' .addPostandRailingLength($fenceLength['posts'],$fenceLength['railings']). ' long';

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>How many fence posts and railings do you have?</h1>
<form action="index.php" method="get">
    Posts<input type="number" name="userInputPosts">
    Railings<input type="number" name="userInputRailings">
    <input type="submit" value="Submit!">
</form>
<h1>How long do you want your fence?</h1>
<form action="index.php" method="get">
    <input type="number" name="userInputLength">
    <input type="submit" value="Submit!">
</form>
</body>
</html>



