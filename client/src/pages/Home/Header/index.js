import React, { Component } from 'react';
import HeaderBG from '../../../img/headers/s64.png';
import Hamburger from './Hamburger/index';

class Header extends Component {
    render() {
        return (
            <div className="header">
                <Hamburger
                    changePage={this.props.changePage}
                    changeTheme={this.props.changeTheme}
                    token={this.props.token}
                />
                <img className="headerImg" onClick={() => this.props.changePage(1)} src={HeaderBG} alt="header background" />
                
            </div>
        );
    }
}
export default Header;