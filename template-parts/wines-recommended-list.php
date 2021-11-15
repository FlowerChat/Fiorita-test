<?php
?>
<div class="row recommended-wines-display g-3" id="wines-display">
    
<?php
//create list of recommended wines


    
            
    $products = new WP_Query(array(
        'post_type' => 'product',
        'product_cat' => 'vina',
        'post__in' => array(64651,64655,64884,65188,65185,65184,65180,64888), 
        'posts_per_page' => 8,
        'orderby' => 'none',
        'order' => 'ASC'
        
    ));
    
        if ( $products->have_posts() ) :
            $counter = 0;
            while ( $products->have_posts() ) : $products->the_post();
                $product = wc_get_product();
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
            <?php endwhile; 		
            endif; 
            // reser the_content() to show front page content, otherwise, the last loop product contnet
            wp_reset_postdata();
            ?>

            

</div>
