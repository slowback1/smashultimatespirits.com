import React, { Component } from 'react';
import DBody from './Body/index';
import DHead from './Header/index';

class Details extends Component {
    constructor(props) {
        super(props);
        this.state = {isLoaded: true}


    }
    componentDidUpdate() {
        if(this.props.spirit.id > this.props.spirits.length - 5) {
            this.props.mountFd();
        }
    }
    render() {

        return (
            <div class="wrapper">
                <DHead 
                    changePage={this.props.changePage}
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