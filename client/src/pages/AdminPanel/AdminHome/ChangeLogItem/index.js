import React, { Component } from 'react';
import ChangeLogValue from './ChangeLogValue/index';

class ChangeLogItem extends Component {


    render() {
        let values;
        if(this.props.values.length > 0) {
            values = this.props.values.map((val, ind) => 
            <ChangeLogValue 
                        key={ind}
                        values={val}
                    />);
        }

        return (
            <div className="changeLogItem">
                <p className="changeLogType">{this.props.type}</p>
                <p className="changeLogUser">{this.props.user}</p>
                <div>
                    {values}
                </div>
            </div>
        )
    }
}

export default ChangeLogItem;