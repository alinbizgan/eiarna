$(document).ready(function(){

    $('#sameaddress').bind('change', function () {

        if($('#sameaddress').prop('checked')) {

            $('#shipping-address').val($('#billing-address').val());
            $('#shipping-address2').val($('#billing-address2').val());
            $('#shipping-city').val($('#billing-city').val());
            $('#shipping-county').val($('#billing-county').val());
            $('#shipping-zip').val($('#billing-zip').val());

        } else {

            $("#shipping-address").val('');
            $('#shipping-address2').val('');
            $('#shipping-city').val('');
            $('#shipping-county').val('');
            $('#shipping-zip').val('');

        }

    });

});
