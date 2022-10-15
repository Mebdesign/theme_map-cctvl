<?php
    /*
    Template Name: Single Post
    */

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }      
?>



<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row mb-4">
        <?php get_template_part('tables'); ?>
      </div>

      <?php get_footer() ?>

</main>
        
        <?php /*get_template_part('aside-rtl'); */?> 
        
        <?php wp_footer(); ?>

  </body>

</html>    