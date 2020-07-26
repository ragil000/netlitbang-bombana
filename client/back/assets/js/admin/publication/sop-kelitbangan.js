// remove all active menu
$('.nav-link').removeClass('active')
$('.nav-link').attr('aria-expanded', false)
$('.collapse').removeClass('show')
// sett active menu
$('#parent-nav-publication').addClass('active')
$('#parent-nav-publication').attr('aria-expanded', true)
$('#nav-publication').addClass('show')
$('#child-nav-publication-1').addClass('active')

function detailModal(id) {
    $.get(base_url+'admin/publication/detail/'+id).then((result) => {
        result = JSON.parse(result)
        $('#date').html(_dateID(result[0].created_at))
        $('#headline').html(result[0].headline)
        $('#content').html(result[0].content)
        $('#button-detail-modal').click()
    })
}