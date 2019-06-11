<?php
    $session_id = 1;

    $file = file_get_contents('../data/games.json');
    $content = json_decode($file, true);

    //1 means a yellow coin and 0 a red coin
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