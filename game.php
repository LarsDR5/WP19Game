<!DOCTYPE html>
<html lang='en'>
<?php include 'tpl/head_start.html'; ?>
<title>Four on a row</title>
<link rel="stylesheet" href="styles/game.css">
<script type='text/javascript' src="scripts/game.js"></script>
<?php include 'tpl/head_end.html'; ?>

<body>
    <?php include 'header.html'; ?>
    <div id='main_div'>
        <div id='game'>
            <div id='game_info'>
                <h1>Your turn!</h1>
            </div>
            <table id='game_grid'>
                <thead>
                    <tr id='click_row'>
                        <th><button class='table_button' id='0' value='0'>&#8681;</button></th>
                        <th><button class='table_button' id='1' value='1'>&#8681;</button></th>
                        <th><button class='table_button' id='2' value='2'>&#8681;</button></th>
                        <th><button class='table_button' id='3' value='3'>&#8681;</button></th>
                        <th><button class='table_button' id='4' value='4'>&#8681;</button></th>
                    </tr>
                </thead>
                <tbody id='game_body'>
                    <?php
                        for($i = 0; $i < 5; $i++){
                    ?>
                    <tr>
                        <?php
                            for($ii = 0; $ii < 5; $ii++){
                        ?>
                        <td><div class='yellow disc'></div></td>
                        <?php }?>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'footer.html'; ?>
</body>

</html>