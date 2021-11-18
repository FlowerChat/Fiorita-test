<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PinkPetals
 */

get_header();
?>
<!---Product categories cards--->
	 <main id="primary" class="site-main">
		<div class="container">
			<section class="front-page-tiles">
				<div class="row  top-products align-items-end gy-4 mt-0">					
					<?php 
					get_template_part( 'template-parts/gift-bouquet' ); 
					get_template_part( 'template-parts/meadow-bouquet' );
					get_template_part( 'template-parts/flower-box' );
					?>					
				</div>
				<div class="row top-products align-items-end g-4 mt-0">
					<?php 
					get_template_part( 'template-parts/eustomas-card' ); 
					get_template_part( 'template-parts/roses-card' );
					get_template_part( 'template-parts/tulips-card' );
					?>					
				</div>
			</section>


<!---Calling additional products and contacts blocks from another phps--->	
					
			<?php
				get_template_part( 'template-parts/additional-products' );
				get_template_part( 'template-parts/contact-block' );				
			?>

		

<!---recently sold products loop with wp_query --->	

			<?php get_template_part( 'template-parts/recently-sold-mixed-flowers-only');?>
		
	<!---show front page text contnet--->	

			<div class="row">
				<div class="front-page-content">
					<?php
					
					$front_page_content = the_content();
					echo $front_page_content;
					?>
				</div>
			</div>
			
		</div>
		
		
		
		
		

	</main><!-- #main --> 

<?php
get_sidebar();
get_footer();
?>