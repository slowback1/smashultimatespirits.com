import React, { Component } from 'react';

import Config from '../../../config/index.json';
import SeriesList from '../../../models/SeriesList';

class AddSpirit extends Component {
    constructor(props) {
        super(props);

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleIdChange = this.handleIdChange.bind(this);
        this.handleNameChange = this.handleNameChange.bind(this);
        this.handleGameChange = this.handleGameChange.bind(this);
        this.handleGame2Change = this.handleGame2Change.bind(this);
        this.handleYearChange = this.handleYearChange.bind(this);
        this.handleSeriesChange = this.handleSeriesChange.bind(this);
        this.handleDescriptionChange = this.handleDescriptionChange.bind(this);
        this.handleAuthorChange = this.handleAuthorChange.bind(this);

        this.state = {
            id: 0,
            name: "",
            game: "",
            game2: "",
            year: 0,
            series: 1,
            description: "",
            author: ""
        }
    }

    handleSubmit(e) {
        e.preventDefault();
        
        let url = Config.apiurl + "/spirits/add/";
        let options = {
            method: "POST",
            headers: {
                "token": this.props.token
            }
        };
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 202) {
                    //call handleModal([WHATEVER THE ADD SPIRIT ID IS])
                    //call changeAdminPage([WHATEVER THE MAIN ADMIN PANEL ID IS])
                } else {
                    //call handleModal([WHATERVER THE ERROR ID IS])
                }
            })
            .catch(err => console.error(err));
    }
    handleNameChange(e) {
        this.setState({
            name: e.target.value
        });
    }
    handleGameChange(e) {
        this.setState({
            game: e.target.value
        });
    }
    handleGame2Change(e) {
        this.setState({
            game2: e.target.value
        });
    }
    hanldeYearChange(e) {
        this.setState({
            year: e.target.value
        });
    }
    handleSeriesChange(e) {
        this.setState({
            series: e.target.value
        })
    }
    handleDescriptionChange(e) {
        this.setState({
            description: e.target.value
        });
    }
    handleAuthorChange(e) {
        this.setState({
            author: e.target.value
        });
    }
    handleIdChange(e) {
        this.setState({
            id: e.target.value
        });
    }

    render() {
        let items;
        for(var i = 0; i < (SeriesList.length / 2); i++) {
            let value = SeriestList[i];
            let name = SeriestList[i + 100];
            items = items + <option value={value}>{name}</option>
        }
        return (
            <div>
                <form onSubmit={() => this.handleSubmit()}>
                    <label for="id">ID:
                        <input type="number" value={this.state.id} onChange={() => this.handleIdChange()} />
                    </label>
                    <label for="name">Name:
                        <input type="text" value={this.state.name} onChange={() => this.handleNameChange()} />
                    </label>
                    <label for="game">Games:
                        <input type="text" value={this.state.game} onChange={() => this.handleGameChange()} />
                    </label>
                    <label for="game2">Second Game (Optional):
                        <input type="text" value={this.state.game2} onChange={() => this.handleGame2Change()} />
                    </label>
                    <label for="year">Release Year:
                        <input type="number" value={this.state.year} onChange={() => this.handleYearChange()} />
                    </label>
                    <label for="series">Series:
                        {items}
                    </label>
                    <label for="description">Description:
                        <input type="textarea" value={this.state.description} onChange={() => this.handleDescriptionChange()} />
                    </label>
                    <label for="author">Author:
                        <input type="text" value={this.state.author} onChange={() => this.handleAuthorChange()} />
                    </label>
                    <input type="submit" value="Add Spirit" />
                </form>
            </div>
        )
    }
}


export default AddSpirit;