<?php
/*
Template Name: Map
*/

?>


<?php get_header() ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php get_template_part('navbar'); ?>

        
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div id="mapid" style="width:100%; height:650px;">
                        <input type="hidden" data-map-markers="" value="" name="map-geojson-data">
                    </div>
                </div> 
            </div>  
        </div>     

        <div id="ajax"></div>


        
        <?php get_footer() ?>

    </main>
        
        <?php /*get_template_part('aside-rtl'); */?> 
        
        <?php wp_footer(); ?>

  </body>

</html>    