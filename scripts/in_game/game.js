$(function(){
    // Updates the board and turn state when the page loads
    refreshBoard();
    updateTurnState();

    //When a user clicks on a button this updates the board and buttons.
    $(".table_button").on('click', function() {
        disableButtons();
        let index = $(this).val();
        let request = $.post('scripts/in_game/handle_input.php', { 'index': index });

        request.done(function(){
            refreshBoard();
            updateTurnState();
        });
    })
    

    //This part checks if there has been a turn change, and changes depending on the returned value.
    var updated = false;
    window.setInterval(function(){
        let request = $.post('scripts/in_game/get_turn_state.php');

        request.done(function(data){
            if(data == 1 && updated == false){
                updateTurnState();
                refreshBoard();
                enableButtons();
                updated = true;
            }else if(data == 0 && updated == true){
                updated = false;
            }
        });

        
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
     */
    let buttons = $('.table_button');
    buttons.each(function (button) {
        $(this).prop('disabled', false);
    });
}
