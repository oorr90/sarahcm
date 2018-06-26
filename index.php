<?php get_header(); ?>

<div class="main-page">
	<div class="col col1">
		<?php if ( have_posts() ) : ?>
		    <?php while ( have_posts() ) : the_post(); ?>
		        
		    	<h1><?php the_title(); ?></h1>

		    	<p><?php the_content(); ?></p>

		    <?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="col col2">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
