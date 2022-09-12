<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anahian
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	
<div class="widget">
                        <div class="widget-author">
                            <a href="author.html" class="image">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/me.jpg" alt="">
                            </a>
                            <h6>
                                <span>Hi, I'm Abdullah Nahian</span>
                            </h6>
                            <p>A petite and ordinary man. I like working with web design and development. I also try to read, write and make videos on this subject.
                        </p>
                    
                    
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--widget-latest-posts-->
                    <div class="widget ">
                        <div class="section-title">
                            <h5>Latest Posts</h5>
                        </div>
                        <ul class="widget-latest-posts">
                        <?php
                        
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'order' => 'DESC'
                        );
                        $query = new WP_Query( $args );
						if ( $query -> have_posts() ) :

							/* Start the Loop */
                            $i = 0;
							while ( $query -> have_posts() ) :
								$query -> the_post();
                                $i++;
								?>
									
                                    
                            
                            <li class="last-post">
                                <div class="image">
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="nb"><?php echo $i;?></div>
                                <div class="content">
                                    <p>
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                    </p>
                                    <small>
                                        <span class="icon_clock_alt"></span> <?php echo get_the_date(); ?></small>
                                </div>
                            </li>
								<?php

							endwhile;

						endif;
						?>
                        </ul>
                    </div>
                    <!--/-->
                    
                    <!--widget-categories-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Categories</h5>
                        </div>
                        <ul class="widget-categories">
                        <?php
$categories = get_categories( array(
	'orderby' => 'name',
	'order'   => 'ASC'
) );

foreach( $categories as $category ) {
    ?>
        <li>
            <a href="<?php echo get_category_link( $category->term_id );?>" class="categorie"><?php echo $category->name;?></a>
            <span class="ml-auto"><?php echo $category->count; ?> Posts</span>
        </li>
    <?php
} ?>
                    </div>
                    <!--/-->
                </div>
</aside><!-- #secondary -->
