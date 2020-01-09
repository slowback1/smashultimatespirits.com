import React, { Component } from 'react';

class DBody extends Component {
    constructor(props) {
        super(props);
        this.state = {isLoaded: true}
    }

    render() {
        return (
            <div class="dbody">
                <p className="detailsName">{this.props.spirit.id}. {this.props.spirit.name}</p>
                <img className="detailsSpiritImage" src={require(`../../../img/spiritImgs/${this.props.spirit.id}.png`)} alt={this.props.spirit.name} />
                <div className="detailsText">
                    <p className="detailsDescription">{this.props.spirit.description}</p>
                    <div className="detailsGames">
                        <p>{this.props.spirit.game1}</p>
                        <p>{this.props.spirit.game2 !== "n" ? this.props.spirit.game2 : null}</p>
                    </div>
                </div>
                <img className="detailsSeriesIcon" src={require(`../../../img/series/${this.props.spirit.series}.png`)} alt={this.props.spirit.series} />
                
            </div>
        )
    }
}

export default DBody;