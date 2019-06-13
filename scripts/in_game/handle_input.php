<?php
    // This script handles the turn and updates the gameboard when called given a POST variabled named index.

    //$file_path = "../data/" . $_SESSION['game_id'] . ".json";

    $file = file_get_contents('../../data/games.json');
    $content = json_decode($file, true);

    $board = &$content[0]['grid2Darray'];

    $index = $_POST['index'];

    $turn = &$content[0]['turn'];
    
    foreach($board as $key => $row){
        if(!isset($row[$index])){
            $board[$key][$index] = $turn;
            break;
        }
    }
    
    changeTurn($turn);
    
    $game_data = fopen('../../data/games.json', 'w'); 
    fwrite($game_data, json_encode($content, JSON_PRETTY_PRINT)); 
    fclose($game_data);

    function changeTurn(&$turn){
        if ($turn == 1){
            $turn = 0;
        }else{
            $turn = 1;
        }
    }
?>