<?php

function checkKey($) {

}

if (isset($_POST['codeInput'])) {
    $game_id = $_POST['codeInput'];
    $json_filename = "{$game_id}.json";
    $dir = '../data';
    $files = scandir($dir);
    if (in_array($json_filename, $files)) {
        $json_file = file_get_contents("../data/{$json_filename}");
        $game_status = json_decode($json_file, true);
        foreach($data as $key => $value) {

        }
    }
}