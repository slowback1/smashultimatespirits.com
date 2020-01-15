import React, { Component } from 'react';

class ChangeLogValue extends Component {


    render() {
        const vals = this.props.values.map((v) => {
            return <div className="value">
                <p>{v}</p>
            </div>
        });

        return (
            <div className="values">
                {vals}
            </div>
        )
    }
}
export default ChangeLogValue;