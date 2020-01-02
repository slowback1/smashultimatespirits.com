import react, { Component } from 'react';

class AdminPanel extends Component {
    constructor(props) {
        super(props);

        this.changeAdminForm = this.changeAdminForm.bind(this);
    }
    changeAdminPage(pageId) {
        return pageId;
    }
    componentDidMount() {
        if(this.props.token === null) {
            this.props.handleModal(404); //TO-DO: change to the authentication error modal when I make it
            this.props.changePage(1);
        }
    }

    render() {

        return (
            <div>

            </div>
        )
    }
}

export default AdminPanel;