<?php
/*
Template Name: Dashboard
*/

$posts = get_posts(
  array(
  'posts_per_page'	=> -1,
  'post_type' => 'site')
);

$copieurs                  = array();
$internet                  = array();
$phones                    = array();
$mobiles                   = array();
$engaged_line              = array();
$engaged_line_fixes        = array();
$line_in_transfer          = array();
$line_in_resiliation       = array();
$line_in_transfer_fixes    = array();
$line_in_resiliation_fixes = array();

if( $posts ):
  foreach( $posts as $post ):
      setup_postdata( $post );

      // Printers
      if( have_rows('copieurs_et_impressions') ):
          while ( have_rows('copieurs_et_impressions') ) : the_row();
              $materiel = array_push($copieurs, get_sub_field('materiel'));
          endwhile;
      endif;

      // Mobiles
      if( have_rows('tel_mobiles') ):
        while ( have_rows('tel_mobiles') ) : the_row();
            array_push($mobiles, get_sub_field('lignes_mobiles'));
            $fin_dengagement = get_sub_field('fin_dengagement');
            $new_fin_dengagement = date("d/m/Y", strtotime($fin_dengagement));
            $fin_dengagement_time   =   strtotime($fin_dengagement);
            $current_time   =   strtotime(date("Y-m-d"));
            $status = get_sub_field('status');

            if($fin_dengagement_time > $current_time) :
              array_push($engaged_line, get_sub_field('lignes_mobiles'));
            endif;
            foreach( $status as $stat ):
              if( $stat == 'En Porta.' ):
                array_push($line_in_transfer, get_sub_field('lignes_mobiles'));
              endif ;
              if( $stat == 'En Résil.' ):
                array_push($line_in_resiliation, get_sub_field('lignes_mobiles'));
              endif ;
            endforeach;

        endwhile;
      endif;

      // Internet
      if( have_rows('tel_fixes') ):
        while ( have_rows('tel_fixes') ) : the_row();
            $materiel = array_push($internet, get_sub_field('internet'));
        endwhile;
      endif;

      // Lignes fixes
      if( have_rows('tel_fixes') ):
        while ( have_rows('tel_fixes') ) : the_row();
            array_push($phones, get_sub_field('telephones_fixes'));
            $fin_dengagement = get_sub_field('fin_dengagement');
            $new_fin_dengagement = date("d/m/Y", strtotime($fin_dengagement));
            $fin_dengagement_time   =   strtotime($fin_dengagement);
            $current_time   =   strtotime(date("Y-m-d"));
            $status = get_sub_field('status');

            if($fin_dengagement_time > $current_time) :
              array_push($engaged_line_fixes, get_sub_field('telephones_fixes'));
            endif;
            foreach( $status as $stat ):
              if( $stat == 'En Porta.' ):
                array_push($line_in_transfer_fixes, get_sub_field('telephones_fixes'));
              endif ;
              if( $stat == 'En Résil.' ):
                array_push($line_in_resiliation_fixes, get_sub_field('telephones_fixes'));
              endif ;
            endforeach;
        endwhile;
      endif;

  endforeach;
  wp_reset_postdata();
