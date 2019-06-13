<?php
    // 
    $session_id = 1;

    $file = file_get_contents('../../data/games.json');
    $content = json_decode($file, true);

    //A null means that there is no disc placed in a slot, a 0 means a red color and 1 a yellow one.
    //reverses array so it goes from bottom to top.
    $board = array_reverse($content[0]['grid2Darray']);
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