import React, { Component } from 'react';
//import Select from 'react-select';

//import Config from '../../../config/index.json';

class DeleteQuestion extends Component {
    constructor(props) {
        super(props);

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleIdChange = this.handleIdChange.bind(this);

        this.state = {
            selectedQuestion: -1
        }
    }
    handleSubmit(e) {
        e.preventDefault();
        //...
    }
    handleIdChange(e) {
        this.setState({ 
            selectedQuestion: e.value
        });
    }
    componentDidMount() {
        //TO-DO: build an api endpoint that will expose question details, then connect it here
      /*  let url = Config.apiurl + "/quiz/get/";
        let options = { method: "GET" };
        */
    }
    render() {


        return (
            <div>
                <form onSubmit={this.handleSubmit}>
                    <label htmlFor="question">Question:
                        <inpuut type="number" value={this.state.selectedQuestion} onChange={this.handleIdChange} />
                    </label>
                    <input type="submit" value="Delete Question" />
                </form>
            </div>
        )


    }
}

export default DeleteQuestion;