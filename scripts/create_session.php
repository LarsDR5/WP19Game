<?php
// Source: https://www.php.net/manual/en/function.session-create-id.php
// To be called when a game is made, or when a player connects to a game.
// Starts a session
function start_session() {
    session_start();
    // Do not allow to use too old session ID
    if (!empty($_SESSION['deleted_time']) && $_SESSION['timestamp'] < time() - 3600) {
        session_destroy();
        session_start();
    }
}
// My session regenerate id function
function regenerate_id() {
    // Call session_create_id() while session is active to make sure collision free.
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    // WARNING: Never use confidential strings for prefix!
    $newID = session_create_id();
    // Set deleted timestamp. Session data must not be deleted immediately for reasons.
    $_SESSION['timestamp'] = time();
    // Finish session
    session_commit();
    // Make sure to accept user defined session ID
    // NOTE: You must enable use_strict_mode for normal operations.
    ini_set('session.use_strict_mode', 0);
    // Set new custom session ID
    session_id($newID);
    // Start with custom session ID
    session_start();
}

// credits https://stackoverflow.com/questions/4356289/php-random-string-generator
function generateGameID($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $gameID = '';
    for ($i = 0; $i < $length; $i++) {
        $gameID .= $characters[rand(0, $charactersLength - 1)];
    }
    $_SESSION['gameID'] = $gameID;
}
start_session();
regenerate_id();
generateGameID();
echo $_SESSION['gameID'];
?>