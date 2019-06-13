<?php

if (isset($_POST['codeInput'])) {
    $game_id = $_POST['codeInput'];
    $json_filename = "{$game_id}.json";
    $dir = '../data';
    $files = scandir($dir);
    if (in_array($json_filename, $files)) {
        $json_file = file_get_contents("../data/{$json_filename}");
        $game_status = json_decode($json_file, true);
        $ID1 = &$game_status[0]['sessionID1'];
        if ($ID1 === null) {
            $ID1 = session_id();
        } else {
            echo "Please enter valid code";
        }
    }

    $json_file = fopen("../data/{$json_filename}", 'w');
    fwrite($json_file, json_encode($game_status, JSON_PRETTY_PRINT));
    fclose($json_file);
}

?>