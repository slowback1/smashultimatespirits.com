import React, { Component } from 'react';
import Cookies from 'universal-cookie';

import Config from '../../config/index.json';

import './style/index.css';


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
        let postBody = {
            username: this.state.username,
            password: this.state.password
        }
        let url = Config.apiurl + "/user/login/";
        let options = {
            method: "POST",
            body: JSON.stringify(postBody)
            
        }
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 200) {
                    const cookies = new Cookies();
                    cookies.set('token', 
                                json.responseBody,
                                {path: "/"});
                    document.location.href="/";
                }
                
            })
            .catch(err => console.error(err));
    }

    componentDidUpdate() {
        if(this.props.isAdmin) {
            document.location.href="/";
        }
    }

    render() {


        return (
            <div className="loginPage">
                <div className="titleBoxes">
                    <div className="box e">
                        L
                    </div>
                    <div className="box o">
                        O
                    </div>
                    <div className="box e">
                        G
                    </div>
                    <div className="box o">
                        I
                    </div>
                    <div className="box e">
                        N
                    </div>
                    <div className="box o">
                        :
                    </div>
                </div>
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