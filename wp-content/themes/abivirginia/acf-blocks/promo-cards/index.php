<?php
	$heading = get_field( 'heading' );
	$cards = get_field( 'cards' );
	$message = get_field( 'message' );
	$buttons = get_field( 'buttons' );
	$description = get_field( 'description' );
	$cols = get_field( 'card_columns' );
?>
	<section class="section is-secondary">
        <div class="container">
			<?php if ( $description || $heading ): ?>
			<div class="columns is-centered">
				<div class="column is-8 has-text-centered">
					<h2 class="title is-3<?php if ( empty( $description ) ): ?> mb-6<?php endif; ?>"><?php echo $heading; ?></h2>
					<?php if ( $description ): ?>
						<p><?php echo $description; ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
            <div class="columns is-centered is-multiline">
				<?php foreach ( $cards as $c ): ?>
                <div class="column <?php if ( $cols == 4 ): ?>is-3-desktop <?php elseif ( $cols == 3 ): ?>is-4-desktop <?php else: ?>is-6-desktop <?php endif; ?> is-6-tablet">
                    <div class="service-card card has-text-centered">
						<?php if ( ! empty( $c['card']['url'] ) ): ?><a href="<?php echo $c['card']['url']; ?>"><?php endif; ?>
                        <div class="card-content">
                            <span class="icon is-large mb-3">
                                <i class="fas <?php echo $c['card']['icon']; ?> fa-2x"></i>
                            </span>
                            <p class="title is-5 mb-2"><?php echo $c['card']['title']; ?></p>
                            <p class="content is-size-6"><?php echo $c['card']['description']; ?></p>
                        </div>
						<?php if ( ! empty( $c['card']['url'] ) ): ?></a><?php endif; ?>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
			<?php if ( $message ): ?>
				<div class="columns is-centered">
					<div class="column has-text-centered mt-6">
						<p class="is-size-6 has-text-centered"><?php echo $message; ?></p>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( isset( $buttons[0]['button']['label'] ) && isset( $buttons[0]['button']['url'] ) ): ?>
				<div class="columns is-centered">
					<div class="column buttons mt-4 has-text-centered">
						<a class="button is-primary" href="<?php echo $buttons[0]['button']['url']; ?>"><?php echo $buttons[0]['button']['label']; ?></a>
						<?php if ( isset( $buttons[1]['button']['label'] ) && isset( $buttons[1]['button']['url'] ) ): ?>
							<a class="button is-light" href="<?php echo $buttons[1]['button']['url']; ?>"><?php echo $buttons[1]['button']['label']; ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
        </div>
    </section>
