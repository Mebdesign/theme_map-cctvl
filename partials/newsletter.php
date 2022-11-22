<?php
/*
Template Name: newsletter
*/
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php get_template_part('navbar'); ?>

        
        <div class="row">
            <div class="col-8">
                <div class="card my-4 p-3"> 
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                        endwhile; else: ?>
                        <p>Sorry, no posts matched your criteria.</p>
                    <?php endif; ?>
                </div> 
            </div>  
            <div class="col-4">
                <div class="card my-4 p-3"> 
                <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v14.0" nonce="Ieqj5ykI"></script>

                    <div class="fb-page" 
                    data-href="https://www.facebook.com/cctvl4541/" 
                    data-tabs="timeline" 
                    data-width="500" 
                    data-height="" 
                    data-small-header="false" 
                    data-adapt-container-width="true" 
                    data-hide-cover="false" 
                    data-show-facepile="false">
                        <blockquote cite="https://www.facebook.com/cctvl4541/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cctvl4541/">cctvl4541</a></blockquote>
                    </div>
                </div> 
            </div>            
        </div>


        <?php get_footer() ?>

    </main>
        
        <?php /*get_template_part('aside-rtl'); */?> 
        
        <?php wp_footer(); ?>

  </body>

</html>    