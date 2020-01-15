import React, { Component } from 'react';

class MenuContents extends Component {
    render() {
        return (
            <div className="menuContents">
                <button onClick={() => this.props.closeMenu()}><i className="fa fa-cross"></i></button>
                <button onClick={() => this.props.changePage(1)}><i className="fa fa-home"></i></button>
                <button onClick={() => this.props.changeAdminPage(0)}>Changelog</button>
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

export default MenuContents;