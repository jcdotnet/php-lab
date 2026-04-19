import classnames from 'classnames'; 

import { useBlockProps, useInnerBlocksProps, 
    __experimentalUseBorderProps as useBorderProps,
	__experimentalUseColorProps as useColorProps,
	__experimentalGetSpacingClassesAndStyles as useSpacingProps, 
    RichText, InspectorControls } 
from '@wordpress/block-editor';
import { FontSizePicker, ColorPicker, TextControl, PanelBody } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { __ } from '@wordpress/i18n';

import variations from './variations';

const getShareUrl = (service, title, url, username) => {
    switch (service) {
        case 'facebook':
            return `https://www.facebook.com/sharer/sharer.php?u=${url}`;
        case 'twitter':
            return `http://twitter.com/intent/tweet/?text=${encodeURIComponent(title)}&url=${url}${username ? '&via=' + username : ''}`;
        case 'linkedin': 
            return `https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${encodeURIComponent(title)}`;
        case 'telegram':
            return `https://t.me/share/url?url=${url}&text=${encodeURIComponent(title)}`;
        case 'whatsapp':
            return `https://api.whatsapp.com/send?text=${encodeURIComponent(title)} - ${url}`;
        default:
            return '';
    }
}

export default function Edit( { attributes, setAttributes, className, context } ) {

    const { service, text, placeholder, width, brandColor, iconFontSize, iconColor, iconsFontSize, linkTarget, rel, username } = attributes
    
    /**wp-block-jc-blocks-share-buttons
     * styles (maybe later, maybe not using styles in block.json)
     * "styles": [
	 *	{ "name": "default", "label": "Default", "isDefault": true },
	 *	{ "name": "icons-only", "label": "Icons Only" }
	 * ]
     * const iconsOnly = attributes.className?.includes( 'is-style-icons-only' );
     */
    
    // Share Button
    const title = useSelect( ( select ) => { // const {title, url} ) = 
        return select( 'core/editor' ).getEditedPostAttribute( 'title' );
    }, [] );
    const url = useSelect( ( select ) => { // const {title, url} ) = 
        return select( 'core/editor' ).getPermalink();
    }, [] );
    
    setAttributes({
        iconsFontSize: context['jc-blocks/share-buttons/iconsFontSize'],
        linkTarget: context['jc-blocks/share-buttons/buttonsLinkTarget'],
        rel: context['jc-blocks/share-buttons/buttonsRel'],
        shareUrl: getShareUrl(service, title, url, username)
    });

    const borderProps = useBorderProps( attributes );
	const colorProps = useColorProps( attributes );
	const spacingProps = useSpacingProps( attributes );
    const blockProps = useBlockProps( { 
        className: classnames( className, borderProps.className, colorProps.className),
        style: {
            ...borderProps.style,
            ...colorProps.style && useColorProps( attributes ).style.length ? useColorProps( attributes ).style : {backgroundColor: brandColor},
            ...spacingProps.style,
        }
    } );
    
	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		allowedBlocks:  [ 'jc-blocks/share-button' ],
		//placeholder: isSelected ? SelectedSocialPlaceholder : SocialPlaceholder,
		templateLock: false,
		//__experimentalAppenderTagName: 'li',
		//__experimentalLayout: usedLayout,
	} );

    // Share Button ICON
    const IconComponent = variations.find( variation => variation.name === service).icon;
    // ICON STYLE: iconFontSize || iconsFontSize // if iconFontSize is undefined then we set the parent size 
    const iconStyle = { fill: iconColor, width: iconFontSize || iconsFontSize };
    
    // Share Button TEXT
    const setButtonText = ( newText ) => {
		// Remove anchor tags from button text content.
		setAttributes( { text: newText.replace( /<\/?a[^>]*>/g, '' ) } );
	}

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Share Settings', 'jc-share-buttons')}>
                    <TextControl
                            label={ __( 'Twitter Username' ) }
                            value={ username || '' }
                            onChange={ ( username ) => setAttributes( { username } ) }
                    />
                </PanelBody>
                <PanelBody title={__('Icon Color', 'jc-share-buttons')}>
                    <ColorPicker
                        color={iconColor}
                        onChange={ iconColor => setAttributes({iconColor})}
                        enableAlpha
                        defaultValue="#FFF"
                    />
                </PanelBody>
                <PanelBody title={__('Icon Font Size', 'jc-share-buttons')}>
                    <FontSizePicker
                        //__nextHasNoMarginBottom
                        withSlider = "true"
                        value={ iconFontSize }
                        onChange={ ( iconFontSize ) => setAttributes({iconFontSize}) }
                    />
                </PanelBody>
            </InspectorControls>
            <div {...innerBlocksProps}
                className={ classnames( blockProps.className,
                    'jc-share-button', {
                    [ `has-custom-width wp-block-button__width-${ width }` ]: width,
                    [ `has-custom-font-size` ]: blockProps.style.fontSize,
                } ) }
            >
                <span className="jc-share-icon" style={iconStyle}>
                    <IconComponent />
                </span>
                <RichText
                    tagName="span"
                    aria-label={ __( 'Button text' ) }
                    placeholder={ placeholder || __( 'Custom share text…' ) }
                    value={ text }
                    onChange={ ( value ) => setButtonText( value ) }
                />
            </div>
        </>       
     );
 }