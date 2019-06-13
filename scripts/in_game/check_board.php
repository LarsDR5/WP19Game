<?php

$file = file_get_contents('../data/games.json');
$content = json_decode($file, true);

$board = array_reverse($content[0]['grid2Darray']);

for($i = 0; $i < 5; $i++) {
    for($j = 0; $j < 5; $j++) {
        if($board[$i][$j]) {
            $coin = $board[$i][$j];
            if(checkHorizontally($board, $coin, $i, $j) or
                checkVertically($board, $coin, $i, $j) or
                checkDiagonally($board, $coin, $i, $j)){
                winnerJSON($coin);
                return $coin;
            }
        }
    }
}
return null;

/**
 * Writes the winner to the JSON file.
 * ToDO: change filename
 * @param $coin int 0 or 1 for the winning player
 */
function winnerJSON($coin) {
    $state = &$content[0]['state'];
    if($state === null) {
        $state = $coin;
        $game_data = fopen('../../data/games.json', 'w');
        fwrite($game_data, json_encode($content, JSON_PRETTY_PRINT));
        fclose($game_data);
    }
}

/**
 * Checks the board horizontally in both directions for a four on a row.
 * @param $board array The game board.
 * @param $coin int 0 or 1 for each player.
 * @param $i int the y-axis
 * @param $j int the x-axis
 * @return bool False if no condition met, else True.
 */
function checkHorizontally($board, $coin, $i, $j) {
    $count = 0;
    for($n = 1; $n < 4; $n++) {
        if(($j+$n >= 0) and ($j+$n <= 4)) {
            if($board[$i][$j+$n] != $coin) {
                return False;
            }
            $count++;
        } else {
            return False;
        }
    }
    if($count === 4) {
        return True;
    }
    $count = 0;
    for($n = 1; $n < 4; $n++) {
        if(($j-$n >= 0) and ($j-$n <= 4)) {
            if($board[$i][$j-$n] != $coin) {
                return False;
            }
            $count++;
        } else {
            return False;
        }
    }
    if($count === 4) {
        return True;
    }
    return False;
}

/**
 * Checks the board vertically in both directions for a four on a row.
 * @param $board array The game board.
 * @param $coin mixed null if there is no coin, 0 or 1 for each player.
 * @param $i int the y-axis
 * @param $j int the x-axis
 * @return bool False if no condition met, else True.
 */
function checkVertically($board, $coin, $i, $j) {
    $count = 0;
    for($n = 1; $n < 4; $n++) {
        if(($i+$n >= 0) and ($i+$n <= 4)) {
            if($board[$i+$n][$j] != $coin) {
                return False;
            }
            $count++;
        } else {
            return False;
        }
    }
    if($count === 4) {
        return True;
    }
    $count = 0;
    for($n = 1; $n < 4; $n++) {
        if(($i-$n >= 0) and ($i-$n <= 4)) {
            if($board[$i-$n][$j] != $coin) {
                return False;
            }
            $count++;
        } else {
            return False;
        }
    }
    if($count === 4) {
        return True;
    }
    return False;
}

/**
 * Checks the board diagonally in both directions for a four on a row.
 * @param $board array The game board.
 * @param $coin mixed null if there is no coin, 0 or 1 for each player.
 * @param $i int the y-axis
 * @param $j int the x-axis
 * @return bool False if no condition met, else True.
 */
function checkDiagonally($board, $coin, $i, $j) {
    $count = 0;
    for($n = 1; $n < 4; $n++) {
        if(($i+$n >= 0) and ($i+$n <= 4) and ($j+$n >= 0) and ($j+$n <= 4)) {
            if($board[$i][$j+$n] != $coin) {
                return False;
            }
            $count++;
        } else {
            return False;
        }
    }
    if($count === 4) {
        return True;
    }
    $count = 0;
    for($n = 1; $n < 4; $n++) {
        if(($i-$n >= 0) and ($i-$n <= 4) and ($j-$n >= 0) and ($j-$n <= 4)) {
            if($board[$i][$j-$n] != $coin) {
                return False;
            }
            $count++;
        } else {
            return False;
        }
    }
    if($count === 4) {
        return True;
    }
    return False;
}
?>