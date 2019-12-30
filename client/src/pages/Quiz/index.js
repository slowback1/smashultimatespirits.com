import React, { Component } from 'react';
import Header from '../Home/Header/index';
import Config from '../../config/index.json';
import QuizQuestion from '../../models/QuizQuestion';

class Quiz extends Component {
    constructor(props) {
        super(props);

        this.fetchQuizQuestion = this.fetchQuizQuestion.bind(this);
        this.state = {
            quizQuestion: null
        }
    }
    fetchQuizQuestion() {
        fetch(Config.apiurl + "/quiz/get/?id=r")
            .then(res => res.json())
            .then(json => {
                let question = new QuizQuestion(
                    json.id,
                    json.question,
                    json.answers,
                );
                if(question.validate()) {
                    this.setState({quizQuestion: question});
                } else {
                    return this.fetchQuizQuestion();
                }
            })
            .catch(err => console.error(err));
    }

    componentDidMount() {
        this.fetchQuizQuestion();
    }

    render() {
        

        return (
            <div class="wrapper">
                <Header 
                    changePage={this.props.changePage}
                />
            </div>
        );
    }
}

export default Quiz;