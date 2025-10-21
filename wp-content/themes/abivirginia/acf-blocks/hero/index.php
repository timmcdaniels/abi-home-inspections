<?php
	$type = get_field( 'type' );
	$title = get_field( 'title' );
	$image = get_field( 'image' );
	$desc = get_field( 'description' );
	$buttons = get_field( 'buttons' );
	$class = 'std-hero';
	$style = "background: center top/cover url('" . $image . "');";
	if ( $type === 'Box with List & CTA' ) {
		$class = 'is-size-6 box-list-hero';
		$style = "background: center top/cover url('" . $image . "');";
	}
	if ( $type === 'Pointed' ) {
		$class = 'is-medium pointed';
	}
?>
	<!-- Hero Section -->
	<div class="hero <?php echo $class; ?>" style="<?php echo $style; ?>">
		<div class="hero-head"></div>
		<div class="hero-body">
			<div class="container<?php if ( $type !== 'Pointed' ): ?> is-fullhd<?php endif; ?>">
				<?php if ( $type === 'Standard' || $type === 'Box with List & CTA' ): ?>
				<div class="columns">
					<div class="column">
						<?php if ( $type === 'Standard' ): ?>
						<h1 class="mb-4 hero-title"><?php echo $title; ?></h1>
						<p class="hero-subtitle"><?php echo $desc; ?></p>
						<div class="hero-gradient-divider"></div>
						<div class="buttons mt-5">
                            <?php if ( isset( $buttons[0]['button']['label'] ) && isset( $buttons[0]['button']['url'] ) ): ?>
                            <a class="button is-primary hero-primary-btn" href="<?php echo $buttons[0]['button']['url']; ?>"><?php echo $buttons[0]['button']['label']; ?></a>
                            <?php endif; ?>
                            <?php if ( isset( $buttons[1]['button']['label'] ) && isset( $buttons[1]['button']['url'] ) ): ?>
                            <a class="button is-light hero-secondary-btn" href="<?php echo $buttons[1]['button']['url']; ?>"><?php echo $buttons[1]['button']['label']; ?></a>
                            <?php endif; ?>
                        </div>
						<?php elseif ( $type === 'Box with List & CTA' ): ?>
						<div class="box p-6">
                            <h1 class="is-size-2 mb-4"><?php echo abi_remove_p( get_field( 'heading' ) ); ?></h1>
							<?php echo get_field( 'content' ); ?>
                            <ul class="qualification-list mt-4 mb-4">
								<?php foreach ( get_field( 'list' ) as $item ): ?>
                                <li><i class="fas fa-check-circle has-text-primary"></i> <?php echo $item['item']; ?></li>
								<?php endforeach; ?>
                            </ul>
							<div class="buttons mt-5">
								<?php if ( isset( $buttons[0]['button']['label'] ) && isset( $buttons[0]['button']['url'] ) ): ?>
								<a class="button is-primary" href="<?php echo $buttons[0]['button']['url']; ?>"><?php echo $buttons[0]['button']['label']; ?></a>
								<?php endif; ?>
								<?php if ( isset( $buttons[1]['button']['label'] ) && isset( $buttons[1]['button']['url'] ) ): ?>
								<a class="button is-light" href="<?php echo $buttons[1]['button']['url']; ?>"><?php echo $buttons[1]['button']['label']; ?></a>
								<?php endif; ?>
							</div>
                        </div>
						<?php endif; ?>
					</div>
					<div class="column"></div>
				</div>
				<?php else: ?>
				<div class="hero-block-pointed">
                    <div class="hero-block-content">
                        <h1 class="title is-2 mb-4"><?php echo $title; ?></h1>
                        <p class="is-size-5 mb-5"><?php echo $desc; ?></p>
						<?php if ( isset( $buttons[0]['button']['label'] ) && isset( $buttons[0]['button']['url'] ) ): ?>
                        <a class="button is-light hero-agents-btn" href="<?php echo $buttons[0]['button']['url']; ?>"><?php echo $buttons[0]['button']['label']; ?></a>
						<?php endif; ?>
                    </div>
                </div>	
				<?php endif; ?>
			</div>
		</div>
		<div class="hero-foot"></div>
	</div>
