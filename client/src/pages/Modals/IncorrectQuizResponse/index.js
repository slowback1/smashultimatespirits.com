import React, { Component } from 'react';

class IncorrectQuizResponse extends Component {


    render() {

        return(
            <div>
                <p>Too bad, you got it wrong!</p>
                {this.props.quizResponseSecondLine()}
            </div>
        );
    }
}

export default IncorrectQuizResponse;