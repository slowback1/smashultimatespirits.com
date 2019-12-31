import React, { Component } from 'react';

class MenuContents extends Component {
        
    
    render() {
        

        return (
            <div className="menuContents">
                
                <p onClick={() => this.props.changePage(3)}>Credits</p>
                <p onClick={() => this.props.changePage(4)}>Quiz Game</p>
                <p onClick={() => this.props.changePage(5)}>Login</p>
                <p onClick={() => this.props.changePage(6)}>Register</p>
                <br />
                <br />
                <h2>Theme Set:</h2>
                <p onClick={() => this.props.changeTheme(1)}>64</p>
                <p onClick={() => this.props.changeTheme(2)}>Melee</p>
                <p onClick={() => this.props.changeTheme(3)}>Brawl</p>
                <p onClick={() => this.props.changeTheme(4)}>WiiU</p>
                <p onClick={() => this.props.changeTheme(5)}>Ultimate</p>
            </div>
        )
    }
}

export default MenuContents;