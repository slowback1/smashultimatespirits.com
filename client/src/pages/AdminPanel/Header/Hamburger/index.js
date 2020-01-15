import React, { Component } from 'react';
import { slide as Menu } from 'react-burger-menu';
import MenuContents from './MenuContents/index';
import './hamburgerStyle.css';

class Hamburger extends Component {
    constructor(props) {
        super(props);
        this.state = {
            menuOpen: false
        }

        this.closeMenu = this.closeMenu.bind(this);
    }
    closeMenu() {
        this.setState({menuOpen: false});
    }

    render() {
        return (
        <div className="hamburger">
            <Menu left>
                <MenuContents
                    closeMenu={this.closeMenu}
                    changeAdminPage={this.props.changeAdminPage}
                    changePage={this.props.changePage}
                />
            </Menu>
        </div>
        )
    }
}

export default Hamburger;