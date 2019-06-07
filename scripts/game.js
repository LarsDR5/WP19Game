$(function(){
    refreshBoard();
    updateTurnState();
    $(function () {
        $(".table_button").on('click', function() {
            disableButtons();
            let index = $(this).val();
            let request = $.post('scripts/handle_input.php', { 'index': index });

            request.done(function(){
                refreshBoard();
                updateTurnState();
            });
        })
    })
    window.setInterval(function(){
        
    }, 1000);

    function refreshBoard(){
        let request = $.post('scripts/pull_gameboard.php');
    
        request.done(function(data){
            $('#game_body').empty();
            $('#game_body').append(data);
        });
    }

    function updateTurnState(){
        let request = $.post('scripts/get_turn_state.php');

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
        let buttons = $('.table_button');
        buttons.each(function (button) {
            $(this).prop('disabled', true);
        });
    }

    function enableButtons(){
        let buttons = $('.table_button');
        buttons.each(function (button) {
            $(this).prop('disabled', false);
        });
    }
})
