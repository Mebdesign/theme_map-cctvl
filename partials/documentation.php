<?php
/*
Template Name: Documentation
*/
?>

<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php get_template_part('navbar'); ?>
      <div class="row">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Catégorie des documents</h6>
                        </div>
                        <div class="col-6 text-end">
                        <button class="btn btn-outline-primary btn-sm mb-0">Voir tout</button>
                        </div>
                    </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">Titre du document</h6>
                                <span class="text-xs">Description lorem ipsum dolor sit amet, consectetur adipiscing elit. </span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                22/09/2022
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                            </div>
                        </li>
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