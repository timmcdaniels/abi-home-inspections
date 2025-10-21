<?php
	$title = get_field( 'title' ); 
	$list = get_field( 'list' );
?>

	<section class="is-max-desktop">
        <div class="container">
            <div class="box m-6 pl-0 pr-0 pb-0 has-background-primary">
                <h2 class="has-text-white title is-4 mb-2 has-text-centered pb-2"><?php echo $title; ?></h2>
                <div class="content has-background-white pt-4 pb-5 rounded">
					<?php if ( isset( $list ) ): ?>
                    <ul class="list-two-cols is-size-5">
						<?php foreach ( $list as $item ): ?>
							<?php if ( ! empty( $item['item'] ) && ! empty( $item['url'] ) ): ?>
								<li><a href="<?php echo $item['url']; ?>"><?php echo $item['item']; ?></a></li>
							<?php elseif( ! empty( $item['item'] ) ): ?>
								<li><?php echo $item['item']; ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
                    </ul>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
