
<?php
if ( ! defined('ABSPATH') ) exit;
function skymission_elementor_category($elements_manager) {
    $elements_manager->add_category('skymission', array('title'=>'SkyMission','icon'=>'fa fa-star'), 1);
}
add_action('elementor/elements/categories_registered','skymission_elementor_category');
