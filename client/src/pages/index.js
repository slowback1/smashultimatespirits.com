import React, { Component } from 'react';
import Cookies from 'universal-cookie';

import './style/index.css';

import Details from './Details/index';
import HomePage from './Home/index';
import Credits from './Credits/index';
import Quiz from './Quiz/index';


class Page extends Component {
    constructor(props) {
        super(props);

        this.changeToDetails = this.changeToDetails.bind(this);
        this.nextSpirit = this.nextSpirit.bind(this);
        this.previousSpirit = this.previousSpirit.bind(this);
        this.changePage = this.changePage.bind(this);

        this.state = {
            selectedSpirit: null,
            page: 1,
            themeset:5
        }
    }
    changeToDetails(spirit) { 
        this.setState({
            page: 2,
            selectedSpirit: spirit
        });
        if(
            this.state.selectedSpirit !== null && 
            this.state.selectedSpirit.id < this.props.spirits.length - 5
            ) {
            this.props.mountFd();
        }
    }
    changePage(pageNumber) {
        this.setState({
            page: pageNumber
        });
    }
    componentDidUpdate() {
        if(!this.props.isFullyLoaded && this.state.page !== 1) {
            setInterval(() => {this.props.mountFd()}, 5000)
        }
    }
    componentDidMount() {
        const cookies = new Cookies();

        if(cookies.get('theme')) {
            this.setState({theme: cookies.get('theme')})
        } else {
            cookies.set('theme', 1, {
                path: "/"
            });
        }
    }
    
    nextSpirit() {
        const isCurrentSpirit = (element) => element === this.state.selectedSpirit;
        let curIndex = this.props.spirits.findIndex(isCurrentSpirit);
        if(curIndex === this.props.spiritTotal - 1) {
            this.setState({selectedSpirit: this.props.spirits[0]});
        } else {
            this.setState({selectedSpirit: this.props.spirits[curIndex + 1]});
        }
    }
    previousSpirit() {
        const isCurrentSpirit = (element) => element === this.state.selectedSpirit;
        let curIndex = this.props.spirits.findIndex(isCurrentSpirit);
        if(curIndex === 0) {
            this.setState({selectedSpirit: this.props.spirits[0]});
        } else {
            this.setState({selectedSpirit: this.props.spirits[curIndex - 1]});
        }
    }
    render(){
        const pages = {
            1: <HomePage
                    spirits={this.props.spirits}
                    changeToDetails={this.changeToDetails}
                    mountFd={this.props.mountFd}
                    changePage={this.changePage}
                />,
            2: <Details
                    changePage={this.changePage}
                    nextSpirit={this.nextSpirit}
                    previousSpirit={this.previousSpirit}
                    spirit={this.state.selectedSpirit}
                    mountFd={this.props.mountFd}
                    spirits={this.props.spirits}
            />,
            3: <Credits 
                    changePage={this.changePage}
            />,
            4: <Quiz
                    changePage={this.changePage}
                />
        }

        const theme = {
            1: "s64",
            2: "Melee",
            3: "Brawl",
            4: "WiiU",
            5: "Ultimate"
        }

        return (
            <div class={theme[this.state.themeset]}>
                {pages[this.state.page]}
            </div>
        )
    }   
}

export default Page;