<div id="front">
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Innovator
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		  <div id="highlighted" class="layout-region">
		    <h2>Latest</h2> <!-- Hello World (quiet version) -->
		      <?php $query = new WP_Query( array( 'category_name' => 'highlight' ) ); ?>
		      
		      <?php /* Start the Loop */ ?>
		      <?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
					     
		    </div>
		    
		<div id="region-two" class="layout-region">
		  <h2>News</h2>
		  <?php $query2 = new WP_Query( array( 'category_name' => 'news',
			                                      			'posts_per_page' => 3,
											                  			    'category__not_in' => array( 13 ) )); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $query2->have_posts() ) : $query2->the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		  <h2>Sports</h2>

		  <?php $query2 = new WP_Query( array( 'category_name' => 'sports',
			                                      			'posts_per_page' => 3,
											                  			    'category__not_in' => array( 13 ) )); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $query2->have_posts() ) : $query2->the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		</div>
		<div id="region-three" class="layout-region">
		  <h2>Opinion</h2>
		  <?php $query3 = new WP_Query( array( 'category_name' => 'opinion',
			                                      			'posts_per_page' => 3,
											                  			    'category__not_in' => array( 13 )
          ) ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $query3->have_posts() ) : $query3->the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
		</div>
		<div id="region-four" class="layout-region">
		  		  <h2>Arts</h2>
		  <?php $query4 = new WP_Query( array( 'category_name' => 'arts',
			                                      			'posts_per_page' => 3,
											                  			    'category__not_in' => array( 13 ) )); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $query4->have_posts() ) : $query4->the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
			
		</div>
		<div id="region-five" class="layout-region">
		  		  <h2>Features</h2>
		  <?php $query5 = new WP_Query( array( 'category_name' => 'features',
			                                      			'posts_per_page' => 5,
											                  			    'category__not_in' => array( 13 ) )); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $query5->have_posts() ) : $query5->the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
			
		</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>
<!-- Hinkle adds madness -->
<!-- we probably shouldn\'t be shoving javascript down here, but it works -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	function update_layout () {
		console.log('hello world!');
		if ($('#highlighted').css('position') == 'absolute') { // Test whether we are using the fancy absolute layout
			/* Wipe out max-height's which are confusing us */
			els = ['#region-two','#region-three',
						 '#region-four','#region-five','#highlighted'
						]
			for (var i=0; i<els.length; i++) {
				el = els[i]
				if ( $(el).css('max-height') ) {$(el).css({'max-height':'auto'})}
			}
	    var hl_bottom = $('#highlighted').height()
      console.log('move three and four to',hl_bottom);
      $('#region-three').css({'top':hl_bottom})
      $('#region-four').css({'top':hl_bottom})
      var total_bottom = $('#region-three').height()+hl_bottom
      if ($('#region-four').height()+hl_bottom > total_bottom) { total_bottom = $('#region-four').height()+hl_bottom}
      if ($('#region-two').height() > total_bottom) {total_bottom = $('#region-two').height()}
      if ($('#region-five').height() > total_bottom) {total_bottom = $('#region-five').height()}
      console.log('put footer at ',total_bottom);
      $('footer#colophon').css({'margin-top':total_bottom})
			console.log('Adjust all our columns to be the right size...');
			// We should probably move this to styles.css...
			$('article').css({'border':'none'});
			$('#region-two').css({'border-left':'1px #c6093b solid '})
			$('#region-five').css({'border-right':'1px #c6093b solid '})
			$('#region-three').css({'border-right':'1px #c6093b solid '})
			$('#highlighted').css({'border-bottom':'1px #c6093b solid '})
			// Now adjust heights
			console.log('heights - ',total_bottom)
			$('#region-two').css({'height':total_bottom,'max-height':total_bottom})
			$('#region-five').css({'height':total_bottom,'max-height':total_bottom})
			var secondary_height = total_bottom - hl_bottom
			console.log('secondary height - ',secondary_height)
			$('#region-three').css({'height':secondary_height,'max-height':secondary_height})
			$('#region-four').css({'height':secondary_height,'max-height':secondary_height})
    }
    else {
      console.log('not in absolute mode')
			$('#region-two').css({'height':'auto'})
			$('#region-five').css({'height':'auto'})
			$('#region-three').css({'height':'auto'})
			$('#region-four').css({'height':'auto'})
    }
  }
$(document).ready(function () {
	update_layout();
	$(window).resize(update_layout);
})
</script>
