import React, { Component } from 'react';
import Select from 'react-select';

import Config from '../../../config/index.json';
import Spirit from '../../../models/Spirit';

class AddQuestion extends Component {
    constructor(props) {
        super(props);

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleQuestionChange = this.handleQuestionChange.bind(this);
        this.handleCorrectAnswerChange = this.handleCorrectAnswerChange.bind(this);
        this.handleIncorrectAnswer1Change = this.handleIncorrectAnswer1Change.bind(this);
        this.handleIncorrectAnswer2Change = this.handleIncorrectAnswer2Change.bind(this);
        this.handleIncorrectAnswer3Change = this.handleIncorrectAnswer3Change.bind(this);

        this.state = {
            question: "",
            correctAnswer: 0,
            incorrectAnswer1: 0,
            incorrectAnswer2: 0,
            incorrectAnswer3: 0,
            spirits: []
        }
    }
    handleSubmit(e) {
        e.preventDefault();
        //...
    }
    handleQuestionChange(e) {
        this.setState({
            question: e.target.value
        });
    }
    handleCorrectAnswerChange(e) {
        this.setState({
            correctAnswer: e.value
        });
    }
    handleIncorrectAnswer1Change(e) {
        this.setState({
            incorrectAnswer1: e.value
        });
    }
    handleIncorrectAnswer2Change(e) {
        this.setState({
            incorrectAnswer2: e.value
        });
    }
    handleIncorrectAnswer3Change(e) {
        this.setState({
            incorrectAnswer3: e.value
        });
    }
    componentDidMount() {
        let url = Config.apiurl + "/spirits/get/";
        let options = { method: "GET" };
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                let spiritArr = [];
                json.responseBody.forEach(function(spirit) {
                    spiritArr.push(new Spirit(
                        spirit.id,
                        spirit.name,
                        spirit.game,
                        spirit.game2,
                        spirit.series,
                        spirit.description,
                        spirit.author,
                        spirit.year
                    ));
                });
                this.setState({
                    spirits: spiritArr
                });
            })
            .catch(error => console.error(error));
    }

    render() {
        let baseOptions = [];
        this.state.spirits.forEach(function(spirit) {
            let value = spirit.id;
            let name = `${spirit.id}. ${spirit.name}`;
            baseOptions.push({value: value, label: name});
        });
        let extOptions = baseOptions;
        extOptions.unshift({value: 0, label: "Random"});

        return (
            <div>
                <form onSubmit={this.handleSubmit}>
                    <label htmlFor="question">Question:
                        <input type="text" value={this.state.question} onChange={this.handleQuestionChange} />
                    </label>
                    <label htmlFor="correctAnswer">Correct Answer:
                        <Select
                            options={baseOptions}
                            onChange={this.handleCorrectAnswerChange}
                            onInputSelect={this.handleCorrectAnswerChange}
                        />
                    </label>
                    <label htmlFor="IncorrectAnswers">Incorrect Answers:
                        <Select
                            options={extOptions}
                            onChange={this.handleIncorrectAnswer1Change}
                            onInputSelect={this.handleIncorrectAnswer1Change}
                        />
                        <Select
                            options={extOptions}
                            onChange={this.handleIncorrectAnswer2Change}
                            onInputSelect={this.handleIncorrectAnswer2Change}
                        />
                        <Select
                            options={extOptions}
                            onChange={this.handleIncorrectAnswer3Change}
                            onInputSelect={this.handleIncorrectAnswer3Change}
                        />
                    </label>
                    <input type="submit" value="Add Question" />
                </form>
            </div>

        )
    }
}

export default AddQuestion;