$(function(){
    // Updates the board and turn state when the page loads
    refreshBoard();
    updateTurnState();
    checkGameState();
    // displayVictory();
    var updated = false;
    //When a user clicks on a button this updates the board and buttons.
    $(".table_button").on('click', function() {
        disableButtons();
        let index = $(this).val();
        let request = $.post('scripts/in_game/handle_input.php', { 'index': index });

        request.done(function(){
            refreshBoard();
            updateTurnState();
            checkGameState();
            updated = false;
        });
    });
    

    //This part checks if there has been a turn change, and changes depending on the returned value.
    window.setInterval(function(){
        let request = $.post('scripts/in_game/get_turn_state.php');

        request.done(function(data){
            if(data == 1 && updated == false){
                updateTurnState();
                refreshBoard();
                enableButtons();
                updated = true;
            }
        });
        checkGameState();

        
    }, 2000);
});

function refreshBoard(){
    /**
     * Updates the game board.
     */
    let request = $.post('scripts/in_game/pull_gameboard.php');

    request.done(function(data){
        $('#game_body').empty();
        $('#game_body').append(data);
    });
}

function updateTurnState(){
    /**
     * Updates the turn state using ajax to notify the user.
     * Also enables and disables the buttons accordingly.
     */
    let request = $.post('scripts/in_game/get_turn_state.php');

    request.done(function(data){
        $('#turn_state').empty();
        if(data == 1){
            enableButtons();
            $('#turn_state').append("It's your turn!");
        }else if (data == 0){
            disableButtons();
            $('#turn_state').append("Waiting for your opponent!");
        }
    });
}

function disableButtons(){
    /**
     * Disables all buttons used to click a disc.
     */
    let buttons = $('.table_button');
    buttons.each(function (button) {
        $(this).prop('disabled', true);
    });
}

function enableButtons(){
    /**
     * Enables all buttons to place a disc.
     *  and checks whether a column is full so you cannot place more discs.
     */
    let request = $.post('scripts/in_game/get_full_column_ids.php');

    request.done(function(ids){
        let buttons = $('.table_button');
        ids = JSON.parse(ids);
        if(Object.values(ids).length == 5){
            displayTie();
        }
        buttons.each(function (button) {
            $(this).prop('disabled', false)
            for(id in ids){
                if($(this).attr('id') == id){
                    $(this).prop('disabled', true);
                }
            }
        });
    })
}

/**
 * Checks the game state and displays the corresponding message.
 */
function checkGameState() {
    let request = $.post('scripts/in_game/check_board.php');

    request.done(function(data) {
        // displayVictory();
        if(data == 1) {
            displayVictory();
        }
        if(data === 0) {
            displayDefeat();
        }
    });
}

function displayVictory(){
    /**
     * Removes the turn states and displays a victory message.
     */
    $('#turn_state').css('display', 'none');
    $('#outcome').css('color', 'green');
    $('#outcome').empty();
    $('#outcome').append('You have Won!');
    $('#retry_button').show();
}

function displayDefeat() {
    /**
     * Removes the turn states and displays a defeat message.
     */
    $('#turn_state').css('display', 'none');
    $('#outcome').css('color', 'red');
    $('#outcome').empty();
    $('#outcome').append('You have been defeated!');
    $('#retry_button').show();    
}

function displayTie(){
    /**
     * Removes the turn states and displays a message indicating a tie.
     */
    $('#turn_state').css('display', 'none');
    $('#outcome').css('color', 'orange');
    $('#outcome').empty();
    $('#outcome').append('No one has won! You both are terrible at this game!');
    $('#retry_button').show();
}