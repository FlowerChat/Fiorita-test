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
			<section class="front-page-tiles my-5">
				<div class="row align-items-end gy-4 mt-0">
					
					<div class="d-flex col-12 col-md-4 flower-card gift-bouquet">
						<div class="flower-card-image-holder">
							<a href="https://fiorita.cz/nase-kytice/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2021/05/WhatsApp-Image-2021-05-21-at-19.01.47-1650darkova-kytice-varianta-r26-16550-gift-bouquet-podarochnyj-buket-sq.jpg" alt="Dárkové kytice" width="100%"></a>
						
							<div class="flower-card-overlay">
														
								<a href="https://fiorita.cz/nase-kytice/" class="btn btn-primary btn-card-front btn-lg">Vybrat vázanou kytici&nbsp&nbsp<i class="bi bi-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>

					<div class="d-flex col-12 col-md-4 flower-card meadow-bouquet">
						<div class="flower-card-image-holder">
							<a href="https://fiorita.cz/lucni-kytice/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2021/01/lucni-kytice-1500-meadow-bouquet-lugovoj-buket-sq.jpg" alt="Luční kytice" width="100%"></a>
						
							<div class="flower-card-overlay">
														
								<a href="https://fiorita.cz/lucni-kytice/" class="btn btn-primary btn-card-front btn-lg">Vybrat luční kytici&nbsp&nbsp<i class="bi bi-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>

					<div class="d-flex col-12 col-md-4 flower-card flower-box">
						<div class="flower-card-image-holder">
							<a href="https://fiorita.cz/kvetiny-v-krabicich/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2020/10/pastelova-kvetinova-krabice-b42-1750-flower-box-tsvety-v-korobke-sq.jpeg" alt="Květiny v krabicích" width="100%"></a>
						
							<div class="flower-card-overlay">
															
								<a href="https://fiorita.cz/kvetiny-v-krabicich/" class="btn btn-primary btn-card-front btn-lg">Vybrat květinovou krabici&nbsp&nbsp<i class="bi bi-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row align-items-end g-4 mt-0">
					<div class="d-flex col-12 col-md-4 flower-card eustomas">
						<div class="flower-card-image-holder">
							<a href="https://fiorita.cz/eustomy/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2021/01/25-eustom-1700-eustomas-sq-1.jpeg" alt="Eustomy" width="100%"></a>
						
							<div class="flower-card-overlay">
								<a href="https://fiorita.cz/eustomy/" class="btn btn-primary btn-card-front btn-lg">Vybrat eustomy&nbsp&nbsp<i class="bi bi-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>
					<div class="d-flex col-12 col-md-4 flower-card roses">
						<div class="flower-card-image-holder">
							<a href="https://fiorita.cz/ruze/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2021/10/kytice-101-ruze-front-sq-red-roses-2.jpg" alt="Růže" width="100%"></a>
						
							<div class="flower-card-overlay">
								<a href="https://fiorita.cz/ruze/" class="btn btn-primary btn-card-front btn-lg">Vybrat růže&nbsp&nbsp<i class="bi bi-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>
					<div class="d-flex col-12 col-md-4 flower-card tulips">
						<div class="flower-card-image-holder">
							<a href="https://fiorita.cz/tulipany/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2021/01/tulipany-na-valentyn-valentine-tulips-tyulpany-na-valentyna-sq.jpg" alt="Tulipány" width="100%"></a>
						
							<div class="flower-card-overlay">
								<a href="https://fiorita.cz/tulipany/" class="btn btn-primary btn-card-front btn-lg">Vybrat tulipány&nbsp&nbsp<i class="bi bi-arrow-right-circle"></i></a>
							</div>
						</div>
					</div>
				</div>
			</section>
<!---Calling additional products and contacts blocks from another phps--->			
			<?php
				get_template_part( 'template-parts/additional-products' );
				get_template_part( 'template-parts/contact-block' );
				
			?>

		

<!---recently sold products loop with wp_query --->			
			<div class="row wine-display g-3" id="products-display">
				<h3 class="subheader-front">Právě koupené</h3>
			<?php

				$ourCurrentPage = max(1, get_query_var('page'));
						
				$products = new WP_Query(array(
					'post_type' => 'product',
					'product_cat' => 'darkove-kytice, vina',
					'posts_per_page' => 16,
					'paged' => $ourCurrentPage
				));
				
					if ( $products->have_posts() ) :
						$counter = 0;
						while ( $products->have_posts() ) : $products->the_post();
							
							$price = $product->get_price();
														
						?>
							<div class="product-card-holder d-flex col-6 col-md-3">
						<div class="product-card-holder-bg d-flex">
							<div class="product-image-price d-flex">
								<div class="product-image">
									<a href="<?php the_permalink() ?>"><img class="product-card-image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="Produkt" width="100%"></a>
								</div>
								
								<div class="row product-name-price g-0">
									<div class="col-12 col-md-6 product-name">
										<a style="text-decoration: none;" href="<?php the_permalink() ?>"><h4 class="flower-card-title"><?php the_title() ?></h4></a>
									</div>
									<div class="col-12 col-md-6 product-price-buy">
										<?php if ($product->get_type() == 'simple') { ?>
										<a href="?add-to-cart=<?php echo $post->ID ?>" class="btn btn-primary btn-product-loop btn"><i class="bi bi-cart-plus"></i>&nbsp<?php  echo $price?> Kč</a><?php ;
										} else {?>
										<a href="<?php the_permalink() ?>" class="btn btn-primary btn-product-loop btn">Varianty</a><?php ;

										}?>
									</div>
								</div>

							</div>
						</div>
						
						




					</div>
						<?php endwhile; ?>
						<div class="row pagination-insert-posts">
							<?php echo paginate_links(array(
							'total'=>$products->max_num_pages,
							'current'=>$ourCurrentPage
						)); ?>


						</div>

						<?php					
						endif; 
						// reser the_content() to show front page content, otherwise, the last loop product contnet
						wp_reset_postdata();
						?>

						<script>jQuery('div.wine-display').each(function(_, widget) {
						// Add the id to the pagination URL
						jQuery('a.page-numbers', widget).map(function(_, link) {
							jQuery(link).attr('href', jQuery(link).attr('href') + '#products-display');
							});
						});</script>

			</div>
		
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