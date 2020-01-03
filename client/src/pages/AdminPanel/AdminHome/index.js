import React,  { Component } from 'react';

class AdminHome extends Component {
    constructor(props) {
        super(props);
    }


    render() {
        
        return(
            <div>
                <button onClick={() => this.props.changeAdminPage(1)}>Add Spirit</button>
            </div>
        )
    }
}

export default AdminHome;