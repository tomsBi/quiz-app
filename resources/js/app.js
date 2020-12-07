$('.cont').addClass('hide');
$('#question' + 1).removeClass('hide');

$(document).on('click', '.next', function () {
    let last = parseInt($(this).attr('id'));
    let nex = last + 1;
    $('#question' + last).addClass('hide');

    $('#question' + nex).removeClass('hide');
});

