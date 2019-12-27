import React, { Component } from 'react';
import HeaderBG from '../../../img/misc/headerBG.png';

class Header extends Component {

    render() {
        return (
            <div class="header">
                <img src={HeaderBG} alt="header background" />
            </div>
        );
    }
}
export default Header;