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
    openMenu() {
        this.setState({menuOpen: true});
    }

    render() {
        return (
            <div className="hamburger">
                <Menu 
                    left 


                >
                    <MenuContents
                        closeMenu={this.closeMenu}
                        changePage={this.props.changePage}
                        changeTheme={this.props.changeTheme}
                    />
                </Menu>
            </div>
        )
    }
}


export default Hamburger;