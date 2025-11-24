<?php
	$image_location = get_field( 'image_location' );
	$image_id = get_field( 'image' );
	$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	list( $image ) = wp_get_attachment_image_src( $image_id, 'full' );
	$image_ratio = get_field( 'image_ratio' );
	if ( empty( $image_ratio ) ) $image_ratio = 'is-3by2';
	$heading = get_field( 'heading' );
	$text = get_field( 'text' );
	$button_alignment = get_field( 'button_alignment' );
	$buttons = get_field( 'buttons' );
?>
	<section class="section">
		<div class="container">
			<div class="columns is-vcentered">
				<?php if ( $image_location === 'Left' && ! empty( $image ) ): ?>
				<div class="column is-6">
					<figure class="<?php if ( get_field( 'use_blue_background' ) ): ?>blue-bg<?php else: ?>image <?php echo $image_ratio; ?><?php endif; ?>">
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					</figure>
				</div>
				<?php endif; ?>
				<div class="column is-6">
					<h2 class="title is-3"><?php echo $heading; ?></h2>
					<?php echo $text; ?>
					<?php abi_buttons( $button_alignment, $buttons ); ?>
				</div>
				<?php if ( $image_location === 'Right' && ! empty( $image ) ): ?>
				<div class="column is-6">
					<figure class="<?php if ( get_field( 'use_blue_background' ) ): ?>blue-bg<?php else: ?>image <?php echo $image_ratio; ?><?php endif; ?>">
						<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
					</figure>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
