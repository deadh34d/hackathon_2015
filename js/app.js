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
    $('.btn-delete-image').click(function(){
        var image_id = $(this).val();
        doDeleteImagePost('http://localhost/idk/admin/?action=delete_image', image_id);
    });

    function doDeleteImagePost(url,image_id){
        $.ajax({ //load main post
            url: url,
            data: {
                'image_id': image_id
            },
            type: "POST",
            dataType: "json",
            success: function (data, xhr) { //there must be a function called from here, other it's undefined.
                console.log("Image deleted: " + data);
                $('.image-' + image_id).hide();
                $('.btn-delete-image[value='+image_id+']').remove();
                //var btn_delete = $('.btn-delete-image').val(image_id);


            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log("Could not delete image: " + textStatus + " " + errorThrown);
            }
        });
    }


});