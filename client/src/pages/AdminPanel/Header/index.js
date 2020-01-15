import React, { Component } from 'react';

class AdminHeader extends Component {
    render() {
        return(
            <div className="adminHeader">
                <button onClick={() => this.props.changeAdminPage(1)}>Add Spirit</button>
                <button onClick={() => this.props.changeAdminPage(2)}>Edit Spirit</button>
                <button onClick={() => this.props.changeAdminPage(3)}>Delete Spirit</button>
                <button onClick={() => this.props.changeAdminPage(4)}>Add Question</button>
                <button onClick={() => this.props.changeAdminPage(5)}>Edit Question</button>
                <button onClick={() => this.props.changeAdminPage(6)}>Delete Question</button>
            </div>
        )
    }
}

export default AdminHeader;