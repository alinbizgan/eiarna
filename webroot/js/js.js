$(document).ready(function() {
    var $easyzoom = $('.easyzoom').easyZoom();


    $("#rateYoAddRating").rateYo({
        rating: 0,
        fullStar: true,
        onChange: function (rating) {

            $("input[id=rating]").val(rating);
        }
    });



    $("#rateYoProductRating").rateYo({
        readOnly:true,
        rating: $("input[id=productrating]").val()
    });

    $("#field-rating1").rateYo({
        readOnly:true,
        rating: $("input[id=rating1]").val(),
        starWidth: "20px"
    });
    $("#field-rating2").rateYo({
        readOnly:true,
        rating: $("input[id=rating2]").val(),
        starWidth: "20px"
    });
    $("#field-rating3").rateYo({
        readOnly:true,
        rating: $("input[id=rating3]").val(),
        starWidth: "20px"
    });
    $("#field-rating4").rateYo({
        readOnly:true,
        rating: $("input[id=rating4]").val(),
        starWidth: "20px"
    });
    $("#field-rating5").rateYo({
        readOnly:true,
        rating: $("input[id=rating5]").val(),
        starWidth: "20px"
    });


});
