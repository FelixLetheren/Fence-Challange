<!DOCTYPE html>
<?php
require_once ('functions.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div class="title">
    <h1>Fantastic Fence Finder</h1>
</div>
<div class="field">
    <h2>How many fence posts and railings do you have?</h2>
    <form action="index.php" method="get">
        <div class="submit-box-holder">
            Posts<input type="number" name="userInputPosts">
            Railings<input type="number" name="userInputRailings">
            <input type="submit" value="Submit!">
            <h3><?php if (checkInput($userInputPosts) && checkInput($userInputRailings)) {
                echo 'You have input ' . $userInputPosts . ' posts and ' . $userInputRailings . ' railings.';
                echo '<br>';
                echo 'The maximum length of fence that can be created is ' . getMaxLength($userInputRailings, $userInputPosts);
                }?></h3>
        </div>
    </form>
</div>
<div class="field">
<h2>How long do you want your fence?</h2>
<form action="index.php" method="get">
    <input type="number" name="userInputLength">
    <input type="submit" value="Submit!">
    <h3><?php
        if (checkInput($userInputLength)){
        $fenceLength = calculatePossibleFenceLength($userInputLength);
        echo 'You will need ' .$fenceLength['posts']. ' posts and ' .$fenceLength['railings'].' railings to build this fence.';
        echo '<br>';
        echo 'It will be ' .addPostandRailingLength($fenceLength['posts'],$fenceLength['railings']). 'm long';
        }  ?>
    </h3>
</form>
</div>
</body>
</html>



