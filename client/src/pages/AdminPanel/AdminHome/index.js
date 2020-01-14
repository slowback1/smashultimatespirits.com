import React,  { Component } from 'react';
import Config from '../../../config/index.json';
import ChangeLog from  '../../../models/ChangeLog';



class AdminHome extends Component {
    constructor(props) {
        super(props);

        this.state = {
            changeLog: []
        }
    }

    componentDidMount() {
        let url = Config.apiurl + "/changelog/get/";
        let options = {
            method: "GET"
        }

        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 201) {
                    let resArr = this.state.changeLog;
                    json.responseBody.forEach((changelogItem) => {
                        resArr.push(new ChangeLog(
                            changelogItem.user,
                            changelogItem.type,
                            changelogItem.value
                        ));
                    });
                    this.setState({changeLog: resArr});
                }
            })
    }
    render() {
        
        return(
            <div className="adminHome">
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

export default AdminHome;