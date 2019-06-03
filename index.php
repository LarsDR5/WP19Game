<!DOCTYPE html>
<html lang='en'>
    <?php include 'tpl/head_start.html'; ?>
    <title>Four on a row</title>
    <?php include 'tpl/head_end.html'; ?>
    <body>
        <?php include 'header.html'; ?>
        <div id='main_div'>
            <div id='under_main_div'>
                <button type="button" class="btn btn-primary btn-lg btn-block">Generate Code</button>
                <form>
                    <div class="form-group">
                        <label for="codeInput">Enter a code</label>
                            <input type="text" class="form-control" id="codeInput" placeholder="Enter a code to start a game!">
                    </div>
                </form>
                <button type="button" class="btn btn-secondary btn-lg btn-block">Start Game!</button>
            </div>
        </div>
        <?php include 'footer.html'; ?>
    </body>
</html>