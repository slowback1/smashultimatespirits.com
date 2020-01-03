import React, { Component } from 'react';
import AdminHome from './AdminHome/index';
import AddSpirit from './AddSpirit/index';


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
        }
        return (
            <div>
                {pages[this.state.currentPage]}
            </div>
        )
    }
}

export default AdminPanel;