<?php

class DEIL_ImageLoad extends ET_Builder_Module {

	public $slug       = 'deil_image_load';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Images Load', 'deil-divi-extension-image-load' );

		$this->child_slug      	= 'deil_image_load_item';
		$this->child_item_text 	= esc_html__( 'Image', 'deil-divi-extension-image-load' );
	}

	public function get_fields() {
		return array(
			'display' => array(
				'label'     	=> esc_html__( 'Display', 'et_builder' ),
				'type'        	=> 'select',
				'options'		=> array('square', '4:3', '16:9', 'original'),
				'default'  		=> 'original',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return 'Testing React. Please switch to the Visual Builder';
	}
}

new DEIL_ImageLoad;
