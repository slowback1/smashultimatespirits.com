import React, { Component } from 'react';
import Keyhandler, { KEYPRESS } from 'react-key-handler';


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
                <Keyhandler
                    keyEventName={KEYPRESS}
                    keyValue="d"
                    onKeyHandle={this.props.nextSpirit}
                />
                <Keyhandler
                    keyEventName={KEYPRESS}
                    keyValue="a"
                    onKeyHandle={this.props.previousSpirit}
                />
                <i className="fa fa-caret-left" onClick={() => this.props.previousSpirit()}></i>
                <button onClick={() => this.props.changePage(1)}>Return to Spirits</button>
                <i className="fa fa-caret-right" onClick={() => this.props.nextSpirit()}></i>
            </div>
        )
    }
}

export default DHead;