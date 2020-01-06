import React, { Component } from 'react';
import Select from 'react-select';

import Config from '../../../config/index.json';
import Spirit from '../../../models/Spirit.js';

class EditQuestion extends Component {
    constructor(props) {
        super(props);

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleIdChange = this.handleIdChange.bind(this);
        this.handleQuestionChange = this.handleQuestionChange.bind(this);
        this.handleCorrectAnswerChange = this.handleCorrectAnswerChange.bind(this);
        this.handleIncorrectAnswer1Change = this.handleIncorrectAnswer1Change.bind(this);
        this.handleIncorrectAnswer2Change = this.handleIncorrectAnswer2Change.bind(this);
        this.handleIncorrectAnswer3Change = this.handleIncorrectAnswer3Change.bind(this);

        this.state = {
            id: 0,
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
        handleIdChange(e) {
            this.setState({
                 id: e.value
            });
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
                    let spiritsArr = [];
                    json.responseBody.forEach(function(spirit) {
                        spiritsArr.push(new Spirit(
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
                        spirits: spiritsArr
                    });
                })
                .catch(err => console.error(err));


                //TO-DO: build an API endpoint that will expose which dictates which answer is correct, then connect to that endpoint here.
                /* let qurl = Config.apiurl + "/quiz/get/";
                let qoptions = {
                     method: "GET",
                     headers: {
                         "token": this.props.token
                     }
                     
            };
            */
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

            //TO-DO: change the id input to a Select with all questions as its options
            return (
                <div>
                    <form onSubmit={this.handleSubmit}>
                        <label htmlFor="id">Question ID:
                            <input type="number" onChange={this.handleIdChange} />
                            
                        </label>
                        <label htmlFor="correctAnswer">Correct Answer:
                            <Select
                                options={baseOptions}
                                onChange={this.handleCorrectAnswerChange}
                                onInputChange={this.handleCorrectAnswerChange}
                            />
                        </label>
                        <label htmlFor="IncorrectAnswers">Incorrect Answers:
                            <Select 
                                option={extOptions}
                                onChange={this.handleIncorrectAnswer1Change}
                                onInputSelect={this.handleIncorrectAnswer1Change}
                            />
                            <Select 
                                option={extOptions}
                                onChange={this.handleIncorrectAnswer2Change}
                                onInputSelect={this.handleIncorrectAnswer2Change}
                            />
                            <Select 
                                option={extOptions}
                                onChange={this.handleIncorrectAnswer2Change}
                                onInputSelect={this.handleIncorrectAnswer2Change}
                            />
                        </label>
                        <input type="submit" value="Edit Question" />
                    </form>
                </div>
            );
        }


}

export default EditQuestion;