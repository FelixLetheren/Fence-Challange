<!DOCTYPE html>
<?php
define('RAILING_LENGTH', 1.5);
define('POST_LENGTH', 0.1);
$userInputPosts = $_GET['userInputPosts'];
$userInputRailings = $_GET['userInputRailings'];

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
    } else {
        $railings = $userInputPosts - 1;
        $posts = $userInputPosts;
    }
    return addPostandRailingLength($posts, $railings);
}

/**
 * @param int $posts
 * @param int $railings
 * @return float|int
 * Takes posts and railings and multiplies them by their length and adds together.
 */
function addPostandRailingLength(int $posts, int $railings){
    $postLength = $posts * POST_LENGTH;
    $railingLength = $railings * RAILING_LENGTH;
    $totalLength = $postLength + $railingLength;
    return $totalLength;
}
echo 'You have input ' . $userInputPosts . ' posts and ' . $userInputRailings . ' railings.<br>';
echo 'The maximum length of fence that can be created is '. getMaxLength($userInputRailings, $userInputPosts);
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

