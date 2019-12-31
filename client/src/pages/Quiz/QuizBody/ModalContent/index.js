import React, { Component } from 'react';
import Cookies from 'universal-cookie';


class ModalContent extends Component {

    render() {
        let item;
        if(this.props.correct) {
            item = <p>Correct!</p>
        } else {
            item = <p>Too bad!</p>
        }
        const cookies = new Cookies();

        let totalQuestions = cookies.get('banlist').split(',').length;
        let correctQuestions = cookies.get('quizScore');
        
        return (
            <div className="innerModal">
                {item}
                <p>You have {correctQuestions} out of {totalQuestions} correct answers so far.</p>
            </div>
        )
    }
}

export default ModalContent;