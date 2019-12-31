import React, { Component } from 'react';
import Config from '../../../../config/index.json';
import './temp.css';

class QuizAnswer extends Component {
    constructor(props) {
        super(props);

        this.state = {
            name: ""
        }
    }

    componentDidMount() {
        fetch(Config.apiurl + `/spirits/get/?id=${this.props.answer}`)
            .then(res => res.json())
            .then(json => {
                this.setState({name: json.responseBody[0].name})
            })
            .catch(err => console.error(err));
    }

    render() {
        return (
            <div className="quizAnswer" onClick={() => this.props.selectAnswer(this.props.answer)}>
                <img src={require(`../../../../img/spiritImgs/${this.props.answer}.png`)} alt={this.props.answer}/>
                <p>{this.props.answer}. {this.state.name}</p>
            </div>
        );
    }
}
export default QuizAnswer;