import React, { Component } from 'react';
import SpiritBox from './SpiritBox/index';
import Header from './Header/index';
import Footer from './Footer/index';
import { Waypoint } from 'react-waypoint';
import scrollToComponent from 'react-scroll-to-component';

class HomePage extends Component {
    constructor(props) {
        super(props);

        this.updateShownLength = this.updateShownLength.bind(this);

        this.state = {
            shownLength: 50
        }
    }

    updateShownLength() {
        this.setState({
            shownLength: this.state.shownLength + 50
        });
    }
    componentDidMount() {
        if(this.props.selectedSpirit !== null) {
            scrollToComponent(this[`SBREF${this.props.selectedSpirit.id}`],{
                align: 'top',
                duration: 1
            });
        }
    }

    render() {
        const items = this.props.spirits.map((s) => 
            <SpiritBox 
                key={s.id} 
                spirit={s} 
                changeToDetails={this.props.changeToDetails} 
                themeset={this.props.themeset}
                ref={i => {
                    this[`SBREF${s.id}`] = i
                }}
                />);

        return (
            <div className="wrapper">
                <Header
                    changePage={this.props.changePage}
                    changeTheme={this.props.changeTheme}
                    isAdmin={this.props.isAdmin}
                    token={this.props.token}
                />
                <div className="spiritBoxes">
                    {items}
                </div>
                <Waypoint
                    onEnter={this.props.mountFd}
                />
                <Footer />
            </div>
        )
    }
}

export default HomePage;