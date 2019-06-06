$(function(){
    $(function () {
        $(".table_button").on('click', function() {
            let index = $(this).val();
            console.log(index);
            let request = $.post('scripts/add_new_disc.php', { 'index': index });

            request.done(function(){
                refreshBoard();
            });
        })
    })
    window.setInterval(function(){
        
    }, 1000)
})

function refreshBoard(){
    let request = $.post('scripts/pull_gameboard.php');

    request.done(function (data) {
        $('#game_body').empty();
        $('#game_body').append(data);
    });
}