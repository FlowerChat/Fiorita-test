<?php
?>
<!-- Upper Part of  the product type page -->
<?php
get_header();
?>
<main id="primary" class="site-main">
    <div class="container">
        <h1 class="page-title"><?php echo the_title();?></h1>
        <section class="most-popular mt-5 mb-5">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Nejpopulárnější</h2>
                <p class="popularity-tag popularity-popular">Můžeme doručit i dnes</p>
            </div>
                <?php
                    get_template_part ( 'template-parts/flower-boxes-most-popular' );
                ?>           
        
        </section>
        
        <section class="products-flower-boxes" id="boxes-display">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Všechny produkty</h2>
                <p class="popularity-tag popularity-regular">Objednávejte min. 1-2 dny předem, dnes doručíme s úpravami</p>
            </div>   
            
                <?php
                    get_template_part ( 'template-parts/flower-boxes-product-list' );
                ?>
            
        </section>
        <section class="products-flower-boxes" id="boxes-display">
            <div class="row type-availability mt-1 mb-1">
                <h2 class="product-popularity">Vína ke květinám</h2>
                
            </div>   
            
                <?php
                    get_template_part ( 'template-parts/wines-recommended-list' );
                ?>
            
        </section>
        <section class ="page-main-content" id="flower-boxes-text">
            <div class="row">
                <div class="front-page-content">
                    <?php
                    
                    $flower_box_page_content = the_content();
                    echo $flower_box_page_content;
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