import { getBlockSupport } from '@wordpress/blocks';
import { useBlockProps, useInnerBlocksProps, InspectorControls } from '@wordpress/block-editor';
import { TextControl, ToggleControl, FontSizePicker, PanelBody } from '@wordpress/components'
import { __ } from '@wordpress/i18n';

import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes, name }) {

	const { layout, iconsFontSize, buttonsLinkTarget, buttonsRel } = attributes;

	const fontSizes = [
		{
			name: __( 'Small' ),
			slug: 'small',
			size: '16px',
		},
		{ name: __( 'Normal' ), slug: 'normal', size: '24px' },
		{ name: __( 'Large' ), slug: 'large', size: '32px' },
		{
			name: __( 'Extra Large' ),
			slug: 'x-large',
			size: '48px',
		},
	];

	const SelectedSocialPlaceholder = (
		<div> 
			{ __( 'Click plus to add buttons' ) } 
		</div>
	);
	
	const getDefaultBlockLayout = ( blockTypeOrName ) => {
		const layoutBlockSupportConfig = getBlockSupport(
			blockTypeOrName,
			'__experimentalLayout'
		);
		return layoutBlockSupportConfig?.default;
	};

	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		allowedBlocks: [ 'jc-blocks/share-button' ],
		placeholder: SelectedSocialPlaceholder,
		templateLock: false,
		//__experimentalDirectInsert: true,
		__experimentalAppenderTagName: 'li',
		__experimentalLayout: layout || getDefaultBlockLayout(name),
		// templateInsertUpdatesSelection: true,
	} );
	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Icons Font Size', 'jc-share-buttons')}>
					<FontSizePicker // iconFontSize, textFontSize
						//__nextHasNoMarginBottom
						fontSizes={fontSizes}
						withSlider = "true"
						value={ iconsFontSize }
						fallbackFontSize="24"
						onChange={ ( iconsFontSize ) => setAttributes({iconsFontSize}) }
					/>
				</PanelBody>
			</InspectorControls>
			<InspectorControls __experimentalGroup="advanced">
				<ToggleControl
							label={ __( 'Open links in new tab' ) }
							checked={ buttonsLinkTarget }
							onChange={ () =>
								setAttributes( { buttonsLinkTarget: ! buttonsLinkTarget } )
							}
						/>
				<TextControl
					label={ __( 'Link rel' ) }
					value={ buttonsRel || '' }
					onChange={ ( value ) => setAttributes( { buttonsRel: value } ) }
				/>
			</InspectorControls>
			<div { ...innerBlocksProps } />
		</>
		
	);
}
