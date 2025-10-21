<?php
	$icon_location = get_field( 'icon_location' );
	$icon = get_field( 'icon' );
	$heading = get_field( 'heading' );
	$top_text = get_field( 'top_text' );
	$bottom_text = get_field( 'bottom_text' );
	$list = get_field( 'list' );
	$button_alignment = get_field( 'button_alignment' );
	$buttons = get_field( 'buttons' );
?>

    <!-- Sample Report Section -->
    <section class="section agent-sample-report-section is-secondary">
        <div class="container">
            <h2 class="title is-3 has-text-centered mb-6"><?php echo $heading; ?></h2>
            <div class="columns is-vcentered">
				<?php if ( $icon_location === 'Left' && ! empty( $icon ) ): ?>
                <!-- Left: Big icon -->
                <div class="column is-5 has-text-centered for-agents-report-column is-hidden-mobile">
                    <span class="for-agents-report-icon-circle column is-8">
                        <span class="for-agents-report-icon">
                            <i class="fas <?php echo $icon; ?>"></i>
                        </span>
                    </span>
                </div>
				<?php endif; ?>
                <div class="column is-7 ml-6">
                    <p class="is-size-5 mb-4">
						<?php echo abi_remove_p( $top_text ); ?>
                    </p>
					<?php if ( $list ): ?>
                    <ul class="is-size-5 mb-4" style="list-style: disc inside;">
						<?php foreach ( $list as $item ): ?>
                        <li><?php echo abi_remove_p( $item['item'] ); ?></li>
						<?php endforeach; ?>
                    </ul>
					<?php endif; ?>
                    <div class="report-vertical-line mb-5">
                        <p class="is-size-5 mb-4">
							<?php echo abi_remove_p( $bottom_text ); ?>
                        </p>
                    </div>
					<?php abi_buttons( $button_alignment, $buttons ); ?>
                </div>
				<?php if ( $icon_location === 'Right' && ! empty( $icon ) ): ?>
                <!-- Right: Big icon -->
                <div class="column is-5 has-text-centered for-agents-report-column is-hidden-mobile">
                    <span class="for-agents-report-icon-circle column is-8">
                        <span class="for-agents-report-icon">
                            <i class="fas <?php echo $icon; ?>"></i>
                        </span>
                    </span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
