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

    function getUrl() {
        return window.location.protocol + '//' + window.location.host + '/' + window.location.pathname.split('/')[1] + '/';
    }


    $('.material-switch input').on('change', function () {



        if ($(this).is(':checked')) {
            // ajout les droits
            // console.log($(this).attr('tag'));
            $.ajax({
                url: getUrl() + "admin/changeOwner/" + $(this).attr('tag') + "/1",
                get: 'get',
                data: '',
                success: function (e) {
                    console.log(e);
                }
            });
        }
        else
            {
                // supprime les droits
                $.ajax({
                    url: getUrl() + "admin/changeOwner/" + $(this).attr('tag') + "/0",
                    get: 'get',
                    data: '',
                });
            }
    });
});
