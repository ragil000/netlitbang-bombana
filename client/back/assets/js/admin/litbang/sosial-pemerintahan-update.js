// remove all active menu
$('.nav-link').removeClass('active')
$('.nav-link').attr('aria-expanded', false)
$('.collapse').removeClass('show')
// sett active menu
$('#parent-nav-litbang').addClass('active')
$('#parent-nav-litbang').attr('aria-expanded', true)
$('#nav-litbang').addClass('show')
$('#child-nav-litbang-1').addClass('active')

$('.alert').delay(3500).fadeOut()

var editor = new Simditor({
    textarea: $('#editor')
});
$('.toolbar-item.toolbar-item-image').hide()