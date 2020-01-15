import React, { Component } from 'react';
import Hamburger from './Hamburger/index';


class AdminHeader extends Component {
    constructor(props) {
        super(props);
        this.state = {
            width: 0,
            height: 0
        }
        this.updateWindowDimensions = this.updateWindowDimensions.bind(this);
    }
    updateWindowDimensions() {
        this.setState({
            width: window.innerWidth, 
            height: window.innerHeight
        });
    }
    componentDidMount() {
        this.updateWindowDimensions();
        window.addEventListener('resize', this.updateWindowDimensions);
    }
    componentWillUnmount() {
        window.removeEventListener('resize', this.updateWindowDimensions);
    }
    render() {
        let items;
        if(this.state.width > 500) {
            items = <div className="adminHeader">
            <button onClick={() => this.props.changePage(1)}><i className="fa fa-home"></i></button>
            <button onClick={() => this.props.changeAdminPage(0)}>Changelog</button>
            <button onClick={() => this.props.changeAdminPage(1)}>Add Spirit</button>
            <button onClick={() => this.props.changeAdminPage(2)}>Edit Spirit</button>
            <button onClick={() => this.props.changeAdminPage(3)}>Delete Spirit</button>
            <button onClick={() => this.props.changeAdminPage(4)}>Add Question</button>
            <button onClick={() => this.props.changeAdminPage(5)}>Edit Question</button>
            <button onClick={() => this.props.changeAdminPage(6)}>Delete Question</button>
        </div>
        } else {
            items = <Hamburger
                        changeAdminPage={this.props.changeAdminPage}
                        changePage={this.props.changePage}
                    />
        }
        return(
            <div>{items}</div>
        )
    }
}

export default AdminHeader;