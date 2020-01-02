import React, { Component } from 'react';
import Cookies from 'universal-cookie';

import Config from '../../../config/index.json';

import QuizAnswer from './Answer/index';


class QuizBody extends Component {
    constructor(props) {
        super(props);

        this.handleAnswer = this.handleAnswer.bind(this);
        this.selectAnswer = this.selectAnswer.bind(this);

        this.state = {
            selectedAnswer: -1,
            lastQuestionWasCorrect: false
        }
    }
    addToBanList(questionId) {
        const cookies = new Cookies();

        if(cookies.get('banlist')) {
            cookies.set(
                'banlist', 
                cookies.get('banlist') + `, ${questionId}`, 
                {path: "/"});
        } else {
            cookies.set(
                'banlist', 
                [questionId], 
                {path: "/"});
        }
    }
    updateScoreIfAnsweredCorrectly(response) {
        const cookies = new Cookies();

        if(!cookies.get('quizScore')) {
            cookies.set(
                'quizScore',
                0,
                {path: "/"}    
            );
        }
        if(response.responseBody) {
            cookies.set(
                'quizScore',
                Number(cookies.get('quizScore')) + 1,
                {path: "/"}
            );
        }
    }
    handleAnswer(questionId) {
        if(this.state.selectedAnswer === -1) {
            return false;
        }
        let postBody = {
            id: questionId,
            answer: this.state.selectedAnswer
        };
        let url = Config.apiurl + "/quiz/verify/";
        let options = {
            method: "POST",
            body: JSON.stringify(postBody)
        };
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                this.addToBanList(questionId);
                this.updateScoreIfAnsweredCorrectly(json);
                let mt;
                if(json.responseBody) {
                    mt = 201;
                } else {
                    mt = 202;
                }
                this.props.handleModal(mt);
                this.props.fetchQuizQuestion();
            })
            .catch(err => console.error(err));
    }
    selectAnswer(answerId) {
        this.setState({selectedAnswer: answerId});
    }
    render() {
        let items;
        if(this.props.quizQuestion !== null) {
        items = this.props.quizQuestion.answers.map((answer) => 
            <QuizAnswer 
                answer={answer} 
                key={answer}
                selectAnswer={this.selectAnswer}
            />);
        }
        return (
            <div>
                <p>{this.props.quizQuestion.question}</p>
                {items}
                <button onClick={() => this.handleAnswer(this.props.quizQuestion.id)}>Submit Answer</button>
            </div>
        );
    }
}

export default QuizBody;