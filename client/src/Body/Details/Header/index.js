import React, { Component } from 'react';


class DHead extends Component {
    constructor(props) {
        super(props);
        
        this.handleCTH = this.handleCTH.bind(this);
    }
    handleCTH() {
        this.props.changeToHome();
    }
    render() {
        return (
            <div>
                <button onClick={() => this.props.previousSpirit()}>leftarrow</button>
                <button onClick={() => this.props.changeToHome()}>leftarrow</button>
                <button onClick={() => this.props.nextSpirit()}>rightarrow</button>
            </div>
        )
    }
}

export default DHead;