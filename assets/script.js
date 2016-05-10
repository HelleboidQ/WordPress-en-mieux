$(document).on('ready', function () {

    // Barre de recherche
    $(document).on('keyup', '#recherche', function (input) {
        $('#suggest').show();

        if ($(this).val().length > 0 && !$(this).val().match(' ')) {
            $.ajax({
                url: getUrl() + "articles/getArticlesAjax/" + $(this).val(),
                get: 'get',
                data: '',
                success: function (e) {
                    $('#suggest').empty();
                    $('#suggest').html(e);
                },
                error: function (e) {
                    console.log('error ' + e);
                }
            });
        } else {
            $('#suggest').empty();
        }
    });
    $('#suggest').hide();
    $(document).on('blur', '#recherche', function () {
        $('#suggest').hide();
    });

    function getUrl() {
        return window.location.protocol + '//' + window.location.host + '/' + window.location.pathname.split('/')[1] + '/';
    }

});
