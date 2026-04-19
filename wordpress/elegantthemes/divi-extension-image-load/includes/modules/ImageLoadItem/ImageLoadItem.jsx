// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class ImageLoadItem extends Component {

  static slug = 'deil_image_load_item';

  static css(props) { 
    
    const additionalCss = [];
    
    /* we can use CSS directly but we need to store the image width in pixels in order to do some calculations in the parent module */ 
    additionalCss.push([{
      selector:    '%%order_class%% .deil-image',
      declaration: `width: ${ props.image_width }px`,    
    }]);

    return additionalCss;
  }

  _onImgLoad({target:img}) {
    //this.forceUpdate(); // updating the child does not work, so we send the value to the parent and update from there
    const props = { ...this.props, ...{image_width:img.naturalWidth} };//lanre
    this.props.update_parent(props);
  }

  render() {
    console.log("CHILD RENDER");
    return (
      <div className='deil-image-wrapper'>
        <p>Image Width (px): { this.props.image_width }</p>
        <img onLoad={this._onImgLoad.bind(this)} className="deil-image" src={ this.props.image } alt="" />
      </div>
    );
  }
}

export default ImageLoadItem;
