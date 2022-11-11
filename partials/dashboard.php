<?php
/*
Template Name: Dashboard
*/

$posts = get_posts(
  array(
  'posts_per_page'	=> -1,
  'post_type' => 'site')
);

$copieurs = array();
$internet = array();
$phones = array();
$mobiles = array();

if( $posts ):
  foreach( $posts as $post ):
      setup_postdata( $post );
      if( have_rows('copieurs_et_impressions') ):
          while ( have_rows('copieurs_et_impressions') ) : the_row();
              $materiel = array_push($copieurs, get_sub_field('materiel'));
          endwhile;
      else :
          echo('No copieurs, ');
      endif;

      if( have_rows('tel_fixes') ):
        while ( have_rows('tel_fixes') ) : the_row();
            $materiel = array_push($internet, get_sub_field('internet'));
        endwhile;
      else :
          echo('No copieurs, ');
      endif;

      if( have_rows('tel_mobiles') ):
        while ( have_rows('tel_mobiles') ) : the_row();
            $materiel = array_push($mobiles, get_sub_field('lignes_mobiles'));
        endwhile;
      else :
          echo('No copieurs, ');
      endif;

      if( have_rows('tel_fixes') ):
        while ( have_rows('tel_fixes') ) : the_row();
            $materiel = array_push($phones, get_sub_field('telephones_fixes'));
        endwhile;
      else :
          echo('No copieurs, ');
      endif;

  endforeach;
  wp_reset_postdata();
endif;
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">printer</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 ">Nombre de copieurs</p>
                <h4 class="mb-0"> <?php echo count($copieurs); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>d'impressions qu'à la précédente analyse</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">language</i>
              </div>
              <div class="text-end pt-1">
              <p class="text-sm mb-0 ">Nombre de site avec Internet</p>
                <h4 class="mb-0"><?php echo count($internet); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>d'augmentation qu'à la précédente analyse</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">call</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0">Nombre de lignes fixes</p>
                <h4 class="mb-0"><?php echo count($phones); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">smartphone</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0">Nombre de mobiles</p>
                <h4 class="mb-0"><?php echo count($mobiles); ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
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