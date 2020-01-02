import React, { Component } from 'react';

class CorrectQuizResponse extends Component {


    render() {

        return(
            <div>
                <p>You got it right!</p>
                {this.props.quizResponseSecondLine()}
            </div>
        );
    }
}

export default CorrectQuizResponse;