import React, { Component } from 'react';
import DBody from './Body/index';
import DHead from './Header/index';

class Details extends Component {
    constructor(props) {
        super(props);
        this.state = {isLoaded: true}


    }
    render() {

        return (
            <div class="wrapper">
                <DHead 
                    changeToHome={this.props.changeToHome}
                    nextSpirit={this.props.nextSpirit}
                    previousSpirit={this.props.previousSpirit}    
                />
                <DBody 
                    spirit={this.props.spirit}
                />
            </div>
        )
    }

    
}

export default Details;