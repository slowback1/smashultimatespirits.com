import React, { Component } from 'react';

import AdminHeader from './Header/index';

import AdminHome from './AdminHome/index';
import AddSpirit from './AddSpirit/index';
import EditSpirit from './EditSpirit/index';
import DeleteSpirit from './DeleteSpirit/index';
import AddQuestion from './AddQuestion/index';
import EditQuestion from './EditQuestion/index';
import DeleteQuestion from './DeleteQuestion/index';

import './style/index.css';

class AdminPanel extends Component {
    constructor(props) {
        super(props);
        this.changeAdminPage = this.changeAdminPage.bind(this);
        
        this.state = {
            currentPage: 0
        }
    }

    changeAdminPage(pageId) {
        this.setState({currentPage: pageId});
    }
    componentDidMount() {
        if(this.props.token === null) {
            this.props.handleModal(404); //TO-DO: change to the authentication error modal when I make it
            this.props.changePage(1);
        }
    }

    render() {
        const pages = {
            0: <AdminHome
                changeAdminPage={this.changeAdminPage}
            />,
            1: <AddSpirit
                changeAdminPage={this.changeAdminPage}
                token={this.props.token}
            />,
            2: <EditSpirit
                changeAdminPage={this.changeAdminPage}
                token={this.props.token}
            />,
            3: <DeleteSpirit
                changeAdminPage={this.changeAdminPage}
                token={this.props.token}
                />,
            4: <AddQuestion
                changeAdminPage={this.changeAdminPage}
                token={this.props.token}
                />,
            5: <EditQuestion
                changeAdminPage={this.changeAdminPage}
                token={this.props.token}
                />,
            6: <DeleteQuestion
                changeAdminPage={this.changeAdminPage}
                token={this.props.token}
                />
        }
        return (
            <div className="adminArea">
                <AdminHeader 
                    changeAdminPage={this.changeAdminPage}
                    changePage={this.props.changePage}
                />
                {pages[this.state.currentPage]}
            </div>
        )
    }
}

export default AdminPanel;