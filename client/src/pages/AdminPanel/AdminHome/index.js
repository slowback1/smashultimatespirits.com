import React,  { Component } from 'react';
import Config from '../../../config/index.json';
import ChangeLog from  '../../../models/ChangeLog';
import ChangeLogItem from './ChangeLogItem/index';



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
        let items = this.state.changeLog.map((m, i) => {
            return <ChangeLogItem
                        key={i}
                        type={m.type}
                        user={m.user}
                        values={m.value}
                    />
        });
        return(
            <div className="adminHome">
                {items}
            </div>
        )
    }
}

export default AdminHome;