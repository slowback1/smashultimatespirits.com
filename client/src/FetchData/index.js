import { Component } from 'react';
import Spirit from '../models/Spirit.js';
import Config from '../config/index.json';
class FetchData extends Component {
    componentDidMount(){
        let url = `${Config.apiurl}/spirits/get/?range=${this.props.min}-${this.props.max}`;
        let options = {};
        fetch(url, options)
            .then(res => res.json())
            .then(jdata => {
                if(jdata.responseID === 201){
                    jdata.responseBody.map(s =>{
                        this.props.updateSpirits(new Spirit(
                            s.id,
                            s.name, 
                            s.game, 
                            s.game2, 
                            s.series, 
                            s.description, 
                            s.author
                            ));
                            if(s.id === this.props.spiritTotal) {
                                this.props.doneLoading();
                            }
                            return 1;
                        
                    });
                    this.props.dismountFd();
                }
            })
            .catch(err => console.error(err));
    }
    render() {
        return ("");
    }
}

export default FetchData;