<?php

class DEIL_HelloWorld extends ET_Builder_Module {

	public $slug       = 'deil_image_load_item';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Image Load', 'divi-extension-image-load' );
		$this->type                        = 'child';
		$this->child_title_var             = 'title';
		$this->advanced_setting_title_text = esc_html__( 'New Image', 'divi-extension-image-load' );
		$this->settings_text               = esc_html__( 'Image Settings', 'divi-extension-image-load' );
	}

	public function get_fields() {
		return array(
			'title' => array(
				'label'       		=> esc_html__( 'Title', 'et_builder' ),
				'type'        		=> 'text',
				'default'  			=> 'Image',
			),
			'image' => array(
				'label'             => esc_html__( 'Image', 'divi-extension-image-load' ),
				'type'              => 'upload',
				'upload_button_text'=> esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'       => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'       => esc_attr__( 'Set As Image', 'et_builder' ),
			),
			'image_display' => array(
				'label'     		=> esc_html__( 'Display', 'et_builder' ),
				'type'        		=> 'deil_input',
				'deil_placeholder'	=> 'original', // here I want to pass to the custom field the value entered in the parent display field
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return '';
	}
}

new DEIL_HelloWorld;
