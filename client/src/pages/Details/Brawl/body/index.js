import React, { Component } from 'react';
 
class DBody extends Component {

    render() {
        return (
            <div className="dbody">
                <img className="detailsSpiritImage" 
                    src={require(`../../../../img/spiritImgs/${this.props.spirit.id}`)} 
                    alt={this.props.spirit.name} />
                <div className="detailsText">
                    <p className="detailsDescription">
                        {this.props.spirit.description}
                    </p>
                    <div className="detailsGames">
                        <p>{this.props.spirit.game1}</p>
                        {this.props.spirit.game2 !== "n" ? <p>this.props.spirit.game2</p> : null}
                    </div>
                </div>
            </div>
        )
    }
}

export default DBody;