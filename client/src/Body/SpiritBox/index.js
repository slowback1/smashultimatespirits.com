import React, { Component } from 'react';

class SpiritBox extends Component {


    render(){
        return(
            <div class='spiritBox'>
                <p>{this.props.spirit.id}</p>
                <p>{this.props.spirit.name}</p>
            </div>
        );
    }
}

export default SpiritBox;