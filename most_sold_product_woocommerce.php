This is a shortcode snippet that lists popular products by categories. By popular I mean most sold products ( as in total sales).

function bestselling_products_by_categories( $atts ){

    global $woocommerce_loop;

    extract(shortcode_atts(array(
        'cats' => '',   
        'tax' => 'product_cat', 
        'per_cat' => '5',   
        'columns' => '5',
        'include_children' => false,
        'title' => 'Popular Products',
        'link_text' => 'See all',
    ), $atts));

    if(empty($cats)){
        $terms = get_terms( 'product_cat', array('hide_empty' => true, 'fields' => 'ids'));
        $cats = implode(',', $terms);
    }

    $cats = explode(',', $cats);

    if( empty($cats) )
        return '';

    ob_start();

    foreach($cats as $cat){

        // get the product category
        $term = get_term( $cat, $tax);

        // setup query
        $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $per_cat,            
            'meta_key'              => 'total_sales',
            'orderby'               => 'meta_value_num',
            'tax_query' => array(               
                array(
                    'taxonomy' => $tax,
                    'field' => 'id',
                    'terms' => $cat,
                    'include_children' => $include_children,
                )
            ),
            'meta_query'            => array(
                array(
                    'key'       => '_visibility',
                    'value'     => array( 'catalog', 'visible' ),
                    'compare'   => 'IN'
                )
            )
        );

        // set woocommerce columns
        $woocommerce_loop['columns'] = $columns;

        // query database
        $products = new WP_Query( $args );

        $woocommerce_loop['columns'] = $columns;

        if ( $products->have_posts() ) : ?>

            <?php if ( shortcode_exists('title') ) : ?>
                <?php echo do_shortcode('[title text="'. $title .'" link="' . get_term_link( $cat, 'product_cat' ) . '" link_text="' . $link_text . '"]'); ?>
            <?php else : ?>
                <?php echo '<h2>'. $title .'</h2>'; ?>
            <?php endif; ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                    <?php woocommerce_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

        <?php endif;

        wp_reset_postdata();
    }

    return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

} add_shortcode( 'custom_bestselling_product_by_categories', 'bestselling_products_by_categories' );

----------------
You can use this by calling it as:
<?php echo do_shortcode('[custom_bestselling_product_by_categories cats="' . $term->term_id . '"]'); ?>
-------------------
Since none of the answers is a solution to the author's question, here is what I came up with. This is a shortcode snippet that lists popular products by categories. By popular I mean most sold products ( as in total sales).

function bestselling_products_by_categories( $atts ){

    global $woocommerce_loop;

    extract(shortcode_atts(array(
        'cats' => '',   
        'tax' => 'product_cat', 
        'per_cat' => '5',   
        'columns' => '5',
        'include_children' => false,
        'title' => 'Popular Products',
        'link_text' => 'See all',
    ), $atts));

    if(empty($cats)){
        $terms = get_terms( 'product_cat', array('hide_empty' => true, 'fields' => 'ids'));
        $cats = implode(',', $terms);
    }

    $cats = explode(',', $cats);

    if( empty($cats) )
        return '';

    ob_start();

    foreach($cats as $cat){

        // get the product category
        $term = get_term( $cat, $tax);

        // setup query
        $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $per_cat,            
            'meta_key'              => 'total_sales',
            'orderby'               => 'meta_value_num',
            'tax_query' => array(               
                array(
                    'taxonomy' => $tax,
                    'field' => 'id',
                    'terms' => $cat,
                    'include_children' => $include_children,
                )
            ),
            'meta_query'            => array(
                array(
                    'key'       => '_visibility',
                    'value'     => array( 'catalog', 'visible' ),
                    'compare'   => 'IN'
                )
            )
        );

        // set woocommerce columns
        $woocommerce_loop['columns'] = $columns;

        // query database
        $products = new WP_Query( $args );

        $woocommerce_loop['columns'] = $columns;

        if ( $products->have_posts() ) : ?>

            <?php if ( shortcode_exists('title') ) : ?>
                <?php echo do_shortcode('[title text="'. $title .'" link="' . get_term_link( $cat, 'product_cat' ) . '" link_text="' . $link_text . '"]'); ?>
            <?php else : ?>
                <?php echo '<h2>'. $title .'</h2>'; ?>
            <?php endif; ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                    <?php woocommerce_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

        <?php endif;

        wp_reset_postdata();
    }

    return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';

} add_shortcode( 'custom_bestselling_product_by_categories', 'bestselling_products_by_categories' );
You can use this by calling it as:

<?php echo do_shortcode('[custom_bestselling_product_by_categories cats="' . $term->term_id . '"]'); ?>
This shortcode has some options:

cats : the category ID or comma-separated IDs to retrieve the products from.

tax : the taxonomy to get the products from, default is product_cat

per_cat : number of products to retrieve

columns : number of columns to display

include_children : if false only direct children of the category will be displayed, if true then children of children will be displayed

title : title to display

link_text : the link text linked to the store

Notice that this snippet assumes you have a shortcode named title and it takes a few other parameters such as link and link_text arguments. You can always change this according to your theme.

Hope it helps.