<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PinkPetals
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pinkpetals' ); ?></a>

	<div class="announcement-bar pt-2 pb-2 ">
		<div class="container">
			<div class="row">
				<div class="col-md-2 d-flex">
					<ul class="announcement-bar__list">
						<li>
						<a href="https://fiorita.cz"> <img src="https://fiorita.cz/wp-content/uploads/2019/11/Fiorita-logo-line.svg" alt=""></a>

						</li>
					</ul>
				</div>
				<div class="col-md-8 d-flex justify-content-center">
					<ul class="announcement-bar__list">
						
						<li><a href="tel:+420776770350" class="text-decoration-none"><i class="bi bi-telephone rounded-circle"></i>
						+420776770350
						</a></li>
						<li>
						<a href="https://wa.me/420776770350" class="text-decoration-none"><i class="bi bi-whatsapp rounded-circle"></i>+420776770350</a>
						</li>
						<li>
						<a href="mailto:kvetiny@fiorita.cz" class="text-decoration-none"><i class="bi bi-envelope rounded-circle"></i>Email</a>
						</li>
						<li>
						<a href="https://g.page/Fiorita-Flowers" class="text-decoration-none"><i class="bi bi-house rounded-circle"></i>Rooseveltova 892/49, Praha 6</a>
						</li>
					</ul>
				</div>

				<div class="col-md-2 d-flex justify-content-end">
					<div class="col">
						<?php aws_get_search_form( true ); ?>
					</div>
				</div>
			</div>
		</div>


	</div>


	<header id="masthead" class="site-header">
		<div class="row d-flex header-items-holder">
			<div class="col-md-10 col-3 menu-column">
				<nav id="site-navigation" class="main-navigation col-md-10 col-sm-4 align-items-center bg-header">
					<div class="menu-holder d-flex justify-content-center">
						<div class="menu-items-list">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<i class="bi bi-menu-app"><?php esc_html_e( '', 'pinkpetals' ); ?></i></button>


							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>

						</div>
					</div>					
				</nav>		
			</div>

			<div class="col-md-0 col-4 justify-content-center mobile-logo">
				<a href="https://fiorita.cz"> <img src="https://fiorita.cz/wp-content/uploads/2019/11/Fiorita-logo-line.svg" alt=""></a>

			</div>

			<!---Menu cart button --->

			<div class="col-md-2 col-5">
				<a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-primary btn-cart-totals">
					<div class="cart-total-sum">
						<?php 
						$cart_items_total=WC()->cart->get_cart_total();
						echo $cart_items_total?>							
					</div>
							
					<div class="cart-symbol">
						<div class="cart-symbol">
							<i class="bi bi-cart cart-icon-menu p-2"></i>
						
							<div class="cart-content-number">
								<?php $cart_items_number=WC()->cart->get_cart_contents_count();						
								echo $cart_items_number?>
							</div>
						</div>

					</div>

					
				</a>

					
					
				
				

			</div>			

		</div>
		


		

		
	</header><!-- #masthead -->
