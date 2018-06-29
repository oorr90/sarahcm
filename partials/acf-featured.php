<div class="home-highlights">

<?php

	$highlights = 'home_features';

	// check if the repeater field has rows of data
	if( have_rows($highlights) ):

	 	// loop through the rows of data
	    while ( have_rows($highlights) ) : the_row(); ?>

	    	<div class="single-highlight">

	        	<h2><?php the_sub_field('home_feature_title'); ?></h2>

	        	<p><?php the_sub_field('home_feature_description'); ?></p>



	        </div>

	    <?php endwhile;

	else :

	    // no rows found
	    echo "Experience coming soon!";

	endif;

?>

</div>
