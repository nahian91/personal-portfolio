<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package anahian
 */

get_header();
?>

	<main id="primary" class="site-main">

	<!--post-default-->
    <section class="section pt-55 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-20">
                    <!--Post-single-->
                    <div class="post-single">
                        <div class="post-single-image">
                            <?php the_post_thumbnail();?>
                        </div>
                        <div class="post-single-content">
                            <a href="blog-grid.html" class="categorie"><?php the_category(', '); ?></a> 
                            <h4><?php the_title();?></h4>
                            <div class="post-single-info">
                                <ul class="list-inline">
									<li><?php echo get_avatar( 'nahiansylhet@gmail.com', 64 ); ?>
														</li>
														<li>
															<?php  $author_id = get_the_author_meta( 'ID' );  ?>
															<a href="author.html"><?php echo get_the_author_meta( 'nicename', $author_id );?></a>
														</li>
                                    <li class="dot"></li>
                                    <li>January 15, 2021</li>
                                    <li class="dot"></li>
                                    <li>3 comments</li>
                                </ul>
                            </div>
                        </div>
                  
                        <div class="post-single-body">
                            <?php the_content(); ?>                           
                        </div>
                    </div> <!--/-->
                    
                    <div class="row">
                        <div class="col-lg-12">
                        <!--widget-author-->
                        <div class="widget">
                            <div class="widget-author">
                                <a href="author.html" class="image">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/author/1.jpg" alt="">
                                </a>
                                <h6>
                                    <span>Hi, I'm Abdullah Nahian</span>
                                </h6>
                                <p>A petite and ordinary man. I like working with web design and development. I also try to read, write and make videos on this subject./p>
                        
                        
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
                        <!--/-->
                        </div>
                    </div>
                   <?php wpb_posts_nav(); ?>
                    <!--next & previous-posts-->

                    <!--widget-comments-->
                    <div class="widget mb-50">
                        <div class="title">
                            <h5>3 Comments</h5>
                        </div>
						<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
                        <ul class="widget-comments">
                            <li class="comment-item">
                                <img src="assets/img/user/1.jpg" alt="">
                                <div class="content">
                                    <ul class="info list-inline">
                                        <li>Mohammed Ali</li>
                                        <li class="dot"></li>
                                        <li> January 15, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat quod
                                        non fugiat aliquid sit similique!
                                    </p>
                                    <div>
                                        <a href="#" class="link">
                                            <i class="arrow_back"></i> Reply</a>
                                    </div>
                                </div>
                            </li>
                            <li class="comment-item">
                                <img src="assets/img/author/1.jpg" alt="">
                                <div class="content">
                                    <ul class="info list-inline">
                                        <li>Simon Albert</li>
                                        <li class="dot"></li>
                                        <li> January 15, 2021</li>
                                    </ul>
                        
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat quod
                                        non fugiat aliquid sit similique!
                                    </p>
                                    <div>
                                        <a href="#" class="link">
                                            <i class="arrow_back"></i> Reply</a>
                                    </div>
                                </div>
                            </li>
                            <li class="comment-item">
                                <img src="assets/img/user/2.jpg" alt="">
                                <div class="content">
                        
                                    <ul class="info list-inline">
                                        <li>Adam bobly</li>
                                        <li class="dot"></li>
                                        <li> January 15, 2021</li>
                                    </ul>
                        
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat quod
                                        non fugiat aliquid sit similique!
                                    </p>
                        
                                    <div>
                                        <a href="#" class="link">
                                            <i class="arrow_back"></i> Reply</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                       <!--Leave-comments-->
                        <div class="title">
                            <h5>Leave a Reply</h5>
                        </div>
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
 if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
						?>
                        <form class="widget-form" action="#" method="POST" id="main_contact_form">
                            <p>Your email adress will not be published ,Requied fileds are marked*.</p>
                            <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required">
                                    </div>
                                </div>
                                <div class="col-12 mb-20">
                                    <div class="form-group">
                                        <input type="text" name="website" id="website" class="form-control" placeholder="website">
                                    </div>
                                    <label>
                                        <input name="name" type="checkbox" value="1" required="required"> 
                                       <span>save my name , email and website in this browser for the next time I comment.</span>                                   
                                    </label>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn-custom">
                                        Post Comment
                                    </button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4">
					<?php get_sidebar();?>
				</div>
            </div>
        </div>
    </section><!--/-->

	</main><!-- #main -->

<?php
get_footer();
