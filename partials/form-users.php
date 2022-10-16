<?php
/*
    Template Name: New user
*/
?>

<?php 
acf_form_head(); 

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

        </div>
      </div>


      <?php get_footer() ?>

</main>
    
    <?php /*get_template_part('aside-rtl'); */?> 
    
    <?php wp_footer(); ?>

</body>

</html>  