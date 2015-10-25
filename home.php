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
		  <div id="highlighted">
		    <h1>Latest</h1>
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
		    
		<div id="region-two">
		  <h2>News</h2>
		  <?php $query2 = new WP_Query( array( 'category_name' => 'news' ) ); ?>

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
		<div id="region-three">
		  <h2>Opinion</h2>
		  <?php $query3 = new WP_Query( array( 'category_name' => 'opinion' ) ); ?>

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
		<div id="region-four">
		  		  <h2>Arts</h2>
		  <?php $query4 = new WP_Query( array( 'category_name' => 'arts' ) ); ?>

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
		<div id="region-five">
		  		  <h2>Features</h2>
		  <?php $query5 = new WP_Query( array( 'category_name' => 'features' ) ); ?>

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
<!-- we probably shouldn't be shoving javascript down here, but it works -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  $(document).ready(function () {
      console.log('hello world!');
        if ($('#highlighted').css('position') == 'absolute') { // Test whether we are using the fancy absolute layout
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
        }
       else {
         console.log('not in absolute mode')
       }
    })
</script>
