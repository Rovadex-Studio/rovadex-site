<?php
/**
 * Rovadex Theme Customizer
 *
 * @package Rovadex
 */
function rovadex_get_customizer_options() {
	return apply_filters( 'rovadex_customizer_options', array(
		'prefix'     => 'rovadex',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'rovadex-site' ),
				'description'     => esc_html__( 'Upload logo image', 'rovadex-site' ),
				'section'         => 'title_tagline',
				'default'         => '%s/assets/images/logo.svg',
				'field'           => 'image',
				'type'            => 'control',
				'extensions' => array( 'jpg', 'jpeg', 'gif', 'png', 'svg' ),
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'rovadex-site' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'rovadex-site' ),
				'section'         => 'title_tagline',
				'field'           => 'image',
				'type'            => 'control',
			),
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'tattoized' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'rovadex-site' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'rovadex-site' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'rovadex-site' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
				'default' => '',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'rovadex-site' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
				'default' => '',
			),
		),
	) );
}

/**
 * Return sanitized theme mod value.
 *
 * @param  string       $mod               Mod name to get.
 * @param  bool         $use_default       User or not default value.
 * @param  string|array $sanitize_callback Sanitize callback name.
 * @return mixed
 */
function rovadex_get_mod( $mod = null, $use_default = false, $sanitize_callback = null ) {

	if ( ! $mod ) {
		return false;
	}

	$default = false;

	if ( true === $use_default ) {
		$default = rovadex()->customizer->get_default( $mod );
	}

	$value = get_theme_mod( $mod, $default );

	if ( is_callable( $sanitize_callback ) ) {
		return call_user_func( $sanitize_callback, $value );
	} else {
		return $value;
	}

}
