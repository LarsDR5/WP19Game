<?php
    // Returns a json file containing the ids of the columns that are full.
    session_start();
    $session_id = session_id();
    $file_path = "../../data/" . $_SESSION['gameID'] . ".json";

    $file = file_get_contents($file_path);
    $content = json_decode($file, true);
    $board = $content['grid'];

    $full_indexes = array(0,1,2,3,4);

    for($i = 0; $i <= 4; $i++){
        foreach($board as $key => $row){
            if($row[$i] === null){
                unset($full_indexes[$i]);
            }
        }
    }

    echo json_encode($full_indexes, JSON_PRETTY_PRINT);
?>