import React, { Component } from 'react';

class MenuContents extends Component {
    constructor(props) {
        super(props);

        this.checkToken = this.checkToken.bind(this);

        this.state = {
            isAdmin: false
        }
    }    
    checkToken() {
        if(this.props.token !== null) {
            this.setState({isAdmin: true});
        }
    }

    componentDidMount() {
        this.checkToken();
    }
    render() {
        

        return (
            <div className="menuContents">
                
                <p onClick={() => this.props.changePage(3)}>Credits</p>
                <p onClick={() => this.props.changePage(4)}>Quiz Game</p>
                {
                this.state.isAdmin ? <p onClick={() => this.props.changePage(5)}>Admin Panel</p> : <p onClick={() => this.props.changePage(5)}>Admin Panel</p>
                }
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