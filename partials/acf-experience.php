<div class="experience">

<?php

	$experience = 'experience';

	// check if the repeater field has rows of data
	if( have_rows($experience) ):

	 	// loop through the rows of data
	    while ( have_rows($experience) ) : the_row(); ?>

	    	<div class="single-experience">

	        	<h3><?php the_sub_field('experience_header'); ?>:</h3>

	        	<ul>

		        	<?php

		        	while ( have_rows('experience_list_item') ) : the_row(); ?>

				        <li><?php the_sub_field('experience_item'); ?></li>

				    <?php endwhile;

		        	?>

	        	</ul>

	        </div>

	    <?php endwhile;

	else :

	    // no rows found
	    echo "Experience coming soon!";

	endif;

?>

</div>
