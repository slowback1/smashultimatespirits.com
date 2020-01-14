import React, { Component } from 'react';
import Cookies from 'universal-cookie';
import Config from '../../config/index.json';

import '../Login/style/index.css';

class RegisterPage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            username: "",
            password: "",
            password2: "",
            secretKey: ""
        }

        this.handleUserChange = this.handleUserChange.bind(this);
        this.handlePassChange = this.handlePassChange.bind(this);
        this.handlePass2Change = this.handlePass2Change.bind(this);
        this.handleSKChange = this.handleSKChange.bind(this);
        this.handleRegister = this.handleRegister.bind(this);
    }
    handleUserChange(e) {
        this.setState({username: e.target.value});
    }
    handlePassChange(e) {
        this.setState({password: e.target.value});
    }
    handlePass2Change(e) {
        this.setState({password2: e.target.value});
    }
    handleSKChange(e) {
        this.setState({secretKey: e.target.value});
    }
    handleRegister(e) {
        e.preventDefault();
        let postBody = {
            username: this.state.username,
            password: this.state.password,
            secretKey: this.state.secretKey
        }
        let url = Config.apiurl + "/user/register/";
        let options = {
            method: "POST",
            body: JSON.stringify(postBody)
        }
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 200) {
                    const cookies = new Cookies();
                    cookies.set(
                            'token', 
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
                        R
                    </div>
                    <div className="box o">
                        E
                    </div>
                    <div className="box e">
                        G
                    </div>
                    <div className="box o">
                        I
                    </div>
                    <div className="box e">
                        S
                    </div>
                    <div className="box o">
                        T
                    </div>
                    <div className="box e">
                        E
                    </div>
                    <div className="box o">
                        R
                    </div>
                    <div className="box e">
                        :
                    </div>
                </div>
                <form onSubmit={this.handleRegister}>
                    <label>Username:
                        <input type="text" value={this.state.username} onChange={this.handleUserChange} />
                    </label>
                    <label>Password:
                        <input type="password" value={this.state.password} onChange={this.handlePassChange} />
                    </label>
                    <label>Retype Password:
                        <input type="password" value={this.state.password2} onChange={this.handlePass2Change} />
                    </label>
                    <label>Secret Key (if you don't know this, you're not supposed to know it):
                        <input type="password" value={this.state.secretKey} onChange={this.handleSKChange} />
                    </label>
                    <input type="submit" value="Register" />
                </form>
            </div>
        )
    }
}

export default RegisterPage;