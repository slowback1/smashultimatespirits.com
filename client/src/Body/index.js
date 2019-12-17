import React, { Component } from 'react';
import SpiritBox from './SpiritBox/index';
class Body extends Component {
    constructor(props) {
        super(props);
        this.state = {isLoaded: true}
    }

    render(){
        const items = this.props.spirits.map((s) => 
        <SpiritBox key={s.id} spirit={s} />
    );
        return(
            <div class="body">
                {items}
            </div>
        );
    }
}

export default Body;