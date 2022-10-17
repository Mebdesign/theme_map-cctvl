<?php
/*
    Template Name: New user
*/
?>

<?php 
acf_form_head(); 

$posts = get_posts( array(
    'posts_per_page'	=> 5,
    'post_type' => 'utilisateurs')); 

$args = array(
        'post_id' => 'new_post', // On va créer une nouvelle publication
        'new_post' => array(
            'post_type' => 'utilisateurs', // Enregistrer dans l'annuaire
            'post_status' => 'draft', // Enregistrer en brouillon
        ),
        'post_title' => true,
        'field_groups' => array( 251 ), // L'ID du post du groupe de champs
        'submit_value' => 'Envoyer', // Intitulé du bouton
        'updated_message' => "Votre demande a bien été prise en compte.",
    );
?>
<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php acf_form($args); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Les 5 derniers arrivants</h6>
                </div>
                <div class="card-body pt-4 p-3">
                <ul class="list-group">
                <?php if( $posts && current_user_can( 'edit_posts' )):  ?>    
                    <?php foreach( $posts as $post ): ?>
                    <?php setup_postdata( $post ) ?>
                    <?php $affectation = get_field( "service_d’affectation_" ); ?>
                    <?php $poste = get_field( "poste" ); ?>
                    <?php $nom = get_field( "nom" ); ?>
                    <?php $prenom = get_field( "prenom" ); ?>
                    <?php $email = get_field( "email" ); ?> 

                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm"><?php  echo($contact_de_la_direction); ?></h6>
                                <span class="mb-2 text-xs">Service d'affectation: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($affectation); ?></span></span>
                                <span class="mb-2 text-xs">Poste: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($poste); ?></span></span>
                                <span class="mb-2 text-xs">Nom: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($nom); ?></span></span>
                                <span class="mb-2 text-xs">Prénom: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($prenom); ?></span></span> 
                            </div>
                            <div class="ms-auto text-end">
                            <?php if( current_user_can('administrator')) : ?>
                                <a class="btn btn-link text-dark px-3 mb-0" href="<?php  echo(get_edit_post_link($id)) ?>"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            <?php endif ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>                        
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