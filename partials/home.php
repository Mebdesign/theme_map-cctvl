<?php
/*
Template Name: home
*/
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php get_template_part('navbar'); ?>

        
        <div class="row">
            <div class="col-12">
                <div class="card my-4 p-3"> 
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                        endwhile; else: ?>
                        <p>Sorry, no posts matched your criteria.</p>
                    <?php endif; ?>
                </div> 
            </div>  
        </div>

        <?php get_footer() ?>

    </main>
        
        <?php /*get_template_part('aside-rtl'); */?> 
        
        <?php wp_footer(); ?>

  </body>

</html>    