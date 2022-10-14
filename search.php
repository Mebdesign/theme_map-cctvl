<?php
    /*
    Template Name: Search Page
    */
?>

<?php $posts = get_posts( array(
  'posts_per_page'	=> -1,
  'post_type' => 'site')); 

   $search = get_search_query();
   $searchID = $post->ID;

?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Résultat de la recherche pour : <?php echo get_search_query(); ?></h6>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">Détail</button>
                        </div>
                    </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">                    
                                <div class="d-flex flex-column">
                                    <h3 class="mb-1 text-dark font-weight-bold text-sm"><?php the_title();  ?></h3>
                                    <?php if( $posts ):  ?>
                                        <?php foreach( $posts as $post ): ?>
                                            <?php if( $post->ID ===  $searchID ):  ?>
                                                <?php setup_postdata( $post ) ?>
                                                <?php $nom_du_service = get_field( "nom_du_service" ); ?>
                                                <?php $contact_de_la_direction = get_field( "contact_de_la_direction" ); ?>
                                                <?php $email = get_field( "email" ); ?>
                                                <?php $telephone = get_field( "telephone" ); ?>
                                                <?php $telephones_fixes = get_field( "tel_fixes" ); ?>  

                                                <span class="mb-2 text-xs">Responsable du site : <?php  echo($contact_de_la_direction); ?></span>
                                                <span class="mb-2 text-xs">Nom du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($nom_du_service); ?></span></span>
                                                <span class="mb-2 text-xs">Adresse email: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($email); ?></span></span>
                                                <span class="text-xs">Standard: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($telephone); ?></span></span>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        </ul>
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