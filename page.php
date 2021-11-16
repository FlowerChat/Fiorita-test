<?php
/**
 * The template for displaying all pages
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


<main id="primary" class="site-main">
    <div class="container">
        <h1 class="page-title"><?php echo the_title();?></h1>
		<?php
				$page=get_post();
				$pageID=$page->ID;
				$flowerPages = array(64715,64704,64700);
				$sympathyPages = array(65233);
				$isSympathy = in_array($pageID, $sympathyPages);
				
				if ($isSympathy != 1) {?>
        <section class="most-popular mt-5 mb-5">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Nejpopulárnější</h2>
                <p class="popularity-tag popularity-popular">Můžeme doručit i dnes</p>
            </div>
                <?php
					
					
					
					if ( $pageID == 65231 ) {
						get_template_part ( 'template-parts/all-roses-most-popular' );
					}
				//endif;
                    
                ?>           
        
        </section>
        
        <section class="products-flower-boxes mt-5 mb-5" id="boxes-display">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Všechny produkty</h2>
                <p class="popularity-tag popularity-regular">Objednávejte min. 1-2 dny předem, dnes doručíme s úpravami</p>
            </div>   
            
                <?php
                    get_template_part ( 'template-parts/flower-boxes-product-list' );
                ?>
            
        </section>
        <section class="products-flower-boxes mt-5 mb-5" id="boxes-display">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Vína ke květinám</h2>
                
            </div>   
            
                <?php
                    get_template_part ( 'template-parts/wines-recommended-list' );
                ?>
            
        </section>
        <section class="products-flower-boxes mt-5 mb-5" id="boxes-display">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Všechny doplňky</h2>
                
            </div>   
            
                <?php
					
                    get_template_part( 'template-parts/additional-products' );
					
                ?>
            
        </section>
        <?php } ?>
        <section class ="page-main-content" id="flower-boxes-text">
            <div class="row">
                <div class="front-page-content">
                    <?php
                    
                    $page_content = the_content();
                    echo $page_content;
                    ?>
                </div>
            </div>
        </section>

    </div>
    
</main>

<?php
get_sidebar();
get_footer();
?>

<?php
get_sidebar();
get_footer();
