import { Component } from 'react';
import Cookies from 'universal-cookie';
import Config from '../config/index.json';


class Token extends Component {
    constructor(props) {
        super(props);

        this.verifyToken = this.verifyToken.bind(this);
    }
    verifyToken(token) {
        let url = Config.apiurl + "/user/verify/";
        let options = {
            method: "POST",
            headers: {
                "token": token
            }
        }
        fetch(url, options)
            .then(res => res.json())
            .then(json => {
                if(json.responseBody) {
                    this.props.addToken(token);
                }
            })
            .catch(err => console.error(err));
    }

    componentDidMount() {
        const cookies = new Cookies();
        let token = cookies.get('token');
        this.verifyToken(token);
        this.props.dismountToken();
    }

    render() {
        return("");
    }

}

export default Token;