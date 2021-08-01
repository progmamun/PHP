<?php
//page-articles.php
// Template Name: Articles
?>
<?php get_header();?>

<div class="entry-content">
<?php
$args = array(
    // 'post_type' => 'country',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'category_name' => 'asia,europe',
);

$loop = new WP_Query($args);

if ($loop->have_posts()):
    while ($loop->have_posts()): $loop->the_post();
        ?>
		<div class="post-content">
		    <?php
        the_post_thumbnail();
        the_title();
        the_except();
        ?>
		</div>
		    <?php //Display post content
    endwhile;
endif;

wp_reset_query();
?>

<?php // second post?>
<?php
$args = array(
    'post_type' => 'country',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'tax_query' => array(
        array(
            'taxonomy' => 'continent',
            'field' => 'slug',
            'terms' => 'south-america',
            // 'terms' =>array('south-america','europe')

        ),
    ),
);

$second_loop = new WP_Query($args);

if ($second_loop->have_posts()):
    while ($second_loop->have_posts()): $second_loop->the_post();?>

		    <div class="post-content">
		        <?Php

        the_post_thumbnail();
        the_title();
        the_except();
        the_field('capital');
        the_field('population');?>
		        </div>
		        <?php

        //Display post content
    endwhile;
endif;
?>
</div>

<?php get_footer();?>