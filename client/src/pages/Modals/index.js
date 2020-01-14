import React, { Component } from 'react';
import Cookies from 'universal-cookie';

import CorrectQuizResponse from './CorrectQuizResponse/index';
import IncorrectQuizResponse from './IncorrectQuizResponse/index';


class Modals extends Component {
    constructor(props) {
        super(props);

        this.quizResponseSecondLine = this.quizResponseSecondLine.bind(this);
    }

    quizResponseSecondLine() {
        const cookies = new Cookies();
        let totalQuestions;
        if(cookies.get('banlist').length > 1){
            totalQuestions = cookies.get('banlist').split(',').length;
        } else {
            totalQuestions = 1;
        }
        let correctQuestions = cookies.get('quizScore');

        return <p>You have {correctQuestions} out of {totalQuestions} correct so far.</p>
    }

    render() {
        //100's are for error messages
        //200's are for quiz responses
        //300's are for authentication messages
        //400's are for form response messages (such as when a spirit is successfully added or edited)
        const ModalList = {
            201: <CorrectQuizResponse 
                quizResponseSecondLine={this.quizResponseSecondLine}
            />,
            202: <IncorrectQuizResponse 
                quizResponseSecondLine={this.quizResponseSecondLine}
            />,
        }

        return (
            <div class="innerModal">
                {ModalList[this.props.modalType]}
            </div>
        );
    }
}

export default Modals;