<?php
	$heading = get_field( 'heading' );
	$button = get_field( 'button' );
	$phone = get_field( 'phone_number' );
	$email = get_field( 'email' );
?>

    <section class="section agent-sample-report-section is-secondary">
        <div class="container" id="<?php echo esc_attr( $block['anchor'] ); ?>">
			<div class="has-text-centered mt-6">
                <h2 class="title mb-4"><?php echo $heading; ?></h2>
                <div class="columns is-centered is-vcentered mb-3">
                    <div class="column is-narrow">
                        <a class="button is-primary is-large mr-4" href="<?php echo $button['url']; ?>">
							<?php if ( ! empty( $button['icon'] ) ): ?>
                            <span class="icon"><i class="fas <?php echo $button['icon']; ?>"></i></span>
							<?php endif; ?>
                            <span><?php echo $button['label']; ?></span>
                        </a>
                    </div>
                    <div class="column is-narrow">
                        <div class="vertical-separator"></div>
                    </div>
                    <div class="column is-narrow">
                        <div class="has-text-centered mb-3 is-size-5"><strong>Chat With Us:</strong></div>
                        <div class="is-size-5">
                            <div>
                                <span class="icon has-text-primary"><i class="fas fa-phone"></i></span>
                                <a href="tel:<?php echo $phone; ?>"><?php echo abi_format_phone( $phone ); ?></a>
                            </div>
                            <div class="mt-">
                                <span class="icon has-text-primary"><i class="fas fa-envelope"></i></span>
                                <a href="mailto:<?php echo $email; ?>">Email Us</a>
                            </div>
                        </div>  
                    </div>  
                </div>  
            </div>
        </div>
    </section>
