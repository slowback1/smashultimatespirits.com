import React, { Component } from 'react';

class MenuContents extends Component {
        
    
    render() {
        

        return (
            <div class="menuContents">
                
                <p onClick={() => this.props.changePage(3)}>Credits</p>
            </div>
        )
    }
}

export default MenuContents;