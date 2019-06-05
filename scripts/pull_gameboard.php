<?php
    $session_id = 1;

    $file = file_get_contents('../data/games.json');
    $content = json_decode($file, true);

    $board = $content[0]['grid2Darray'];
    foreach($board as $key => $row){
        ?><tr><?php
        foreach($row as $key => $value){
            if($value == 1){
                $colour = 'red';
            }else if($value == 2){
                $colour = 'yellow';
            }else{
                $colour = 'empty';
            }
            ?><td><div class='<?=$colour?> disc'></div></td><?php
        }
        ?></tr><?php
    }
?>