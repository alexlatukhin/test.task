var body = $('body');


$(body).on('submit', '#form-login', function (e) {

    var data = $(this).serialize();
    var url = $(this).attr('action');

    $.ajax({
        url: url,
        method: 'POST',
        data: data,
        success: function(response){
            location.reload();
        }
    });

    e.preventDefault();
    return false;
});


$(body).on('click', '#logout', function () {

    $.ajax({
        url: '/main/logout',
        method: 'POST',
        success: function (response) {
            location.reload();
        }
    });
});


$(body).on('click', '#get-user', function () {

    $.ajax({
        url: '/main/get-user',
        method: 'POST',
        success: function (response) {
            $('.show-form-user').hide();
            $('.show-info-user').show();
            $('.content').find('.show-info-user').html(response);
        }
    });
});


$(body).on('click', '#get-form-user-update', function () {

    $.ajax({
        url: '/main/get-form-user-update',
        method: 'POST',
        success: function (response) {
            $('.show-info-user').hide();
            $('.show-form-user').show();
            $('.content').find('.show-form-user').html(response);
        }
    });
});


$(body).on('submit', '#form-user-update', function (e) {

    var data = $(this).serialize();
    var url = '/main/save-form-user-update';

    $.ajax({
        url: url,
        method: 'POST',
        data: data,
        success: function(response){
            $('.content').find('.show-form-user').html(response);
        }
    });

    e.preventDefault();
    return false;
});