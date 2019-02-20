$('input#all').on('click', function () {
    $('input').prop('checked',$(this).is(':checked'))
    billgenerator();
});
$('input:notall').on('click', function () {
    $('input').prop('checked',$(this).is(':checked'))
    billgenerator();
});