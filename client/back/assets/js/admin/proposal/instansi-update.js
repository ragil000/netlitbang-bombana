// remove all active menu
$('.nav-link').removeClass('active')
$('.nav-link').attr('aria-expanded', false)
$('.collapse').removeClass('show')
// sett active menu
$('#parent-nav-proposal').addClass('active')
$('#parent-nav-proposal').attr('aria-expanded', true)
$('#nav-proposal').addClass('show')
$('#child-nav-proposal-1').addClass('active')

$('.alert').delay(3500).fadeOut()

var editor = new Simditor({
    textarea: $('#editor')
});
$('.toolbar-item.toolbar-item-image').hide()