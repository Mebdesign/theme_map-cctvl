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

  if ( $args['filterNoEngaged'] ) {
    $no_engaged = 'No engaged';
    echo('No engaged');

  }

?>
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
                endwhile;
              endif;
          endforeach;
          wp_reset_postdata();
        endif;
        ?>
    </tbody>
  </table>
