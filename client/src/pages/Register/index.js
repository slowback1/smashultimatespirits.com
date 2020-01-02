import React, { Component } from 'react';

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
    }

    render() {

        return (
            <div>
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