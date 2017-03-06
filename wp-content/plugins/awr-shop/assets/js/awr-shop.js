(function($) {
	"use strict";
	var awr_currency 		= awr_constants.awr_currency;
	var awr_currency_symbol = awr_constants.awr_currency_symbol; 
	$(document).ready(function(){		
		$('#add-to-cart').on('click', function(e){						
			e.preventDefault();
			$.ajax({
				url:ajax_object.ajaxurl,
				method : 'POST',
				dataType : 'json',
				data:{
					'action'			: 'addToCart',
					'product_id'		: $('#awr-product-id').val(),
					'total_amount'		: $("#awr-total-hidden").val(),
					'product_model'		: $('#awr-model-selected').val(),
					'product_quantity'	: $('#awr-quantity').val(),
					'addtocart_security': $("#addtocart_security").val(),
				},				
				success: function(data){
					//alert(data);
				}
			});
		});

		// cart button notification
		$(this).find('#cartCount').text('2');	

		$('#awr-model').on('change', function(e){
			$('#awr-total').text( cart_total );
			$('#awr-total-hidden').val( cart_total );
			$('#awr-model-selected').val( $(this).find('option:selected').text() );
		});

		$('#awr-quantity').on('change', function(e){
			$('#awr-total').text( cart_total );
			$('#awr-total-hidden').val( cart_total );
		});
		var cart_total = function(){
			var model_price = $('#awr-model').val();
			var cart_quant 	= $('#awr-quantity').val();			
			var total 		= 0;
			total = parseFloat(model_price) * parseInt(cart_quant);
			return total;
		};	

		$('#awr-total')	.text(cart_total);
		$('#awr-total-hidden').val(cart_total);
		$('#awr-model-selected').val( $('#awr-model').find('option:selected').text() );
		//
	});
})(jQuery);