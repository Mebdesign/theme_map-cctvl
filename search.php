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
        $where = str_replace("meta_key = 'ressource_$", "meta_key LIKE 'ressource_%", $where );

        return $where ;
    }
    add_filter('posts_where', 'my_posts_where');

    $siteargs = array(
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

    $docargs = array(
        'numberposts'	=> -1,
        'post_type' => 'documentation',
        'meta_query'    => array(
            'relation'      => 'OR',
            array(
                'key'       => 'titre_du_document',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),
            array(
                'key'       => 'categories',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),                       
            array(
                'key'       => 'ressource_$_description',
                'value'     => $search,
                'compare'   => 'LIKE'
            ),
        )      
    );

    $the_query = new WP_Query( $siteargs );
    $the_query_doc = new WP_Query( $docargs );
   
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
            <div class="col-lg-8">
            <?php if( $the_query->have_posts() ): ?>
                
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <div class="card mb-3">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-8 d-flex align-items-center">
                                <h6 class="mb-0">Recherche <span style="margin-bottom:0; padding: 2px 20px;" class="btn bg-gradient-success toast-btn"><?php echo get_search_query(); ?></span> trouvé dans : <?php the_title();  ?></h6>
                                </div>
                                <div class="col-4 text-end">
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
                                        <?php $mobile = get_field( "mobile" ); ?> 
                                        <?php $adresse = get_field( "adresse" ); ?>

                                        <span class="mb-2 text-xs">Responsable du site : <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($contact_de_la_direction); ?></span></span>
                                        <span class="mb-2 text-xs">Nom du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($nom_du_service); ?></span></span>
                                        <span class="mb-2 text-xs">Adresse du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($adresse); ?></span></span>
                                        <span class="mb-2 text-xs">Adresse email: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($email); ?></span></span>
                                        <span class="mb-2 text-xs">Standard: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($telephone); ?></span></span>
                                        <span class="mb-2 text-xs">Mobile: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($mobile); ?></span></span>    
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>                
            <?php wp_reset_query(); ?>

            <?php if( $the_query_doc->have_posts() ): ?>
                <?php while ( $the_query_doc->have_posts() ) : $the_query_doc->the_post(); ?>
                    <?php $category = get_field( "categories" ); ?>

                    <?php if( have_rows('ressource') ): ?>
                    <?php while( have_rows('ressource') ) : the_row(); ?>
                        <?php $doc = get_sub_field( "document" ); ?>
                        <?php $description = get_sub_field( "description" ); ?>
                        
                        <div class="card mb-3">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-8 d-flex align-items-center">
                                    <h6 class="mb-0">Recherche <span style="margin-bottom:0; padding: 2px 20px;" class="btn bg-gradient-success toast-btn"><?php echo get_search_query(); ?></span> trouvé dans : <?php the_title();  ?></h6>
                                    </div>
                                    <div class="col-4 text-end">
                                        <a href="<?php  echo($doc); ?>" target="_blank" class="btn btn-outline-primary btn-sm mb-0">PDF</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3 pb-0">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">                    
                                        <div class="d-flex flex-column">
                                            <h3 class="mb-1 text-dark font-weight-bold text-sm"><?php the_title();?></h3>
                                            <span class="mb-2 text-xs font-weight-bold">Description: <span class="text-dark ms-sm-2"><?php echo($description); ?></span></span>
                                            <span class="mb-2 text-xs font-weight-bold">Catégorie: <span class="text-dark ms-sm-2">
                                                <?php   
                                                    if( $category ): ?> 
                                                        <?php foreach( $category as $cat ): ?>
                                                            <?php echo esc_html( $cat->name ); ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                            </span></span>   
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endwhile ?>
                    <?php endif ?>     
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