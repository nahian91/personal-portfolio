<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package anahian
 */

?>

	<!--newslettre-->
<section class="newslettre">
        <div class="container-fluid">
            <div class="newslettre-width text-center">
                <div class="newslettre-info">
                    <h5>Subscribe to our Newslatter</h5>
                    <p> Sign up for free and be the first to get notified about new posts. </p>
                </div>
                <form action="#" class="newslettre-form">
                    <div class="form-flex">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email adress" required="required">
                        </div>
                        <button class="submit-btn" type="submit">Subscribe</button>
                    </div>
                </form>
                <div class="social-icones">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>Facebook</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!--footer-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <p>© Copyright 2021
                            <a href="#">AssiaGroupe</a>, All rights reserved.</p>
                    </div>
                    <div class="back">
                        <a href="#" class="back-top">
                            <i class="arrow_up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--Search-form-->
    <div class="search">
        <div class="container-fluid">
            <div class="search-width  text-center">
                <button type="button" class="close">
                    <i class="icon_close"></i>
                </button>
                <form class="search-form" action="#">
                    <input type="search" value="" placeholder="What are you looking for?">
                    <button type="submit" class="search-btn">search</button>
                </form>
            </div>
        </div>
    </div>
    <!--/-->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
