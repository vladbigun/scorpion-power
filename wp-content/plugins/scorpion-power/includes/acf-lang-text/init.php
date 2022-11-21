<?php
/**
 * Registration logic for the new ACF field type.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'tf_include_acf_field_lang_text' );
/**
 * Registers the ACF field type.
 */
function tf_include_acf_field_lang_text() {
	if ( ! function_exists( 'acf_register_field_type' ) ) {
		return;
	}

	require_once __DIR__ . '/class-tf-acf-field-lang-text.php';

	acf_register_field_type( 'tf_acf_field_lang_text' );
}
