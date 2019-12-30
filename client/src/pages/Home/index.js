import React, { Component } from 'react';
import SpiritBox from './SpiritBox/index';
import Header from './Header/index';
import Footer from './Footer/index';
import { Waypoint } from 'react-waypoint';

class HomePage extends Component {

    render() {
        const items = this.props.spirits.map((s) =>
            <SpiritBox key={s.id} spirit={s} changeToDetails={this.props.changeToDetails} />);

        return (
            <div class="wrapper">
                <Header
                    changePage={this.props.changePage}
                />
                {items}
                <Waypoint
                    onEnter={this.props.mountFd}
                />
                <Footer />
            </div>
        )
    }
}

export default HomePage;