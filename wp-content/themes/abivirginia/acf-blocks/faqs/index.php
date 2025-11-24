<?php
	$heading = get_field( 'heading' );
	$description = get_field( 'description' );
	$faqs = get_field( 'faqs' );
	$buttons = get_field( 'buttons' );
?>
	<section class="section">
		<div class="container" id="<?php echo esc_attr( $block['anchor'] ); ?>">
			<div class="columns is-centered">
				<div class="column is-8 has-text-centered">
					<h2 class="title is-3 <?php if ( $description ): ?>mb-3<?php else: ?>mb-6<?php endif; ?>"><?php echo $heading; ?></h2>
					<?php if ( $description ): ?>
                        <p><?php echo $description; ?>
                    <?php endif; ?>
				</div>
			</div>
			<div class="columns is-centered">
				<div class="column is-8">
					<?php $count = 0; foreach ( $faqs as $faq ): ?>
					<article class="message is-light faq-item" data-faq-index="<?php echo $count; ?>">
						<div class="message-header is-clickable faq-question-toggle">
							<p class="is-size-5"><?php echo $faq['faq']['question']; ?></p>
							<span class="icon is-small">
								<i class="fas fa-angle-down"></i>
							</span>
						</div>
						<div class="message-body faq-answer is-hidden">
							<div class="content">
								<p><?php echo $faq['faq']['answer']; ?></p>
							</div>
						</div>
					</article>
					<?php $count++; endforeach; ?>
                </div>
			</div>
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
