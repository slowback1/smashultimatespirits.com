import React, { Component } from 'react';
import Select from 'react-select';

import Config from '../../../config/index.json';
import SeriesList from '../../../models/SeriesList';
import Spirit from '../../../models/Spirit';

class EditSpirit extends Component {
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
            id: 1,
            name: "",
            game: "",
            game2: "",
            year: 0,
            series: 1,
            description: "",
            author: "",
            spirits: []
        }
    }
    handleSubmit(e) {
        e.preventDefault();
        const editData = {
            id: this.state.id,
            name: this.state.name,
            game: this.state.game,
            game2: (this.state.game2 === "" ? "n" : this.state.game2),
            year: this.state.year,
            series: this.state.series,
            description: this.state.description,
            author: this.state.author
        }
        let url = Config.apiurl + "/spirits/edit/";
        let options = {
            method: "PUT",
            headers: {
                "token": this.props.token,
                "Content-Type": "application/json"
            },
            body: JSON.stringify(editData)
        };
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 203) {
                    //call successful edit modal
                    this.props.changeAdminPage(0);
                }
                else {
                    //call error modal
                }
            })
            .catch(error => console.error(error));
    }
    handleIdChange(e) {
        let spirit = this.state.spirits.find(a => a.id === e.value);
        this.setState({
            id: spirit.id,
            name: spirit.name,
            game: spirit.game1,
            game2: spirit.game2,
            series: spirit.series,
            description: spirit.description,
            author: spirit.author,
            year: spirit.year
        });
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
    handleYearChange(e) {
        this.setState({
            year: e.target.value
        });
    }
    handleSeriesChange(e) {
        this.setState({
            year: e.value
        });
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
    componentDidMount() {
        let url = Config.apiurl + "/spirits/get/";
        let options = { method: "GET" };
        fetch(url, options) 
            .then(res => res.json())
            .then(json => {
                let spiritsArr = [];
                json.responseBody.forEach(function(spirit) {
                    spiritsArr.push(new Spirit(
                        spirit.id,
                        spirit.name,
                        spirit.game,
                        spirit.game2,
                        spirit.series,
                        spirit.description,
                        spirit.author,
                        spirit.year
                    ));
                });
                this.setState({
                    spirits: spiritsArr
                });

            })
            .catch(err => console.error(err));
    }

    render() {
        let options = [];
        for(let i = 0; i < (Object.keys(SeriesList).length / 2); i++) {
            let value = SeriesList[i];
            let name = SeriesList[i + 100];
            options.push({value: value, label: name});
        }
        let idOptions = [];
        this.state.spirits.forEach(function(spirit) {
            let idValue = spirit.id;
            let idName = `${spirit.id}. ${spirit.name}`;
            idOptions.push({value: idValue, label: idName});
        });
        return (
            <div>
                <form onSubmit={this.handleSubmit}>
                    <label htmlFor="id">ID:
                        <Select
                            options={idOptions}
                            onChange={this.handleIdChange}
                            onInputSelect={this.handleIdChange}
                        />
                    </label>
                    <label htmlFor="name">Name:
                        <input type="text" value={this.state.name} onChange={this.handleNameChange} />
                    </label>
                    <label htmlFor="game">Game:
                        <input type="text" value={this.state.game} onChange={this.handleGameChange} />
                    </label>
                    <label htmlFor="game2">Second Game: 
                        <input type="text" value={this.state.game2} onChange={this.handleGame2Change} />
                    </label>
                    <label htmlFor="year">Release Year:
                        <input type="number" value={this.state.year} onChange={this.handleYearChange} />
                    </label>
                    <label htmlFor="series">Series:
                        <Select
                            options={options}
                            onChange={this.handleSeriesChange}
                            onInputSelect={this.handleSeriesChange}
                        />
                    </label>
                    <label htmlFor="description">Description:
                        <input tyep="textarea" value={this.state.description} onChange={this.handleDescriptionChange} />
                    </label>
                    <label htmlFor="author">Author:
                        <input type="text" value={this.state.author} onChange={this.handleAuthorChange} />
                    </label>
                    <input type="submit" value="Edit Spirit" />
                </form>
            </div>
        );
    }



}

export default EditSpirit; 