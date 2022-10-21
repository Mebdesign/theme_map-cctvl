<?php
/*
Template Name: Documentation
*/

$posts = get_posts( 
    array(
    'posts_per_page'	=> -1,
    'post_type' => 'documentation'
    )
); 
  

  
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
            <div class="col-lg-8">
            <?php if( $posts ):  ?>
                <?php foreach( $posts as $post ): ?>   
                    <?php setup_postdata( $post ) ?>   
                    <?php $ressource = get_field( "ressource" ); ?>   
                        <?php if( have_rows('ressource') ): ?>
                            <?php while( have_rows('ressource') ) : the_row(); ?>                   
                                <?php $doc = get_sub_field( "document" ); ?>
                                <?php $description = get_sub_field( "description" ); ?>
                                <?php $category = get_field( "categories" ); ?>
                                <div class="card mb-3">
                                    <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0"><?php echo the_title(); ?></h6>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-body p-3 pb-0">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column" style="max-width:80%; ">
                                                <h6 class="mb-1 text-dark font-weight-bold text-sm">                                                     
                                                <?php   
                                                    if( $category ): ?> 
                                                        <?php foreach( $category as $cat ): ?>
                                                            <?php echo( $cat->name ) ; ?>
                                                        <?php endforeach; ?>

                                                    <?php endif; ?>
                                                </h6>
                                                <span class="text-xs"> <?php echo($description); ?> </span>
                                            </div>
                                            <div class="d-flex align-items-center text-sm">
                                                <?php the_time('d/m/Y'); ?>
                                                <a href="<?php echo($doc); ?>" target='_blank' class="btn btn-outline-success btn-sm mb-0 mx-1"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> PDF</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>                
            </div>
      </div>


      <?php get_footer() ?>

</main>
    
    <?php /*get_template_part('aside-rtl'); */?> 
    
    <?php wp_footer(); ?>

</body>

</html>  