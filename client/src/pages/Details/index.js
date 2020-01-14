import React, { Component } from 'react';


import DetailsPage1 from './64/index';
import DetailsPage2 from './Melee/index';
import DetailsPage3 from './Brawl/index';
import DetailsPage4 from './s4/index';
import DetailsPage5 from './Ultimate/index';


class Details extends Component {
    constructor(props) {
        super(props);
        this.state = {isLoaded: true}


    }
    componentDidUpdate() {
        if(this.props.spirit.id > this.props.spirits.length - 5 && !this.props.fdMounted) {
            this.props.mountFd();
        }
    }
    render() {
        let themeItem;
        switch(this.props.themeset) {
            case 1:
                themeItem = <DetailsPage1
                                changePage={this.props.changePage}
                                nextSpirit={this.props.nextSpirit}
                                previousSpirit={this.props.previousSpirit}
                                spirit={this.props.spirit}
                                spirits={this.props.spirits}
                                mountFd={this.props.mountFd}
                                fdMounted={this.props.fdMounted}
                            />
                break;
            case 2:
                themeItem = <DetailsPage2
                                changePage={this.props.changePage}
                                nextSpirit={this.props.nextSpirit}
                                previousSpirit={this.props.previousSpirit}
                                spirit={this.props.spirit}
                                spirits={this.props.spirits}
                                mountFd={this.props.mountFd}
                                fdMounted={this.props.fdMounted}
                            />
                break;
            case 3:
                themeItem = <DetailsPage3
                                changePage={this.props.changePage}
                                nextSpirit={this.props.nextSpirit}
                                previousSpirit={this.props.previousSpirit}
                                spirit={this.props.spirit}
                                spirits={this.props.spirits}
                                mountFd={this.props.mountFd}
                                fdMounted={this.props.fdMounted}
                            />
                break;
            case 4:
                themeItem = <DetailsPage4
                                changePage={this.props.changePage}
                                nextSpirit={this.props.nextSpirit}
                                previousSpirit={this.props.previousSpirit}
                                spirit={this.props.spirit}
                                spirits={this.props.spirits}
                                mountFd={this.props.mountFd}
                                fdMounted={this.props.fdMounted}
                            />
                break;
            case 5:
            default:
                themeItem = <DetailsPage5
                                changePage={this.props.changePage}
                                nextSpirit={this.props.nextSpirit}
                                previousSpirit={this.props.previousSpirit}
                                spirit={this.props.spirit}
                                spirits={this.props.spirits}
                                mountFd={this.props.mountFd}
                                fdMounted={this.props.fdMounted}
                            />
                break;
        }
        return (
            <div class="wrapper">
                {themeItem}
            </div>
        )
    }
}

export default Details;