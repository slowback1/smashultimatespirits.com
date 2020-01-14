import React, { Component } from 'react';
import DBody from './body/index';
import DHead from './head/index';

class DetailsPageThree extends Component {
    
    componentDidUpdate() {
        if(this.props.spirit.id > this.props.spirits.length - 5 && !this.props.fdMounted) {
            this.props.mountFd();
        }
        }
        render() {
            return (
                <div class="wrapper">
                    <DHead
                        changePage={this.props.changePage}
                        nextSpirit={this.props.nextSpirit}
                        previousSpirit={this.propspreviousSpirit}
                        spirit={this.props.spirit}
                    />
                    <DBody
                        spirit={this.props.spirit}
                    />
                </div>
            )
        }
    }
export default DetailsPageThree;