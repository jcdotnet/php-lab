// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';

class DeilInput extends Component {

  static slug = 'deil_input';

  /**
   * Handle input value change.
   *
   * @param {object} event
   */
  _onChange = (event) => {
    this.props._onChange(this.props.name, event.target.value);
  }

  render() {
    return(
      <input
        id={`deil-input-${this.props.name}`}
        name={this.props.name}
        value={this.props.value}
        type='text'
        className='deil-input'
        onChange={this._onChange}
        placeholder={this.props.fieldDefinition.deil_placeholder}
      />
    );
  }
}

export default DeilInput;
