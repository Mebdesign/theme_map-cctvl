<?php $posts = get_posts( array(
  'posts_per_page'	=> -1,
  'post_type' => 'site'));

  if ( $args['id'] ) {
    $id = $args['id'];
  }

?>
<?php if( $posts ):  ?>
  <?php foreach( $posts as $post ): ?>
      <?php if( $post->ID ===  (int)$id ):  ?>
      <?php setup_postdata( $post ) ?>
      <?php $nom_du_service = get_field( "nom_du_service" ); ?>
      <?php $contact_de_la_direction = get_field( "contact_de_la_direction" ); ?>
      <?php $email = get_field( "email" ); ?>
      <?php $telephone = get_field( "telephone" ); ?>
      <?php $adresse = get_field( "adresse" ); ?>
      <?php $mobile = get_field( "mobile" ); ?>

      <div class="row mb-4">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Responsable du site</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm"><?php  echo($contact_de_la_direction); ?></h6>
                    <span class="mb-2 text-xs">Nom du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($nom_du_service); ?></span></span>
                    <span class="mb-2 text-xs">Adresse du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($adresse); ?></span></span>
                    <span class="mb-2 text-xs">Adresse email: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($email); ?></span></span>
                    <span class="mb-2 text-xs">Standard: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($telephone); ?></span></span>
                     <span class="mb-2 text-xs">Mobile: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($mobile); ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
                  <?php if( current_user_can('administrator')) : ?>
                    <a class="btn btn-link text-dark px-3 mb-0" href="<?php  echo(get_edit_post_link($id)) ?>"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  <?php endif ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">En attente de data...</h6>
                </div><!--
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small>23 - 30 March 2020</small>
                </div>-->
              </div>
            </div>
            <!--<div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Coût Mobile</h6>
                      <span class="text-xs">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - $ 2,500
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Couts Téléphonie/Internet</h6>
                      <span class="text-xs">27 March 2020, at 04:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,000
                  </div>
                </li>
              </ul>
            </div>
            -->
          </div>
        </div>
      </div>

      <?php  $telephones_fixes = get_field( "tel_fixes" ); ?>
        <div class="row"> <!-- start Télephones fixes -->
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-custom-brown shadow-custom-brown border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <h6 class="text-white ps-3">Téléphonie fixe - <?php the_title(); ?> </h6>
                    </div>
                    <div class="form-check form-switch d-flex align-items-center pe-3">
                        <input class="form-check-input ms-auto flexSwitchCheckDefault" type="checkbox" >
                    </div>
                  </div>
                </div>
                <div class="card-body card-body-toggled px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prestataire / Nom du site</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Numéros</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Internet</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fin d'engagement</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php if( have_rows('tel_fixes') ):
                            while( have_rows('tel_fixes') ) : the_row();
                              $fixes                = get_sub_field('telephones_fixes');
                              $prestataires         = get_sub_field('prestataires');
                              $internet             = get_sub_field('internet');
                              $contact              = get_sub_field('contact');
                              $nom                  = get_sub_field('nom');
                              $status               = get_sub_field('status');
                              $fin_dengagement      = get_sub_field('fin_dengagement');
                              $new_fin_dengagement  = date("d/m/Y", strtotime($fin_dengagement));
                              $fin_dengagement_time = strtotime($fin_dengagement);
                              $current_time         = strtotime(date("Y-m-d"));
                              if($fin_dengagement_time < $current_time)
                              {
                                $badge = 'success';

                              } elseif($fin_dengagement_time > $current_time){

                                $badge = 'danger';
                              }

                              ?>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm"><?php  echo($prestataires); ?></h6>
                                      <p class="text-xs text-secondary mb-0"><?php echo($nom);  ?></p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="text-xs font-weight-bold mb-0"><?php  echo($fixes); ?></p>
                                  <p class="text-xs text-secondary mb-0"><?php echo($contact); ?></p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <?php if( $status ): ?>
                                    <?php foreach( $status as $stat ): ?>
                                      <?php
                                            switch ($stat) {
                                              case 'Active':
                                                  echo '<span class="badge badge-sm bg-gradient-success">Active</span>';
                                                  break;
                                              case 'En Résil.':
                                                echo '<span class="badge badge-sm bg-gradient-warning">En résil.</span>';
                                                  break;
                                              case 'En Porta.':
                                                echo '<span class="badge badge-sm bg-gradient-warning">En porta.</span>';
                                                  break;
                                              case 'Résiliée':
                                                echo '<span class="badge badge-sm bg-gradient-danger">Résiliée</span>';
                                                  break;
                                            }
                                      ?>
                                      <?php endforeach; ?>
                                  <?php endif ?>
                                </td>
                                <td class="align-middle text-center">
                                  <?php $internet = get_sub_field('internet'); ?>
                                  <?php if( $internet ): ?>
                                    <?php foreach( $internet as $checked ): ?>
                                      <span class="text-secondary text-xs font-weight-bold"><?php  echo($checked); ?></span>
                                    <?php endforeach; ?>
                                  <?php endif ?>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-<?php echo $badge;?>"><?php  echo($new_fin_dengagement); ?></span>
                                </td>
                                <td class="align-middle">
                                  <?php if( current_user_can('administrator') ) : ?>
                                    <?php echo '<a class="text-secondary font-weight-bold text-xs" href="'. get_edit_post_link($id) .'">Edit</a>'; ?>
                                  <?php endif ?>
                                </td>
                              </tr>
                              <?php endwhile ?>
                              <?php else : ?>
                                <td class="align-middle">
                                  <p class="text-xs text-secondary mb-0"><?php echo("Pas d'informations renseignées en base de données") ?></p>
                                </td>
                          <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end Télephones fixes -->

        <div class="row"> <!-- start mobiles -->
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-custom-brown shadow-custom-brown border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                    <h6 class="text-white ps-3">Téléphonie Mobile- <?php the_title(); ?></h6>
                    </div>
                    <div class="form-check form-switch d-flex align-items-center pe-3">
                        <input class="form-check-input ms-auto flexSwitchCheckDefault" type="checkbox" >
                    </div>
                  </div>
                </div>
                <div class="card-body card-body-toggled  px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prestataire</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Numéros</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statuts</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fin d'engagement</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if( have_rows('tel_mobiles') ): ?>
                            <?php while( have_rows('tel_mobiles') ) : the_row(); ?>
                              <?php $mobiles = get_sub_field('lignes_mobiles'); ?>
                              <?php $prestataire = get_sub_field('prestataire'); ?>
                              <?php $nom = get_sub_field('nom'); ?>
                              <?php $fin_dengagement = get_sub_field('fin_dengagement'); ?>
                              <?php $new_fin_dengagement = date("d/m/Y", strtotime($fin_dengagement)); ?>
                              <?php $status = get_sub_field('status'); ?>

                              <?php
                                $fin_dengagement_time   =   strtotime($fin_dengagement);
                                $current_time   =   strtotime(date("Y-m-d"));

                                if($fin_dengagement_time < $current_time)
                                {
                                  $badge = 'success';

                                } elseif($fin_dengagement_time > $current_time){

                                  $badge = 'danger';
                                }
                            ?>

                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm"><?php  echo($prestataire); ?></h6>
                                      <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="text-xs font-weight-bold mb-0"><?php  echo($mobiles); ?></p>
                                  <p class="text-xs text-secondary mb-0"><?php  echo($nom); ?></p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <?php if( $status ):

                                    foreach( $status as $stat ):
                                        switch ($stat) {
                                          case 'Active':
                                              echo '<span class="badge badge-sm bg-gradient-success">Active</span>';
                                              break;
                                          case 'En Résil.':
                                            echo '<span class="badge badge-sm bg-gradient-warning">En résil.</span>';
                                              break;
                                          case 'En Porta.':
                                            echo '<span class="badge badge-sm bg-gradient-warning">En cours de portabilité</span>';
                                              break;
                                          case 'Résiliée':
                                            echo '<span class="badge badge-sm bg-gradient-danger">Résiliée</span>';
                                              break;
                                        }
                                      endforeach;
                                  endif ?>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-<?php echo $badge ?>"><?php  echo $new_fin_dengagement; ?></span>
                                  <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                </td>
                                <td class="align-middle">
                                  <?php if( current_user_can('administrator') ) : ?>
                                    <?php echo '<a class="text-secondary font-weight-bold text-xs" href="'. get_edit_post_link($id) .'">Edit</a>'; ?>
                                  <?php endif ?>
                                </td>
                              </tr>
                              <?php endwhile ?>
                              <?php else : ?>
                                <td class="align-middle">
                                  <p class="text-xs text-secondary mb-0"><?php echo("Pas d'informations renseignées en base de données") ?></p>
                                </td>
                          <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
        </div> <!-- end mobiles -->


        <div class="row"> <!-- start printers -->
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-custom-brown shadow-custom-brown border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h6 class="text-white ps-3">Copieurs & impressions - <?php the_title(); ?></h6>
                    </div>
                    <div class="form-check form-switch d-flex align-items-center pe-3">
                        <input class="form-check-input ms-auto flexSwitchCheckDefault" type="checkbox">
                    </div>
                  </div>
                </div>
                <div class="card-body card-body-toggled px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prestataire</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Matériel</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Volumétrie</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Numéro de contrat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lieu</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Début de de contrat</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fin de contrat</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if( have_rows('copieurs_et_impressions') ): ?>
                          <?php while( have_rows('copieurs_et_impressions') ) : the_row(); ?>
                          <?php $materiel = get_sub_field('materiel'); ?>
                          <?php $volumetrie = get_sub_field('volumetrie'); ?>
                          <?php $marque = get_sub_field('marque'); ?>
                          <?php $prestataire = get_sub_field('prestataire'); ?>
                          <?php $contact = get_sub_field('contact'); ?>
                          <?php $start = get_sub_field('debut_de_contrat'); ?>
                          <?php $start_date = date("d/m/Y", strtotime($start)); ?>
                          <?php $end = get_sub_field('fin_de_contrat'); ?>
                          <?php $end_date = date("d/m/Y", strtotime($end)); ?>
                          <?php $lieu = get_sub_field('lieu_du_copieur'); ?>
                          <?php $contrat = get_sub_field('numero_de_contrat'); ?>
                          <?php

                           $end_time   =   strtotime($end);
                           $cur_time   =   strtotime(date("Y-m-d"));

                            if( $end_time > strtotime("+3 months", $cur_time))
                            {

                              $badge = 'success';

                            } elseif($end_time > strtotime("+2 months", $cur_time)){

                              $badge = 'warning';

                            }
                            else{

                              $badge = 'danger';
                            }

                          ?>
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php  echo($prestataire); ?></h6>
                                    <p class="text-xs text-secondary mb-0"><?php  echo($contact); ?></p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($materiel); ?></p>
                                <p class="text-xs text-secondary mb-0"><?php  echo($marque); ?></p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">
                                  <?php
                                    if( have_rows('volumetrie') ):
                                      while( have_rows('volumetrie') ) : the_row();
                                        $n_b = get_sub_field('copies_n_b');
                                        $color = get_sub_field('copies_couleurs');
                                        $periode = get_sub_field('periode');
                                        echo('Noir et blanc : ' . $n_b . '</br>');
                                        echo('Couleur : ' . $color . '</br>');
                                  ?>
                                </p>
                                  <p class="text-xs text-secondary mb-0"><?php  echo($periode ); ?></p>
                                <?php  endwhile;
                                    else :
                                     ?> <p class="text-xs text-secondary mb-0">Non renseigné </p> <?php
                                    endif
                                ?>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">
                                  <?php
                                    if( $contrat):
                                        echo( $contrat );
                                  ?>
                                </p><?php
                                    else :
                                     ?> <p class="text-xs text-secondary mb-0">Non renseigné </p> <?php
                                    endif
                                ?>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($lieu); ?></p>
                                <p class="text-xs text-secondary mb-0"><?php  echo($marque); ?></p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold"><?php  echo($start_date); ?></span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="badge badge-sm bg-gradient-<?php echo $badge ?>"><?php echo $end_date; ?></span>
                              </td>
                              <td class="align-middle">
                                <?php if( current_user_can('administrator')  ) { ?>
                                  <?php echo '<a class="text-secondary font-weight-bold text-xs" href="'. get_edit_post_link($id) .'">Edit</a>'; ?>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php endwhile ?>
                          <?php else : ?>
                              <td class="align-middle">
                                <p class="text-xs text-secondary mb-0"><?php echo("Pas d'informations renseignées en base de données") ?></p>
                              </td>
                          <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end printers -->

        <div class="row"> <!-- start pc -->
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-custom-brown shadow-custom-brown border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <h6 class="text-white ps-3">Parc PC - <?php the_title(); ?></h6>
                    </div>
                    <div class="form-check form-switch d-flex align-items-center pe-3">
                        <input class="form-check-input ms-auto flexSwitchCheckDefault" type="checkbox">
                    </div>
                  </div>
                </div>
                <div class="card-body card-body-toggled px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantité</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">N° inventaire</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Désignation</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prestataire</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valeur</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Service</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Commentaire</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date d'achat</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de renouvellement</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if( have_rows('postes_clients') ): ?>
                          <?php while( have_rows('postes_clients') ) : the_row(); ?>
                          <?php $qte = get_sub_field('quantite'); ?>
                          <?php $inventaire = get_sub_field('n_inventaire'); ?>
                          <?php $designation = get_sub_field('designation'); ?>
                          <?php $prestataire = get_sub_field('prestataire'); ?>
                          <?php $commentaire = get_sub_field('commentaire'); ?>
                          <?php $start = get_sub_field('date_achat'); ?>
                          <?php $start_date = date("d/m/Y", strtotime($start)); ?>
                          <?php $end = get_sub_field('date_renouvellement'); ?>
                          <?php $end_date = date("d/m/Y", strtotime($end)); ?>
                          <?php $valeur = get_sub_field('valeur'); ?>
                          <?php $service = get_sub_field('service'); ?>
                          <?php $commentaire = get_sub_field('commentaire'); ?>
                          <?php

                           $end_time   =   strtotime($end);
                           $cur_time   =   strtotime(date("Y-m-d"));

                            if( $end_time > strtotime("+3 months", $cur_time))
                            {

                              $badge = 'success';

                            } elseif($end_time > strtotime("+2 months", $cur_time)){

                              $badge = 'warning';

                            }
                            else{

                              $badge = 'danger';
                            }

                          ?>
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php  echo($qte); ?></h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($inventaire); ?></p>
                              </td>
                              <td>
                                <p class="text-xs text-secondary mb-0"><?php  echo($designation ); ?></p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">
                                  <?php
                                    if( $prestataire):
                                        echo( $prestataire );
                                  ?>
                                </p><?php
                                    else :
                                     ?> <p class="text-xs text-secondary mb-0">Non renseigné </p> <?php
                                    endif
                                ?>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($valeur); ?></p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($service); ?></p>
                              </td>    
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($commentaire); ?></p>
                              </td>                                                         
                              <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold"><?php  echo($start_date); ?></span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="badge badge-sm bg-gradient-<?php echo $badge ?>"><?php echo $end_date; ?></span>
                              </td>
                              <td class="align-middle">
                                <?php if( current_user_can('administrator')  ) { ?>
                                  <?php echo '<a class="text-secondary font-weight-bold text-xs" href="'. get_edit_post_link($id) .'">Edit</a>'; ?>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php endwhile ?>
                          <?php else : ?>
                              <td class="align-middle">
                                <p class="text-xs text-secondary mb-0"><?php echo("Pas d'informations renseignées en base de données") ?></p>
                              </td>
                          <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div> <!-- end pc -->        

        <?php endif; ?>
      <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>