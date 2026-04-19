// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class ImageLoad extends Component {

  static slug = 'deil_image_load';

  _updateParent(childProps) {
    this.props.content.forEach( (elem, i) => {
      const key = childProps.moduleInfo.type + '-' + elem.props.parent_address + '-' + childProps.moduleInfo.order + '-' + childProps.image_width;
      if (i === childProps.moduleInfo.order && key !== elem.key) {
        elem.props.attrs.image_width = childProps.image_width;
        elem.key = key;
        console.log('Updating...');
        this.forceUpdate();
      }
    });
  }

  render() {
    console.log('PARENT RENDER');
    if (Array.isArray(this.props.content) && (this.props.content.length > 0)) {
      this.props.content.forEach(elem => { 
          elem.props.attrs.update_parent = this._updateParent.bind(this);
      });
    }

    return (
      <Fragment>
        <h2>We need to hover over the sections so the images width are stored...</h2>
        <div className="deil-images">
          { this.props.content }
        </div>
      </Fragment>
    );
  }
}

export default ImageLoad;
