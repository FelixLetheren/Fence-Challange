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

