<div class="services">

<?php

	$services = 'services_list';

	// check if the repeater field has rows of data
	if( have_rows($services) ):

	 	// loop through the rows of data
	    while ( have_rows($services) ) : the_row(); ?>

	    	<div class="single-service">

	        	<h3><?php the_sub_field('service_title'); ?></h3>

	        	<p><?php the_sub_field('services_description'); ?></p>

	        </div>

	    <?php endwhile;

	else :

	    // no rows found
	    echo "Services coming soon!";

	endif;

?>

</div>
        
        
 
 

