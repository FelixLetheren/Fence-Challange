<!DOCTYPE html>
<?php
require_once('functions.php');

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
<div class="img-holder">
    <img class="logo" src="fence.png">
</div>
<div class="field">
    <h2>How many fence posts and railings do you have?</h2>
    <form action="index.php" method="get">
        <div class="submit-box-holder">
            <h2>Posts:</h2><input class="input-box" type="number" name="userInputPosts">
            <h2>Railings:</h2><input class="input-box" type="number" name="userInputRailings">
            <input class="submit" type="submit" value="Submit!">
        </div>
    </form>
    <h3><?php if (checkInput($userInputPosts) && checkInput($userInputRailings)) {
            echo 'You have input ' . $userInputPosts . ' posts and ' . $userInputRailings . ' railings.';
            echo '<br>';
            echo 'The maximum length of fence that can be created is ' . getMaxLength($userInputRailings, $userInputPosts);
        } ?></h3>
</div>
<div class="field">
    <h2>How long do you want your fence?</h2>
    <div class="submit-box-holder-second">
    <form action="index.php" method="get">
        <input class="input-box" type="number" name="userInputLength">
        <input class='submit' type="submit" value="Submit!">
    </form>
    </div>
    <h3><?php
        if (checkInput($userInputLength)) {
            $fenceLength = calculatePossibleFenceLength($userInputLength);
            echo 'You will need ' . $fenceLength['posts'] . ' posts and ' . $fenceLength['railings'] . ' railings to build this fence.';
            echo '<br>';
            echo 'It will be ' . addPostandRailingLength($fenceLength['posts'], $fenceLength['railings']) . 'm long';
        } ?>
    </h3>
</div>
</body>
</html>



