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
                    let resArr = this.props.spirits;
                    jdata.responseBody.map(s =>{
                        resArr.push(new Spirit(
                            s.id,
                            s.name, 
                            s.game, 
                            s.game2, 
                            s.series, 
                            s.description, 
                            s.author
                            ));
                        this.props.updateSpirits(resArr);
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