import React, { Component } from 'react';
//import Config from '../../config/index.json';

class LoginPage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            username: "",
            password: ""
        }

        this.handleUserChange = this.handleUserChange.bind(this);
        this.handlePassChange = this.handlePassChange.bind(this);
        this.handleLogin = this.handleLogin.bind(this);
    }
    handleUserChange(e) {
        this.setState({username: e.target.value});
    }
    handlePassChange(e) {
        this.setState({password: e.target.value});
    }
    handleLogin(e) {
        e.preventDefault();

    }
    render() {


        return (
            <div>
                <h1 onClick={() => this.props.changePage(1)}>Click here to return to index</h1>
                <form onSubmit={this.handleLogin}>
                    <label>Username:
                        <input type="text" value={this.state.username} onChange={this.handleUserChange} />
                    </label>
                    <label>Password:
                        <input type="password" value={this.state.password} onChange={this.handlePassChange} />
                    </label>
                    <input type="submit" value="Login" />
                </form>
            </div>
        )
    }
}

export default LoginPage;