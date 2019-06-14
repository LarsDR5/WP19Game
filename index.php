<!DOCTYPE html>
<html lang='en'>
    <?php
        include 'tpl/head_start.html';
    ?>
    <title>Four on a row</title>
    <script>
        $(function(){
            $('#startButton').prop('disabled', true);
            $('#codeInput').on('keyup blur', function(){
                let input = $('#codeInput').val();
                if (input.length == 4){
                    $('#codeInput').removeClass('is-invalid');
                    $('#codeInput').addClass('is-valid');
                    $('#startButton').prop('disabled', false);
                }else{
                    $('#codeInput').addClass('is-invalid');
                    $('#codeInput').removeClass('is-valid');
                    $('#startButton').prop('disabled', true);
                }
            });
        });
    </script>
    <?php include 'tpl/head_end.html'; ?>
    <body>
        <?php
            if (isset($_POST['codeInput']) && isset($_POST['startButton'])) {
                include_once 'scripts/create_session.php';
                start_session();
                $game_id = strtolower($_POST['codeInput']);
                $_SESSION['gameID'] = $game_id;

                $dir = 'data/';
                $json_filename = "{$game_id}.json";
                $json_path = $dir . $json_filename;
                $files = scandir($dir);
                if (in_array($json_filename, $files)) {
                    $json_file = file_get_contents($json_path);
                    $game = json_decode($json_file, true);
                    $game_status = &$game['sessionID1'];
                    $game_status = session_id();
                    #print_r($files);
                    #print_r($game);
                    
                    $json_file = fopen($json_path, 'w');
                    fwrite($json_file, json_encode($game, JSON_PRETTY_PRINT));
                    fclose($json_file);
                    header("Location: game.php");
                }
            }
        ?>
        <?php include 'header.html'; ?>
        <div id='main_div'>
            <div id='start_screen'>
                <img id='bg_img' src="media/img/backgroundhome.png" alt="An icon">
                <div id='input_screen'>
                    <h1 class="welcomeText">Welcome to Four on a Row!</h1>
                    <h3 class="welcomeText">To start a game with a friend, generate a code...</h3>
                    <br />
                    <form action="scripts/handlecreation.php" method="post">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="codeButton">Generate Code</button>
                    </form>
                    <br />
                    <h3 class="welcomeText">...or enter a code from a friend!</h3>
                    <form method='POST'>
                        <div class="form-group">
                            <label for="codeInput"></label>
                                <input type="text" class="form-control" id="codeInput" name='codeInput' placeholder="Enter a 4 character code to start a game!">
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" id="startButton" name='startButton' value='Start Game!'/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.html'; ?>
</body>
</html>