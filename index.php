<!DOCTYPE html>
<?php
define('RAILING_LENGTH', 1.5);
define('POST_LENGTH', 0.1);
$userInputPostsAsString = $_GET['userInputPosts'];
$userInputRailingsAsString = $_GET['userInputRailings'];
$userInputLengthAsString = $_GET['userInputLength'];

$userInputPosts = (int)$userInputPostsAsString;
$userInputRailings = (int)$userInputRailingsAsString;
$userInputLength = (int)$userInputLengthAsString;

/**
 * @param int $userInputRailings
 * @param int $userInputPosts
 * @return float|int
 * Takes posts and railings input by user and determines the amount of posts
 * and fences that can be used to build the fence. Then calls addPostAndRailingLength
 */
function getMaxLength(int $userInputRailings, int $userInputPosts)
{
    if ($userInputPosts > $userInputRailings) {
        $posts = $userInputRailings + 1;
        $railings = $userInputRailings;
    }
    else {
        $railings = $userInputPosts - 1;
        $posts = $userInputPosts;
    }
    return addPostandRailingLength($posts, $railings);
}

function checkInput(int $value): bool
{

    if (gettype($value) == 'integer'
        && $value > 0
    ) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param int $posts
 * @param int $railings
 * @return float|int
 * Takes posts and railings and multiplies them by their length and adds together.
 */
function addPostandRailingLength(int $posts, int $railings)
{
    $postLength = $posts * POST_LENGTH;
    $railingLength = $railings * RAILING_LENGTH;
    $totalLength = $postLength + $railingLength;
    return $totalLength;
}

function calculatePossibleFenceLength($length){
    $postCounter = POST_LENGTH;
    $i = 0;
    while($postCounter < $length){
        $postCounter = $postCounter + POST_LENGTH + RAILING_LENGTH;
        $i++;
    }
    $returnArray = array();
    $returnArray['posts'] = $i +1;
    $returnArray['railings'] = $i;
    return $returnArray;
}

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



