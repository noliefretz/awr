(function($) {
	"use strict";
	$(document).ready(function(){
		var _custom_media = true;
		/* adding highlight input group*/
		$('#add-highlights').on('click', function(){
			var ret_html 	= "";		
			ret_html = ret_html + "<div class='hightlight-inner'><input type='text' name='awr_field[product_highlights][]' placeholder='Product Highlights'><a href='#' class='remove-highlight'>-</a></div>";
			$('#product-hightlights').append( ret_html );		
			return false;
		});

		/* adding attachment input group*/
		$('#add-attachment').on('click', function(){
			var ret_html 	= "";
			ret_html = ret_html + "<div class='attachment-inner'>";
				ret_html = ret_html + "<input type='text' name='awr_field[product_attachments][url][]' placeholder='Attachment URL' value='' class='attachment-url'>";
				ret_html = ret_html + "<input type='text' name='awr_field[product_attachments][name][]' placeholder='Attachment Name' value='' class='attachment-name'>";
				ret_html = ret_html + "<a class='attach-file' type='button' class='button'>Attach File</a>";
				ret_html = ret_html + "<a href='#' class='remove-attachment'>-</a>";
			ret_html = ret_html + "</div>";
			$('#product-attachments').append( ret_html );
			return false;
		});

		/* adding product model */
		/* adding attachment input group*/
		$('#add-model').on('click', function(){
			var ret_html 	= "";
			ret_html = ret_html + "<div class='models-inner'>";
				ret_html = ret_html + "<input type='text' name='awr_field[product_models][name][]' placeholder='Product Models' value=''>";
				ret_html = ret_html + "<input type='number' name='awr_field[product_models][price][]' placeholder='Price' value='' required='required'>";
				ret_html = ret_html + "<a href='#' class='remove-model'>-</a>";
			ret_html = ret_html + "</div>";
			$('#product-models').append( ret_html );
			return false;
		});

		/* removing hightlight input group*/
		$('.remove-highlight').live('click', function(){		
			$(this).parent('.hightlight-inner').remove();
			return false;
		});

		/* removing attachment input group*/
		$('.remove-attachment').live('click', function(){		
			$(this).parent('.attachment-inner').remove();
			return false;
		});

		/* removing model input group*/
		$('.remove-model').live('click', function(){		
			$(this).parent('.models-inner').remove();
			return false;
		});

		/* attaching files */
	    $('.attach-file').live('click', function(){	
	    		var parent_container = $(this).parent('.attachment-inner');
	    		var send_attachment_bkp = wp.media.editor.send.attachment;
	    		var button = $(this);
	    		var id = '';
	    		_custom_media = true;
	    		wp.media.editor.send.attachment = function(props, attachment)
	    		{
	    		    if ( _custom_media ) 
	    		    {
	    		        $(parent_container).children('.attachment-url').val(attachment.url);

	    		    } else {

	    		        return _orig_send_attachment.apply( this, [props, attachment] );

	    		    };
	    		}
	    		wp.media.editor.open(button);
	    		return false;
	    });

	    /* attaching product-category image */
	    $('#prodcat-image').on('click', function(){	
	    		var preview_container = $('#prodcat-image-preview');
	    		var image_url = $('#prodcat-url');
	    		var send_attachment_bkp = wp.media.editor.send.attachment;
	    		var button = $(this);
	    		var id = button.attr('id').replace('_button', '');;
	    		_custom_media = true;
	    		wp.media.editor.send.attachment = function(props, attachment)
	    		{
	    		    if ( _custom_media ) 
	    		    {
	    		    	var html_preview = "<img src='"+ attachment.url +"' style='width:50%; padding:10px 10px 10px 0px;'>";
	    		        $(preview_container).html('');
	    		        $(preview_container).append(html_preview);
	    		        $(image_url).val(attachment.url);

	    		    } else {

	    		        return _orig_send_attachment.apply( this, [props, attachment] );

	    		    };
	    		}
	    		wp.media.editor.open(button);
	    		return false;
	    });
	   
	});
})(jQuery);