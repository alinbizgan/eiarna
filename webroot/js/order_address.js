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
    
    $('#shipping_method').bind('change', function () {
    	update_shipping_area();
    });
    
    function update_shipping_area() {
    	if ($('#shipping_method').val() == 'quote') {
    		$('#shipping_address_column').show();
    		$('#sameaddress').parent().parent().show();
    		
    		$("#shipping-address").val('');
            $('#shipping-address2').val('');
            $('#shipping-city').val('');
            $('#shipping-county').val('');
            $('#shipping-zip').val('');
    	} else {
    		$('#shipping_address_column').hide();
    		$('#sameaddress').parent().parent().hide();
    		$("#shipping-address").val('-');
            $('#shipping-address2').val('-');
            $('#shipping-city').val('-');
            $('#shipping-county').val('B');
            $('#shipping-zip').val('-');
    	}
    	$('#sameaddress').prop('checked', false);
    }
    
    update_shipping_area();
});

