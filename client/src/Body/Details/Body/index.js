import React, { Component } from 'react';

class DBody extends Component {
    constructor(props) {
        super(props);
        this.state = {isLoaded: true}
    }

    render() {
        return (
            <div>
                <p>{this.props.spirit.id}. {this.props.spirit.name}</p>
                <img src={require(`../../../img/spiritImgs/${this.props.spirit.id}.png`)} alt={this.props.spirit.name} />
                <p>{this.props.spirit.description}</p>
                <p>{this.props.spirit.game1}</p>
                <p>{this.props.spirit.game2 !== "n" ? this.props.spirit.game2 : null}</p>
            </div>
        )
    }
}

export default DBody;