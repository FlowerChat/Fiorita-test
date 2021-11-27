<?php
//most popular flower boxes
?>
<div class="row d-flex g-3">                
    <?php
        

        $boxesToday = new WP_Query(array(
            'post_type' => 'product',
            'tax_query' => array(
                array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => array( 187,260 ),
                        'operator' => 'AND'
                )
            ),
            'posts_per_page' => 3,
            'orderby' => 'rand'
            
            
            
        ));
        

            if ( $boxesToday->have_posts() ) :
                $counter = 0;
                while ( $boxesToday->have_posts() ) : $boxesToday->the_post();
                    $product = wc_get_product();
                    $price = $product->get_price();
                                                
                ?>
                    <div class="product-card-holder d-flex col-12 col-md-4">
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