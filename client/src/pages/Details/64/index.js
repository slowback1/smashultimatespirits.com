import React, { Component } from 'react';
import DBody from './body/index';
import DHead from './head/index';

class DetailsPage1 extends Component {
    componentDidUpdate() {
        if(this.props.spirit.id > this.props.spirits.length - 5 && !this.props.fdMounted) {
            this.props.mountFd();
        }
    }
    render() {

        return (
            <div className="wrapper">
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

export default DetailsPage1;