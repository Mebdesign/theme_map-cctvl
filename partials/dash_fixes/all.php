<?php


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
        // Lignes fixes
        if( have_rows('tel_fixes') ):
          while ( have_rows('tel_fixes') ) : the_row();
              array_push($phones, get_sub_field('telephones_fixes'));
              $fin_dengagement = get_sub_field('fin_dengagement');
              $new_fin_dengagement = date("d/m/Y", strtotime($fin_dengagement));
              $fin_dengagement_time   =   strtotime($fin_dengagement);
              $current_time   =   strtotime(date("Y-m-d"));
              $status = get_sub_field('status');
            array_push($engaged_line_fixes, get_sub_field('telephones_fixes'));

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


  if ( isset($args['args'] )) {
    $all = 'all';
  }

?>

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
                <li><a class="dropdown-item border-radius-md all_fixes" href="#">Toutes les lignes</a></li>
                <li><a class="dropdown-item border-radius-md engaged_fixes" href="#">Lignes engagées</a></li>
                <li><a class="dropdown-item border-radius-md no_engaged_fixes" href="#">Lignes sans engagement</a></li>
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
                        ?>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <i class="material-icons text-info text-gradient me-3">phone</i>
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
</div>