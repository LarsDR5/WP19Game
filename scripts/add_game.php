<?php
if (isset($_POST['value'])) {
    $game_id = $_POST['value'];
    $json_filename = "{$game_id}.json";
    $json_file = fopen("../data/{$json_filename}", 'w');
    include('create_session.php');
    $creationTime = time();
    $game = array(
        "sessionID0" => $_SESSION['id'],
        "sessionID1" => null,
        "turn" => null,
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
    die();
}
?>