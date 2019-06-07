<?php
    $sessionid = '12345678';

    $file = file_get_contents('../data/games.json');
    $content = json_decode($file, true);
    $turn = $content[0]['turn'];

    if($turn == 0){
        $current_player = $content[0]['sessionID1']; 
    }else{
        $current_player = $content[0]['sessionID2']; 
    }

    if($sessionid == $current_player){
        echo 1;
    }else{
        echo 0;
    }
?>