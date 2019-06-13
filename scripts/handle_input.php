<?php
    $file = file_get_contents('../data/games.json');
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
    
    $game_data = fopen('../data/games.json', 'w'); 
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