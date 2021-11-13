<?php
?>
<!-- Upper Part of  the product type page -->
<?php
get_header();
?>
<main id="primary" class="site-main">
    <div class="container">
        <section class="page-hero mt-5 mb-5">
            <div class="row">
                <div class="d-flex col-12 col-md-5 product-type-page-hero p-3">
                    <div class="flower-card-image-holder">
                    <a href="https://fiorita.cz/nase-kytice/"><img class="flower-card-image" src="https://fiorita.cz/wp-content/uploads/2020/10/pastelova-kvetinova-krabice-b42-1750-flower-box-tsvety-v-korobke-sq.jpeg" alt="Květinová krabice" width="100%"></a>
    
                        <div class="flower-card-overlay">
                                    
                        <a href="https://fiorita.cz/nase-kytice/" class="btn btn-primary btn-card-front btn-lg">Koupit krabici&nbsp&nbsp<i class="bi bi-arrow-down-circle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-12 col-md-7 always-available p-3">

                
                    <div class="everyday-offer bg-header-bg p-2 mb-2">
                        <h3 class="special-offer">Krabice dne</h3>
                        <p class="head-comment">Můžeme doručit ještě dnes</p>
                    </div>
                    <div class="row">
                    <?php

                    $boxesToday = new WP_Query(array(
                        'post_type' => 'product',
                        //'product_cat' => 'kvetiny-v-krabicich',
                        'post__in' => array(65001,65038), 
                        'posts_per_page' => 2,
                        
                    ));

                        if ( $boxesToday->have_posts() ) :
                            $counter = 0;
                            while ( $boxesToday->have_posts() ) : $boxesToday->the_post();
                                $product = wc_get_product();
                                $price = $product->get_price();
                                                            
                            ?>
                                <div class="product-card-holder d-flex col-6 col-md-6">
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
                            <?php endwhile; 			
                            endif; 
                            // reser the_content() to show front page content, otherwise, the last loop product contnet
                            wp_reset_postdata();
                            ?>
                    </div>
                </div>

            
            </div>
        </section>
        
        <section class="products-flower-boxes" id="boxes-display"> 
            <div class="row flower-boxes-products g-3" id="products-display">
                <?php
                    get_template_part ( 'template-parts/flower-boxes-product-list' );
                ?>
            </div>
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