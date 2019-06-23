$(document).ready(function(){

    $('#payment-method').change(function(){
        if($('#payment-method').val() == 'payment_order') {
            $('#payment_order_block').show();
            $('#paypal_block').hide();
            
        } else if($('#payment-method').val() == 'paypal')  {
            $('#paypal_block').show();
            $('#payment_order_block').hide();
        } else {
        	$('#paypal_block').hide();
            $('#payment_order_block').hide();
        }
    });

});

