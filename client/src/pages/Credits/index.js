import React, { Component } from 'react';
import Header from '../Home/Header/index';
import Footer from '../Home/Footer/index';

class Credits extends Component {
    

    render() {
        return (
            <div class="wrapper">
                <Header
                    changePage={this.props.changePage}
                />
                <div class="credits">
                    <h2>Logical Keyboard Tapper</h2>
                    <p>Andrew "Slowback1" Wobeck</p>
                    <h2>Doodle Manipulators</h2>
                    <p>Andrew "Slowback1" Wobeck</p>
                    <p>VitFerreira</p>
                    <h2>Creative Keyboard Tappers</h2>
                    <p>Insertusernamehere51</p>
                    <p>VitFerreira</p>
                    <p>Feminine Eminem</p>
                    <p>StreakingSteam</p>
                    <p>SuperLuigi1026</p>
                    <p>PK_Water</p>
                    <p>Leviathan</p>
                    <p>PKThoron</p>
                    <p>Woop</p>
                    <p>ThatGuy456</p>
                    <p>AdamZam</p>
                    <p>FishAndChipper</p>
                    <p>Andrew "Slowback1" Wobeck</p>
                    <p>The-Zekenator</p>
                    <p>Jackaloped</p>
                    <p>Cad48</p>
                    <p>Duncaster</p>
                    <p>Masked Chaos</p>
                </div>
                <Footer />
            </div>
        )
    }
}

export default Credits;