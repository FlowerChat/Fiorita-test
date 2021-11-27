<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>
<div class="container mt-5">
	
	
	<div class="row g-5">
		<div class="col-12 col-md-6">
		<?php 
                $product = wc_get_product();
                $price = $product->get_price();
                                            
            ?>
                <div class="product-card-holder d-flex">
					<div class="product-card-holder-bg d-flex">
						<div class="product-image-price d-flex">
							<div class="product-image">
								<a href="<?php the_permalink() ?>"><img class="product-card-image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="Produkt" width="100%"></a>
							</div>
							
							<div class="row product-name-price g-0">
								<div class="col-12 col-md-6 mobile-product-card-title">							
										<h1 class="product-card-title"><?php the_title() ?></h1>
								</div>
								<div class="col-12 col-md-6 product-price-buy">
									<?php if ($product->get_type() == 'simple') { ?>
									<a href="?add-to-cart=<?php echo $post->ID ?>" class="btn btn-primary btn-product-loop btn">Koupit za&nbsp<?php  echo $price?> Kč</a><?php ;
									} else {?>
									<a href="<?php the_permalink() ?>" class="btn btn-primary btn-product-loop btn">Varianty</a><?php ;

									}?>
								</div>
							</div>

						</div>
					</div>
				</div>
		</div>
		<div class="col-12 col-md-6 d-flex align-items-center">
			<div class="product-description">
				<h1 class="product-title-lg">
					<?php the_title(); ?>	
				</h1>
			<p class="product-long-description"><?php the_content(); ?></p>
			</div>
		</div>
			
			
			
	</div>
	
	<div class="additional-products mt-5 mb-5">
		<?php get_template_part ('template-parts/additional-products');?>
	</div>
	<div class="related-products related-bouquets mt-5 mb-5">
		<?php get_template_part('template-parts/flower-boxes-most-popular');?>
	</div>
	<div class="related-products related-boxes mt-5 mb-5">
		<?php get_template_part('template-parts/flower-boxes-most-popular');?>
	</div>
	<div class="related-products related-roses mt-5 mb-5">
		<?php get_template_part('template-parts/all-roses-most-popular');?>

	</div>
	<p class="breadcrumds"><?php woocommerce_breadcrumb();?>








</div>	
