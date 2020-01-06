import React, { Component } from 'react';
import Select from 'react-select';

import Config from '../../../config/index.json';
import Spirit from '../../../models/Spirit';

class DeleteSpirit extends Component {
    constructor(props) {
        super(props);

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleIdChange = this.handleIdChange.bind(this);
    
        this.state = {
            spirits: [],
            id: 0,
            selectedSpirit: -1
        }
    }
    handleSubmit(e) {
        e.preventDefault();
        const delData = {
            id: this.state.id
        }
        let url = Config.apiurl + "/spirits/delete/";
        let options = {
            method: "DELETE",
            headers: {
                "token": this.props.token,
                "Content-Type": "application/json"
            },
            body: JSON.stringify(delData)
        };
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseID === 204) {
                    //call successful delete modal
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
            selectedSpirit: spirit
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
        this.state.spirits.forEach(function(spirit) {
            let value = spirit.id;
            let name = `${spirit.id}. ${spirit.name}`;
            options.push({value: value, label: name});
        });


        return (
        <div>
            <form onSubmit={this.handleSubmit}>
                <label htmlFor="id">ID:
                    <Select
                        options={options}
                        onChange={this.handleIdChange}
                        onInputSelect={this.handleIdChange}
                    />
                </label>
                <input type="submit" value="Delete Spirit" />
            </form>
            {
                this.state.selectedSpirit !== -1 ?
                    <div className="selectedSpirit">
                        <p>{this.state.selectedSpirit.id}. {this.state.selectedSpirit.name}</p>
                        <p>{this.state.selectedSpirit.game1}</p>
                        <p>{this.state.selectedSpirit.description}</p>
                        <p>{this.state.selectedSpirit.author}</p>
                    </div>
                : null
            }
        </div>
        );
    }
    

}

export default DeleteSpirit;