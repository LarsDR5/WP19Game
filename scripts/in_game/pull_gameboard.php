<?php
    session_start();
    $session_id = session_id();
    $file_path = "../../data/" . $_SESSION['gameID'] . ".json";

    $file = file_get_contents($file_path);
    $content = json_decode($file, true);

    //A null means that there is no disc placed in a slot, a 0 means a red color and 1 a yellow one.
    //reverses array so it goes from bottom to top.
    $board = array_reverse($content['grid']);
    foreach($board as $key => $row){
        ?><tr><?php
        foreach($row as $key => $value){
            if($value === 0){
                $colour = 'red';
            }else if($value === 1){
                $colour = 'yellow';
            }else{
                $colour = 'empty';
            }
            ?><td><div class='<?=$colour?> disc'></div></td><?php
        }
        ?></tr><?php
    }
?>