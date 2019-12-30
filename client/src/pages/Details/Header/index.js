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
            <div class="dhead">
                <button onClick={() => this.props.previousSpirit()}>leftarrow</button>
                <button onClick={() => this.props.changePage(1)}>home</button>
                <button onClick={() => this.props.nextSpirit()}>rightarrow</button>
            </div>
        )
    }
}

export default DHead;