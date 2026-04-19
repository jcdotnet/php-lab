 /**
 * External dependencies
 */
import classnames from 'classnames';

import { 
    useBlockProps,
    __experimentalGetBorderClassesAndStyles as getBorderClassesAndStyles,
	__experimentalGetColorClassesAndStyles as getColorClassesAndStyles,
	__experimentalGetSpacingClassesAndStyles as getSpacingClassesAndStyles, 
    RichText 
} from '@wordpress/block-editor';


import variations from './variations';


export default function save( { attributes, className }) {

    const { service, text, iconColor, brandColor, iconFontSize, iconsFontSize, shareUrl, linkTarget, rel } = attributes;

    const borderProps = getBorderClassesAndStyles( attributes );
	const colorProps = getColorClassesAndStyles( attributes );
	const spacingProps = getSpacingClassesAndStyles( attributes );

    const buttonClasses = classnames( className, 'jc-share-button', {
        ...borderProps.className,
        ...colorProps.className
		//[ `has-custom-width wp-block-button__width-${ width }` ]: width,
		//[ `has-custom-font-size` ]: fontSize || style?.typography?.fontSize,
	} );

    const buttonStyle = {
        ...borderProps.style,
        ...colorProps.style && colorProps.style.length ? colorProps.style : {backgroundColor: brandColor},
        ...spacingProps.style,
    }

    const iconStyle = { fill: iconColor, width: iconFontSize || iconsFontSize };
    const IconComponent = variations.find( variation => variation.name === service).icon;

    return (
        <div { ...useBlockProps.save({className: buttonClasses, style: buttonStyle})}>
            <a href={shareUrl} className="jc-share-link" target={ linkTarget? '_blank' : undefined } rel={ rel }>
                <span className="jc-share-icon" style={iconStyle} >
                    <IconComponent/>
                </span>
                <RichText.Content
                    tagName="span"
                    className={ 'jc-share-button-text' }
                    //title={ title }
                    //style={ buttonStyle }
                    value={ text }
                />
            </a>
        </div>
    );
}