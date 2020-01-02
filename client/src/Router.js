import React, { Component } from 'react';
import {
    BrowserRouter as Router,
    Switch,
    Route
} from 'react-router-dom';
import App from './App';
import Login from './pages/Login/index';
import Register from './pages/Register/index';

class Routes extends Component {
    render() {
        return (
            <Router>
                <Switch>
                    <Route path="/Login">
                        <Login />
                    </Route>
                    <Route path="/Register">
                        <Register />
                    </Route>
                    <Route path="/">
                        <App />
                    </Route>
                </Switch>
            </Router>
        )
    }
}

export default Routes;