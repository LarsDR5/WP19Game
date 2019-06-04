<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="application/javascript" src="scripts/main.js"></script> 
<html lang='en'>
    <?php include 'tpl/head_start.html'; ?>
    <title>Four on a row</title>
    <?php include 'tpl/head_end.html'; ?>
    <body>
        <?php include 'header.html'; ?>
        <div id='main_div'>
            <div id='under_main_div'>
                <h1 class="welcomeText">Welcome!</h1>
                <h3 class="welcomeText">To start a game with a friend, generate a code...</h3>
                <br />
                <button type="button" class="btn btn-primary btn-lg btn-block" id="codeButton" onclick="randomString();">Generate Code</button>
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
        <?php include 'footer.html'; ?>
    </body>
</html>