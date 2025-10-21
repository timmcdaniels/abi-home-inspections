<?php get_header(); ?>
	<?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1; ?>
	<h1><?php if ( is_post_type_archive() ) : ?><?php post_type_archive_title(); ?><?php elseif ( is_archive() ) : ?><?php the_archive_title(); ?><?php elseif ( is_author() ) : ?><?php the_author(); ?><?php endif; ?> <?php if ( $paged > 1 ) : ?> (Page <?php echo $paged; ?>)<?php endif; ?></h1>
	<ul>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></li>
		<?php endwhile; endif; ?>
	</ul>
<?php get_footer(); ?>
