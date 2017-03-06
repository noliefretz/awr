<div class="awr-meta-boxes">
	<!-- product price and quantitiy -->
	<div class="awr-left-box" style="width:45%; display:inline-table; float:left;">
		<input type="number" name="awr_field[product_price]" id="product_code" placeholder="Product Price" value="<?php _e( esc_html( get_post_meta( $post->ID, '_product_price', true ) ) );?>">
		<input type="number" name="awr_field[product_quantity]" id="product_quantity" placeholder="Quantity" value="<?php _e( esc_html( get_post_meta( $post->ID, '_product_quantity', true ) ) );?>">
	</div>

	<!-- product_highlights array -->
	<div class="awr-right-box" style="width:45%; display:inline-table;">
		<div id="product-hightlights">
		<?php $prod_highlights = unserialize( get_post_meta( $post->ID, '_product_highlights', true ) );
			if( is_array( $prod_highlights ) && count( $prod_highlights ) > 0) :?>
				<!-- displaying product hightlights -->
				<?php foreach ($prod_highlights as $hylyt):?>
					<div class="hightlight-inner">
						<input type="text" name="awr_field[product_highlights][]" placeholder="Product Highlights" value="<?php _e( $hylyt );?>">
						<a href="#" class="remove-highlight">-</a>
					</div>
				<?php endforeach;?>
		<?php else:?>

				<div class="hightlight-inner">
					<input type="text" name="awr_field[product_highlights][]" placeholder="Product Highlights" value="<?php _e( $prod_highlights ) ?>">
				</div>
		<?php endif;?>			
		</div>
		<a href="#" id="add-highlights">+</a>
	</div>
	<!-- product attachments/files attached array of urls -->
	<div class="awr-right-box" style="width:45%; display:inline-table;" id="product-attachments">
		<?php $product_attachments = @unserialize( get_post_meta( $post->ID, '_product_attachments', true) );?>
		<?php if( is_array( $product_attachments ) && count( $product_attachments )):?>
			<?php foreach( $product_attachments as $attachment ):?>
				<div class="attachment-inner">
					<input type="text" name="awr_field[product_attachments][url][]" placeholder="Attachment URL" value="<?php _e( esc_html( $attachment['url'] ) );?>" class="attachment-url">
					<input type="text" name="awr_field[product_attachments][name][]" placeholder="Product Price" value="<?php _e( esc_html( $attachment['name'] ) );?>" class="attachment-name">
					<a class="attach-file" type="button" class="button">Attach File</a>
					<a href="#" class="remove-attachment">-</a>
				</div>
			<?php 

				endforeach;?>
		<?php else:?>
			<div class="attachment-inner">			
				<input type="text" name="awr_field[product_attachments][url][]" placeholder="Attachment URL" value="" class="attachment-url">
				<input type="text" name="awr_field[product_attachments][name][]" placeholder="Name" value="" class="attachment-name">
				<a class="attach-file" type="button" class="button">Attach File</a>				
			</div>
		<?php endif;?>		
	</div>
	<a href="#" id="add-attachment">+</a>
</div>
<!-- _product models -->
<div class="awr-meta-boxes">
	<?php $product_models = @unserialize( get_post_meta( $post->ID, '_product_models', true) );?>
	<div id="product-models">
		<?php if( is_array( $product_models ) && count( $product_models )):?>
			<?php foreach( $product_models as $model ): ?>
				<div class="models-inner">
					<input type="text" name="awr_field[product_models][name][]" placeholder="Product Models" value="<?php _e( esc_html( $model['name'] ) );?>">
					<input type="number" name="awr_field[product_models][price][]" placeholder="Price" value="<?php _e( esc_html( $model['price'] ) );?>" required="required">
					<a href="#" class="remove-model">-</a>
				</div>
			<?php endforeach;?>
		<?php else:?>
			<div class="models-inner">
				<input type="text" name="awr_field[product_models][name][]" placeholder="Product Models" value="">
				<input type="number" name="awr_field[product_models][price][]" placeholder="Price" value="" required="required">
				<a href="#" class="remove-model">-</a>
			</div>
		<?php endif;?>		
	</div>
	<a href="#" id="add-model">+</a>
</div>