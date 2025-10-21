<?php get_header(); ?>
	<h1 class="text-center">
		<?php $search_query = get_search_query(); ?>
		<span>Search Results For: "<?php echo $search_query; ?>"</span>
		<?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1; ?>
		<?php if ( $paged > 1 ): ?><span>(Page <?php echo $paged; ?>)</span><?php endif; ?>
	</h1>
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div>
				<a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
				<p><?php echo theme_get_excerpt( get_the_id(), 30 ); ?></p>
			</div>
		<?php endwhile; ?>
		<?php theme_posts_pagination(); ?>
	<?php else: ?>
		<p style="text-align: center">No search results found.</p>
	<?php endif; ?>
<?php get_footer(); ?>
