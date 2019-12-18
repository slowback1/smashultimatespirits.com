import React, { Component } from 'react';
import './index.css';

class SpiritBox extends Component {
    constructor(props) {
        super(props);

        this.handleCTD = this.handleCTD.bind(this);
    }
    handleCTD() {
        
        this.props.changeToDetails(this.props.spirit);
    }
    render(){
        return(
            <div className='spiritBox'>
                <p>{this.props.spirit.id}</p>
                <img className="si" src={require(`../../img/spiritImgs/${this.props.spirit.id}.png`)} alt={this.props.spirit.name} />
                <p>{this.props.spirit.name}</p>
                <img className="sericon" src={require(`../../img/series/${this.props.spirit.series}.png`)} alt={this.props.spirit.series} />
                <button onClick={() => this.handleCTD()}>testButton</button>
            </div>
        );
    }
}

export default SpiritBox;