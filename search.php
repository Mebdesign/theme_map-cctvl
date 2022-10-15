<?php
    /*
    Template Name: Search Page
    */
?>

<?php 
    $search = get_search_query();    
    // filter
    function my_posts_where( $where  ) {
        $where = str_replace("meta_key = 'localisation_$", "meta_key LIKE 'localisation_%", $where );
        $where = str_replace("meta_key = 'copieurs_et_impressions_$", "meta_key LIKE 'copieurs_et_impressions_%", $where );
        $where = str_replace("meta_key = 'tel_mobiles_$", "meta_key LIKE 'tel_mobiles_%", $where );
        $where = str_replace("meta_key = 'tel_fixes_$", "meta_key LIKE 'tel_fixes_%", $where );

        return $where ;
    }
    add_filter('posts_where', 'my_posts_where');
    // vars
    $nom_du_site = $search;


    $args = array(
        'numberposts'	=> -1,
        'post_type' => 'site', 
        'meta_query'    => array(
            'relation'      => 'OR',
            array(
                'key'       => 'telephone',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),
            array(
                'key'       => 'mobile',
                'value'     => $search,
                'compare'   => 'LIKE'
            ), 
            array(
                'key'       => 'nom_du_service',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),
            array(
                'key'       => 'contact_de_la_direction',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),                                      
            array(
                'key'       => 'adresse',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),
            array(
                'key'       => 'localisation_$_nom_du_site',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'copieurs_et_impressions_$_marque',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'copieurs_et_impressions_$_prestataire',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'copieurs_et_impressions_$_contact',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'copieurs_et_impressions_$_materiel',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_mobiles_$_nom',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_mobiles_$_lignes_mobiles',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_mobiles_$_prestataire',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_fixes_$_prestataires',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_fixes_$_nom',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_fixes_$_contact',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_fixes_$_telephones_fixes',
                'compare'   => 'LIKE',
                'value'     => $search,
            ),
            array(
                'key'       => 'tel_fixes_$_internet',
                'compare'   => 'LIKE',
                'value'     => $search,
            )                                                                                                                                                                  
        )        
    );

    $the_query = new WP_Query( $args );
   
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
            <div class="col-lg-6">
            <?php if( $the_query->have_posts() ): ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php //if( $post->ID ===  $searchID ):  ?>
                        <div class="card mb-3">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Recherche : <?php echo get_search_query(); ?> trouvé dans :</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="?p=<?php echo($post->ID) . '&id=' . $post->ID; ?>" class="btn btn-outline-primary btn-sm mb-0">Détail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3 pb-0">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">                    
                                        <div class="d-flex flex-column">
                                            <h3 class="mb-1 text-dark font-weight-bold text-sm"><?php the_title();  ?></h3>
                                                <?php $nom_du_service = get_field( "nom_du_service" ); ?>
                                                <?php $contact_de_la_direction = get_field( "contact_de_la_direction" ); ?>
                                                <?php $email = get_field( "email" ); ?>
                                                <?php $telephone = get_field( "telephone" ); ?>  
                                                <?php $adresse = get_field( "adresse" ); ?>

                                                <span class="mb-2 text-xs">Responsable du site : <?php  echo($contact_de_la_direction); ?></span>
                                                <span class="mb-2 text-xs">Nom du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($nom_du_service); ?></span></span>
                                                <span class="mb-2 text-xs">Adresse du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($adresse); ?></span></span>
                                                <span class="mb-2 text-xs">Adresse email: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($email); ?></span></span>
                                                <span class="text-xs">Standard: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($telephone); ?></span></span>  
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php //endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>                
            <?php wp_reset_query(); ?>
            </div>
      </div>

      <?php get_footer() ?>

</main>
        
        <?php /*get_template_part('aside-rtl'); */?> 
        
        <?php wp_footer(); ?>

  </body>

</html>    