endif;
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row mb-5">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">printer</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0">Nombre de copieurs</p>
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
                <p class="text-sm mb-0">Nombre de lignes mobiles</p>
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

      <!-- Mobiles -->
      <div class="row mb-5">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div id="filtered_mobile">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">smartphone</i>
              </div>
            </div>
            <div class="card-header mt-3 pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6 class="text-uppercase">Lignes mobiles en cours d'engagement <?php echo($args); ?></h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1"><?php echo count($engaged_line); ?> lignes</span> au total
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md all" href="#">Toutes les lignes</a></li>
                      <li><a class="dropdown-item border-radius-md engaged" href="#">Lignes engagées</a></li>
                      <li><a class="dropdown-item border-radius-md no-engaged" href="#">Lignes sans engagement</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateur</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ligne</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    if( $posts ):
                      foreach( $posts as $post ):
                          setup_postdata( $post );
                          if( have_rows('tel_mobiles') ):
                            while ( have_rows('tel_mobiles') ) : the_row();
                            $mobile = get_sub_field('lignes_mobiles');
                            $prestataire = get_sub_field('prestataire');
                            $nom = get_sub_field('nom');
                            $fin_dengagement = get_sub_field('fin_dengagement');
                            $new_fin_dengagement = date("d/m/Y", strtotime($fin_dengagement));
                            $fin_dengagement_time   =   strtotime($fin_dengagement);
                            $current_time   =   strtotime(date("Y-m-d"));

                              if($fin_dengagement_time > $current_time) :
                                array_push($engaged_line, get_sub_field('lignes_mobiles'));
                                ?>
                                <div id="phone_lines"></div>
                                  <tr>
                                    <td>
                                      <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                          <i class="material-icons text-danger text-gradient me-3">smartphone</i>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm text-uppercase"><?php echo($nom); ?></h6>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <span class="text-xs font-weight-bold"> <?php echo($mobile); ?> </span>
                                    </td>
                                    <td class="align-middle">
                                      <span class="text-xs font-weight-bold"> <?php echo($new_fin_dengagement); ?> </span>
                                    </td>
                                  </tr>
                                <?php
                              endif;
                            endwhile;
                          endif;
                      endforeach;
                      wp_reset_postdata();
                    endif;
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div></div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Lignes mobiles en cours de portabilité</h6>
              <p class="text-sm">
                <i class="fa fa-sync text-warning" aria-hidden="true"></i>
                <span class="font-weight-bold"><?php echo count($line_in_transfer); ?></span> lignes en cours de transfert...
                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                <span class="font-weight-bold"><?php echo count($line_in_resiliation); ?></span> lignes en cours de résiliation...
              </p>

            </div>
            <div class="card-body p-3">
              <?php
              ?>
              <div class="timeline timeline-one-side">
                <?php
                if( $posts ):
                  foreach( $posts as $post ):
                      setup_postdata( $post );
                      if( have_rows('tel_mobiles') ):
                        while ( have_rows('tel_mobiles') ) : the_row();
                        $mobile = get_sub_field('lignes_mobiles');
                        $status = get_sub_field('status');
                        $nom = get_sub_field('nom');
                        $transfet_date = get_sub_field('date_de_portabilite');
                        $formatted_transfer_date = date("d/m/Y", strtotime($transfet_date));
                        foreach( $status as $stat ):
                          if( $stat == 'En Porta.' ): ?>
                          <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                              <span class="timeline-step">
                                <i class="material-icons text-warning text-gradient">sync</i>
                              </span>
                              <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">En cours de transfert, <?php echo($nom); ?></h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Prévu le : <?php echo($formatted_transfer_date); ?> - <?php echo $mobile; ?></p>
                              </div>
                            </div>
                          </div>
                            <?php
                          endif ;
                          if( $stat == 'En Résil.' ): ?>
                            <div class="timeline timeline-one-side">
                              <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                  <i class="material-icons text-danger text-gradient">sync_disabled</i>
                                </span>
                                <div class="timeline-content">
                                  <h6 class="text-dark text-sm font-weight-bold mb-0">En cours de résiliation, <?php echo($nom); ?></h6>
                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Demande du : <?php echo($formatted_transfer_date); ?> - <?php echo $mobile; ?></p>
                                </div>
                              </div>
                            </div>
                              <?php
                            endif ;
                        endforeach;
                        endwhile;
                      endif;
                  endforeach;
                  wp_reset_postdata();
                endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Lignes fixes -->
      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div id="filtered_fixes">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i style="width:24px;" class="material-icons opacity-10">phone</i>
              </div>
            </div>
            <div class="card-header mt-3 pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6 class="text-uppercase">Lignes fixes en cours d'engagement</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1"><?php echo count($engaged_line_fixes); ?> lignes</span> au total
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md all_fixes" href="javascript:;">Toutes les lignes</a></li>
                      <li><a class="dropdown-item border-radius-md engaged_fixes" href="javascript:;">Lignes engagées</a></li>
                      <li><a class="dropdown-item border-radius-md no_engaged_fixes" href="javascript:;">Ligne sans engagement</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateur</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ligne</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if( $posts ):
                        foreach( $posts as $post ):
                            setup_postdata( $post );
                            if( have_rows('tel_fixes') ):
                              while ( have_rows('tel_fixes') ) : the_row();
                              $fixes                = get_sub_field('telephones_fixes');
                              $prestataire          = get_sub_field('prestataire');
                              $contact              = get_sub_field('contact');
                              $fin_dengagement      = get_sub_field('fin_dengagement');
                              $new_fin_dengagement  = date("d/m/Y", strtotime($fin_dengagement));
                              $fin_dengagement_time = strtotime($fin_dengagement);
                              $current_time         = strtotime(date("Y-m-d"));
                                if($fin_dengagement_time > $current_time) :
                                  ?>
                                    <tr>
                                      <td>
                                        <div class="d-flex px-2 py-1">
                                          <div class="d-flex flex-column justify-content-center">
                                            <i class="material-icons text-danger text-gradient me-3">phone</i>
                                          </div>
                                          <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-uppercase"><?php echo($contact); ?></h6>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <span class="text-xs font-weight-bold"> <?php echo($fixes); ?> </span>
                                      </td>
                                      <td class="align-middle">
                                        <span class="text-xs font-weight-bold"> <?php echo($new_fin_dengagement); ?> </span>
                                      </td>
                                    </tr>
                                  <?php
                                endif;
                              endwhile;
                            endif;
                        endforeach;
                        wp_reset_postdata();
                      endif;
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div></div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Lignes fixes en cours de portabilité</h6>
              <p class="text-sm">
                <i class="fa fa-sync text-warning" aria-hidden="true"></i>
                <span class="font-weight-bold"><?php echo count($line_in_transfer_fixes); ?></span> lignes en cours de transfert...
                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                <span class="font-weight-bold"><?php echo count($line_in_resiliation_fixes); ?></span> lignes en cours de résiliation...
              </p>
            </div>
            <div class="card-body p-3">
              <?php
              ?>
              <div class="timeline timeline-one-side">
                <?php
                if( $posts ):
                  foreach( $posts as $post ):
                      setup_postdata( $post );
                      if( have_rows('tel_fixes') ):
                        while ( have_rows('tel_fixes') ) : the_row();
                        $fixes = get_sub_field('telephones_fixes');
                        $status = get_sub_field('status');
                        $contact = get_sub_field('contact');
                        $transfet_date = get_sub_field('date_de_portabilite');
                        $formatted_transfer_date = date("d/m/Y", strtotime($transfet_date));
                        foreach( $status as $stat ):
                          if( $stat == 'En Porta.' ): ?>
                          <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                              <span class="timeline-step">
                                <i class="material-icons text-warning text-gradient">sync</i>
                              </span>
                              <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">En cours de transfert, <?php echo($contact); ?></h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Prévu le : <?php echo($formatted_transfer_date); ?> - <?php echo $fixes; ?></p>
                              </div>
                            </div>
                          </div>
                          <?php
                          endif ;
                          if( $stat == 'En Résil.' ): ?>
                            <div class="timeline timeline-one-side">
                              <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                  <i class="material-icons text-danger text-gradient">sync_disabled</i>
                                </span>
                                <div class="timeline-content">
                                  <h6 class="text-dark text-sm font-weight-bold mb-0">En cours de résiliation, <?php echo($contact); ?></h6>
                                  <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Demande du : <?php echo($formatted_transfer_date); ?> - <?php echo $fixes; ?></p>
                                </div>
                              </div>
                            </div>
                            <?php
                            endif ;
                        endforeach;
                        endwhile;
                      endif;
                  endforeach;
                  wp_reset_postdata();
                endif;
                ?>
              </div>
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