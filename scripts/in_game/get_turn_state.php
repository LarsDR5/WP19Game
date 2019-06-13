<?php
    //This script will return a boolean based on if the player calling this script is ready to make his turn.
    session_start();
    $session_id = session_id();
    $file_path = "../../data/" . $_SESSION['gameID'] . ".json";


    $file = file_get_contents($file_path);
    $content = json_decode($file, true);
    $turn = $content['turn'];

    if($turn == 0){
        $current_player = $content['sessionID0'];
    }else{
        $current_player = $content['sessionID1']; 
    }

    if($session_id == $current_player){
        echo 1;
    }else{
        echo 0;
    }
?>