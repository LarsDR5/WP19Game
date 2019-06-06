<?php
if (isset($_POST['codeButton'])) {
    $game_id = uniqid();
    $json_filename = "{$game_id}.json";
    $json_file = fopen("../data/{$json_filename}", 'w');

    include('create_session.php');

    $creationTime = time();

    $game = array(
        "sessionID0" => $_SESSION['id'],
        "sessionID1" => null,
        "turn" => null,
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
}