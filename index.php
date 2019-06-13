<!DOCTYPE html>
<html lang='en'>
    <?php
        include 'tpl/head_start.html';
        $code = include 'scripts/generate_code.php'
    ?>
    <title>Four on a row</title>
    <script type="text/javascript" src="scripts/main.js"></script> 
    <?php include 'tpl/head_end.html'; ?>
    <body>
        <?php include 'header.html'; ?>
        <div id='main_div'>
            <div id='start_screen'>
                <img id='bg_img' src="media/img/backgroundhome.png" alt="An icon">
                <div id='input_screen'>
                    <h1 class="welcomeText">Welcome to Four on a Row!</h1>
                    <h3 class="welcomeText">To start a game with a friend, generate a code...</h3>
                    <br />
                    <form action="game.php" method="post">
                        <input type="hidden" name="code" value="<? $code ?>">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="codeButton">Generate Code</button>
                    </form>
                    <br />
                    <h3 class="welcomeText">...or enter a code from a friend!</h3>
                    <form>
                        <div class="form-group">
                            <label for="codeInput"></label>
                                <input type="text" class="form-control" id="codeInput" placeholder="Enter a code to start a game!">
                        </div>
                    </form>
                    <button type="button" class="btn btn-primary btn-lg btn-block" id="startButton">Start Game!</button>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.html'; ?>
</body>
