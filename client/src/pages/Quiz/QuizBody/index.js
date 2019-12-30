import React, { Component } from 'react';
import QuizAnswer from './Answer/index';

class QuizBody extends Component {
    constructor(props) {
        super(props);

        this.handleAnswer = this.handleAnswer.bind(this);
    }
    handleAnswer() {
        //TO-DO
        return true;
    }
    render() {
        let items = this.props.quizQuestion.answers.map((answer) => {
            <Answer answer={answer} />
        })
    }
}

export default QuizBody;