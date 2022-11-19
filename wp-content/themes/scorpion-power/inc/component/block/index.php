<?php
add_action( 'init', 'wpdocs_add_custom_shortcode' );


function wpdocs_add_custom_shortcode() {
    add_shortcode( 'footag', 'wpdocs_footag_func' );
}