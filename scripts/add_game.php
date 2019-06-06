<?php
if (isset($_POST['codeButton'])) {
    $game_id = uniqid();
    $json_filename = "{$game_id}.json";
    $json_file = fopen("../data/{$json_filename}", 'w');

    include('create_session.php');

    $game = array(
        "sessionID1" => $_SESSION['id'],
        "sessionID2" => 0,
        "turn" => 1,
        "creationDateTime" => time(),
        "lastActionDateTime" => time(),
        "grid" => array(
            array(0,0,0,0,0),
            array(0,0,0,0,0),
            array(0,0,0,0,0),
            array(0,0,0,0,0),
            array(0,0,0,0,0)
        ));
}