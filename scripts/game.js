$(function(){
    $(function () {
        $(".table_button").on('click', function() {
            let index = $(this).val();
            console.log(index);

            let request = $.post('scripts/pull_gameboard.php', {'index': index});

            request.done(function(data){
                $('#game_body').empty();
                $('#game_body').append(data);
            });
        })
    })
})