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

      <div class="row mb-4">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Information sur le site</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm"><?php  echo($contact_de_la_direction); ?></h6>
                    <span class="mb-2 text-xs">Nom du service: <span class="text-dark font-weight-bold ms-sm-2"><?php  echo($nom_du_service); ?></span></span>
                    <span class="mb-2 text-xs">Adresse email: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($email); ?></span></span>
                    <span class="text-xs">Standard: <span class="text-dark ms-sm-2 font-weight-bold"><?php  echo($telephone); ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="<?php  echo(get_edit_post_link($id)) ?>"><i class="material-icons text-sm me-2">edit</i>Edit</a>
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
                  <h6 class="mb-0">Your Transaction's</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small>23 - 30 March 2020</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
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
          </div>
        </div> 
      </div>
      
      <?php  $telephones_fixes = get_field( "tel_fixes" ); ?>
        <div class="row"> <!-- start Télephones fixes -->
            <div class="col-12">
              <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-custom-brown shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Téléphonie fixe - <?php the_title(); ?> </h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prestataire</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Numéros</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statuts</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Internet</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php if( have_rows('tel_fixes') ): ?>
                            <?php while( have_rows('tel_fixes') ) : the_row(); ?>
                              <?php $fixes = get_sub_field('telephones_fixes'); ?>
                              <?php $prestataires = get_sub_field('prestataires'); ?>
                              <?php $internet = get_sub_field('internet'); ?>
                              <?php $contact = get_sub_field('contact'); ?>
                              <?php $nom = get_sub_field('nom'); ?>
                              <tr>
                                <td>
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm"><?php  echo($prestataires); ?></h6>
                                      <p class="text-xs text-secondary mb-0"><?php echo($contact); ?></p>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <p class="text-xs font-weight-bold mb-0"><?php  echo($fixes); ?></p>
                                  <p class="text-xs text-secondary mb-0"><?php  echo($nom); ?></p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                                <td class="align-middle text-center">
                                  <?php $internet = get_sub_field('internet'); ?>
                                  <?php if( $internet ): ?> 
                                    <?php foreach( $internet as $checked ): ?>
                                      <span class="text-secondary text-xs font-weight-bold"><?php  echo($checked); ?></span>
                                    <?php endforeach; ?>
                                  <?php endif ?>

                                </td>
                                <td class="align-middle">
                                  <?php if( current_user_can( 'edit_posts' ) ) : ?>
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
                  <div class="bg-gradient-custom-brown shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Téléphonie Mobile- <?php the_title(); ?></h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
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
                                  <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                                <td class="align-middle text-center">
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($fin_dengagement); ?></p>
                                  <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
                                </td>
                                <td class="align-middle">
                                  <?php if( current_user_can( 'edit_posts' ) ) : ?>
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
                  <div class="bg-gradient-custom-brown shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Copieurs & impressions - <?php the_title(); ?></h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prestataire</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Matériel</th>
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
                          <?php $marque = get_sub_field('marque'); ?>
                          <?php $prestataire = get_sub_field('prestataire'); ?>
                          <?php $contact = get_sub_field('contact'); ?>
                          <?php $start = get_sub_field('debut_de_contrat'); ?>
                          <?php $end = get_sub_field('fin_de_contrat'); ?>
                          <?php $lieu = get_sub_field('lieu_du_copieur'); ?>
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
                                <p class="text-xs font-weight-bold mb-0"><?php  echo($lieu); ?></p>
                                <p class="text-xs text-secondary mb-0"><?php  echo($marque); ?></p>
                              </td>                                  
                              <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success"><?php  echo($start); ?></span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold"><?php  echo($end); ?></span>
                              </td>
                              <td class="align-middle">
                                <?php if( current_user_can( 'edit_posts' ) ) : ?>
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
        </div> <!-- end printers -->
          
        <?php endif; ?>
      <?php endforeach; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>