<?php
/**
 * Defines the custom field type class.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PREFIX_acf_field_FIELD_NAME class.
 */
class tf_acf_field_lang_text extends \acf_field {
	/**
	 * Controls field type visibilty in REST requests.
	 *
	 * @var bool
	 */
	public $show_in_rest = true;

	/**
	 * Environment values relating to the theme or plugin.
	 *
	 * @var array $env Plugin or theme context such as 'url' and 'version'.
	 */
	private $env;

	/**
	 * Constructor.
	 */
	public function __construct() {
		/**
		 * Field type reference used in PHP and JS code.
		 *
		 * No spaces. Underscores allowed.
		 */
		$this->name = 'lang_text';

		/**
		 * Field type label.
		 *
		 * For public-facing UI. May contain spaces.
		 */
		$this->label = __( 'Lang Text (TF addon)', 'tf' );

		/**
		 * The category the field appears within in the field type picker.
		 */
		$this->category = 'basic'; // basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME

		/**
		 * Defaults for your custom user-facing settings for this field type.
		 */
		$this->defaults = array(
			'font_size'	=> 14,
		);

		/**
		 * Strings used in JavaScript code.
		 *
		 * Allows JS strings to be translated in PHP and loaded in JS via:
		 *
		 * ```js
		 * const errorMessage = acf._e("FIELD_NAME", "error");
		 * ```
		 */
		$this->l10n = array(
			'error'	=> __( 'Error! Please enter a higher value', 'tf' ),
		);

		$this->env = array(
			'url'     => site_url( str_replace( ABSPATH, '', __DIR__ ) ), // URL to the acf-FIELD-NAME directory.
			'version' => '1.0', // Replace this with your theme or plugin version constant.
		);

		parent::__construct();
	}

	/**
	 * Settings to display when users configure a field of this type.
	 *
	 * These settings appear on the ACF “Edit Field Group” admin page when
	 * setting up the field.
	 *
	 * @param array $field
	 * @return void
	 */
	public function render_field_settings( $field ) {
		/*
		 * Repeat for each setting you wish to display for this field type.
		 */
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __( 'Font Size','tf' ),
				'instructions'	=> __( 'Customise the input font size','tf' ),
				'type'			=> 'number',
				'name'			=> 'font_size',
				'append'		=> 'px',
			)
		);

		// To render field settings on other tabs in ACF 6.0+:
		// https://www.advancedcustomfields.com/resources/adding-custom-settings-fields/#moving-field-setting
	}

	/**
	 * HTML content to show when a publisher edits the field on the edit screen.
	 *
	 * @param array $field The field settings and values.
	 * @return void
	 */
	public function render_field( $field ) {
		// Debug output to show what field data is available.
		echo '<pre>';
		// print_r( $field );
		echo '</pre>';

        if(function_exists('pll_the_languages')):?>
            <style>
                .wrapper-lang-text{
                    display: flex;
                    flex-wrap: wrap;
                }
                .wrapper-lang-text > * {
                    flex: 1;
                    padding-right: 15px;
                }
                .wrapper-lang-text .lang-text-field:last-child{
                    padding-right: unset;
                }
            </style>
            <div class="wrapper-lang-text">
                <?php
                $langs_list = pll_the_languages(array('raw' => 1));

                foreach ($langs_list as $lang): ?>
                <div class="lang-text-field">
                    <label for="<?php echo esc_attr($field['name']) ?>">
                        <?php echo esc_attr($field['label']) ?> (<?php echo esc_attr($lang['name']) ?>)
                    </label>
                    <!--
                    <pre>
                        <?php var_dump($field['value']) ?>
                    </pre> -->
                    <input
                            type="text"
                            class="setting-font-size"
                            name="<?php echo esc_attr($field['name']) ?>[<?php echo esc_attr($lang['slug']) ?>]"
                            value="<?php echo esc_attr($field['value'][$lang['slug']] ?? esc_attr($field['value']) ?? '') ?>"
                            style="font-size:<?php echo esc_attr( $field['font_size'] ) ?>px;"
                    />
                </div>
                <?php endforeach;?>
            </div>
            <?php
        endif;
	}

	/**
	 * Enqueues CSS and JavaScript needed by HTML in the render_field() method.
	 *
	 * Callback for admin_enqueue_script.
	 *
	 * @return void
	 */
	public function input_admin_enqueue_scripts() {
		$url     = trailingslashit( $this->env['url'] );
		$version = $this->env['version'];

		wp_register_script(
			'tf-lang-text-js',
			"{$url}assets/js/field.js",
			array( 'acf-input' ),
			$version
		);

		wp_register_style(
			'tf-lang-text-css',
			"{$url}assets/css/field.css",
			array( 'acf-input' ),
			$version
		);

		wp_enqueue_script( 'tf-lang-text-js' );
		wp_enqueue_style( 'tf-lang-text-css' );
	}
}
