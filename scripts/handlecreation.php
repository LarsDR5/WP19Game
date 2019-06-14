<?php 
    require 'create_session.php';
    start_session();
    regenerate_id();
    generateGameID();
    add_game();
    header("Location: ../game.php");
    exit();
    
    function add_game(){
        $game_id = $_SESSION['gameID'];
        $json_filename = "{$game_id}.json";
        $file_path = "../data/{$json_filename}";
        $json_file = fopen($file_path, 'w');
        $creationTime = time();
    
        $game = array(
            "sessionID0" => session_id(),
            "sessionID1" => null,
            "turn" => 0,
            "state" => null,
            "creationDateTime" => time(),
            "lastActionDateTime" => time(),
            "grid" => array(
                array(null, null, null, null, null),
                array(null, null, null, null, null),
                array(null, null, null, null, null),
                array(null, null, null, null, null),
                array(null, null, null, null, null)
            )
        );
    
        fwrite($json_file, json_encode($game, JSON_PRETTY_PRINT));
        fclose($json_file);
    }

?>