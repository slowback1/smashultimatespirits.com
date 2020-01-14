import React, { Component } from 'react';
import {
    BrowserRouter as Router,
    Switch,
    Route
} from 'react-router-dom';
import Cookies from 'universal-cookie';
import App from './App';
import Login from './pages/Login/index';
import Register from './pages/Register/index';
import Config from './config/index.json';

class Routes extends Component {
    constructor(props) {
        super(props);

        this.state = {
            isAdmin: false
        }
    }

    componentDidMount() {
        const cookies = new Cookies();
        if(cookies.get('token') && !this.state.isAdmin) {
            let token = cookies.get('token');
            let url = Config.apiurl + "/user/verify/";
            let options = {
                method: "GET",
                headers: {
                    "token": token
                }
            }
            
            fetch(url, options)
                .then(res => res.json())
                .then(json => {
                    if(json.responseID === 200) {
                        this.setState({isAdmin: true});
                    }
                })
                .catch(err => console.error(err));
        }
    }



    render() {
        return (
            <Router>
                <Switch>
                    <Route path="/Login">
                        <Login
                            isAdmin={this.state.isAdmin} 
                            />
                    </Route>
                    <Route path="/Register">
                        <Register 
                            isAdmin={this.state.isAdmin} 
                            />
                    </Route>
                    <Route path="/">
                        <App
                            isAdmin={this.state.isAdmin}
                            />
                    </Route>
                </Switch>
            </Router>
        )
    }
}

export default Routes;