import React, { Component } from 'react';
import SpiritBox from './SpiritBox/index';
import Details from'./Details/index';

class Body extends Component {
    constructor(props) {
        super(props);
        this.changeToDetails = this.changeToDetails.bind(this);
        this.changetoHome = this.changeToHome.bind(this);
        this.nextSpirit = this.nextSpirit.bind(this);
        this.previousSpirit = this.previousSpirit.bind(this);

        this.state = {
            page: 0,
            selectedSpirit: null
        }
    }
    changeToDetails(spirit) {
        this.setState({
            page: 1,
            selectedSpirit: spirit
        });
    }
    changeToHome() {
        this.setState({
            page: 0,
        });
    }
    nextSpirit() {
        const isCurrentSpirit = (element) => element === this.state.selectedSpirit;
        let curIndex = this.props.spirits.findIndex(isCurrentSpirit);
        if(curIndex === this.props.spiritTotal - 1) {
            this.setState({selectedSpirit: this.props.spirits[0]});
        } else {
            this.setState({selectedSpirit: this.props.spirits[curIndex + 1]});
        }
    }
    previousSpirit() {
        const isCurrentSpirit = (element) => element === this.state.selectedSpirit;
        let curIndex = this.props.spirits.findIndex(isCurrentSpirit);
        if(curIndex === 0) {
            this.setState({selectedSpirit: this.props.spirits[0]});
        } else {
            this.setState({selectedSpirit: this.props.spirits[curIndex - 1]});
        }
    }

    render(){
        const items = this.props.spirits.map((s) => 
        <SpiritBox key={s.id} spirit={s} changeToDetails={this.changeToDetails} />);
        const home = <div class="spirits">{items}</div>
        const details = <Details 
                spirit={this.state.selectedSpirit}
                changeToHome={this.changeToHome}
                nextSpirit={this.nextSpirit}
                previousSpirit={this.previousSpirit}
            />
        let rh;
        switch(this.state.page) {
            default:
            case 0:
                rh = home;
                break;
            case 1:
                rh = details;
                break;
        }
        return(
            <div class="body">{rh}</div>
        );
    }
}

export default Body;