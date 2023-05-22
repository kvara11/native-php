$('ul.job-listings a').click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    $('div.job-description-wrapper').show();
    $('div.job-description').hide()
    $('ul.job-listings a').removeClass('active');
    $(this).addClass('active');
    $('div.job-description[data-id="' + id +'"]').show();
    return false;
});
$('.close-window').click(function (e) {
    e.preventDefault();
    $('div.job-description-wrapper').hide();
    $('ul.job-listings a').removeClass('active');
    return false;
});