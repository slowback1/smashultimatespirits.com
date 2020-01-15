import React, { Component } from 'react';

class ChangeLogValue extends Component {


    render() {
        const vals = this.props.values.map((v, i) => {
            return <div className="value" key={i}>
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