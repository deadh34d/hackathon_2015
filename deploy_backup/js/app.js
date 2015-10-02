/**
 * Created by development on 8/15/2015.
 */
$(document).ready(function () {
    //$('.toggleable').last().toggleClass('collapsed');
    $('.toggleable').click(function () {
        $(this).toggleClass('collapsed');
    });
        //console.log($('#sqft-from').children());
    //$('#price-from').change(function() {
    //    var fromIndex = $('#price-from').index();
    //    $('#price-to').children($('#price-from')).text(parseInt($(this).val()) + 25000);
    //    $('.price-to').text(parseInt($(this).index($(this))) + 25000);
    //});
    //function magicPrice(fromPrice){
    //    $.each($('.price-to'), function(index, value){
    //    $(this).val(parseInt(fromPrice + 25000));
    //    $(this).text($(this).val());
    //        });
    //}



});