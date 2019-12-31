import React, { Component } from 'react';
import Cookies from 'universal-cookie';

import Header from '../Home/Header/index';
import Footer from '../Home/Footer/index';
import Config from '../../config/index.json';
import QuizQuestion from '../../models/QuizQuestion';
import QuizBody from './QuizBody/index';

class Quiz extends Component {
    constructor(props) {
        super(props);

        this.fetchQuizQuestion = this.fetchQuizQuestion.bind(this);
        this.state = {
            quizQuestion: null
        }
    }
    fetchQuizQuestion() {
        const cookies = new Cookies();
        let banlist = cookies.get('banlist');
        let url = Config.apiurl + "/quiz/get/?id=r";
        let options = {
            method: "GET",
            headers: {
                "banlist": banlist
            }
        }
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 201) {
                    
                
                    let question = new QuizQuestion(
                        json.responseBody[0].id,
                        json.responseBody[0].question,
                        json.responseBody[0].answers,
                    );
                    if(question.validate()) {
                        this.setState({quizQuestion: question});
                    } else {
                        return this.fetchQuizQuestion();
                    }
                }
                else {
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
            <div className="wrapper">
                <Header 
                    changePage={this.props.changePage}
                    changeTheme={this.props.changeTheme}
                />
                {   (this.state.quizQuestion !== null) && 
                    <QuizBody 
                        quizQuestion={this.state.quizQuestion}
                        fetchQuizQuestion={this.fetchQuizQuestion}
                    />
                }
                <Footer />
            </div>
        );
    }
}

export default Quiz;