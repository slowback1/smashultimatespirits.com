import React, { Component } from 'react';
import Cookies from 'universal-cookie';
import Modal from 'react-modal';

import Config from '../../../config/index.json';

import QuizAnswer from './Answer/index';
import ModalContent from './ModalContent/index';

Modal.setAppElement('#root');

class QuizBody extends Component {
    constructor(props) {
        super(props);

        this.handleAnswer = this.handleAnswer.bind(this);
        this.selectAnswer = this.selectAnswer.bind(this);

        this.state = {
            selectedAnswer: -1,
            modalOpen: false,
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
    handleModal(response) {
        this.setState({
            modalOpen: true,
            lastQuestionWasCorrect: response 
        });

        setTimeout(() => this.setState({modalOpen: false}), 5000);
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
                this.handleModal(json.responseBody);
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
                <Modal
                    isOpen={this.state.modalOpen}
                    contentLabel="Quiz Modal"
                    style={ 
                        {
                            content: {
                                color: 'white',
                                background: 'black'
                            }
                        }
                    }
                >
                    <ModalContent
                        correct={this.state.lastQuestionWasCorrect}
                    />
                </Modal>
                <p>{this.props.quizQuestion.question}</p>
                {items}
                <button onClick={() => this.handleAnswer(this.props.quizQuestion.id)}>Submit Answer</button>
            </div>
        );
    }
}

export default QuizBody;