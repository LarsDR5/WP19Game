<?php
    // This script handles the turn and updates the gameboard when called given a POST variabled named index.
    session_start();
    $session_id = session_id();
    $file_path = "../../data/" . $_SESSION['gameID'] . ".json";

    $file = file_get_contents($file_path);
    $content = json_decode($file, true);

    $board = &$content['grid'];

    $index = $_POST['index'];

    $turn = &$content['turn'];
    
    foreach($board as $key => $row){
        if(!isset($row[$index])){
            $board[$key][$index] = $turn;
            break;
        }
    }
    
    changeTurn($turn);
    
    $game_data = fopen($file_path, 'w'); 
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