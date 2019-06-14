<? include 'scripts/add_game.php' ?>
<!DOCTYPE html>
<html lang='en'>
<?php include 'tpl/head_start.html'; ?>
<title>Four on a row</title>
<link rel="stylesheet" href="styles/game.css">
<script type='text/javascript' src="scripts/in_game/game.js"></script>
<?php include 'tpl/head_end.html'; ?>

<body>
    <?php include 'header.html'; ?>
    <div id='main_div'>
        <div id='game'>
            <div id='game_info'>
                <?php
                    session_start();
                    echo $_SESSION['gameID'] . '<br>';
                    echo session_id();
                ?>
                <h1 id='turn_state'></h1>
                <h1 id='outcome'></h1>
                <button type="button" onclick="location.href='index.php';" 
                class="btn btn-primary btn-lg btn-block" id="retry_button" style='display: none;' >Retry</button>
            </div>
            <table id='game_grid'>
                <thead>
                    <tr id='click_row'>
                        <th><button class='table_button' id='0' value='0'><span>&#10145;</span></button></th>
                        <th><button class='table_button' id='1' value='1'><span>&#10145;</span></button></th>
                        <th><button class='table_button' id='2' value='2'><span>&#10145;</span></button></th>
                        <th><button class='table_button' id='3' value='3'><span>&#10145;</span></button></th>
                        <th><button class='table_button' id='4' value='4'><span>&#10145;</span></button></th>
                    </tr>
                </thead>
                <tbody id='game_body'>

                </tbody>
            </table>
        </div>
    </div>
    <?php include 'footer.html'; ?>
</body>

</html>