import React, { Component } from 'react';
import Cookies from 'universal-cookie';
import Modal from 'react-modal';

import './style/index.css';

import Modals from './Modals/index';
import Details from './Details/index';
import HomePage from './Home/index';
import Credits from './Credits/index';
import Quiz from './Quiz/index';
import LoginPage from './Login/index';
import RegisterPage from './Register/index';

Modal.setAppElement("#root");



class Page extends Component {
    constructor(props) {
        super(props);

        this.changeToDetails = this.changeToDetails.bind(this);
        this.nextSpirit = this.nextSpirit.bind(this);
        this.previousSpirit = this.previousSpirit.bind(this);
        this.changePage = this.changePage.bind(this);
        this.changeTheme = this.changeTheme.bind(this);
        this.handleModal = this.handleModal.bind(this);

        this.state = {
            selectedSpirit: null,
            page: 1,
            themeset:5,
            modalOpen: false,
            modalType: 0,
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
    changeTheme(theme) {
        this.setState({themeset: theme});
        const cookies = new Cookies();

        cookies.set('theme', theme, { path: "/" });
    }
    handleModal(type) {
        this.setState({
            modalOpen: true,
            modalType: type
        })
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
    componentDidMount() {
        const cookies = new Cookies();

        if(cookies.get('theme')) {
            this.setState({themeset: Number(cookies.get('theme'))})
        } else {
            cookies.set('theme', 1, {
                path: "/"
            });
        }
    }
    

    render(){
        const pages = {
            1: <HomePage
                    spirits={this.props.spirits}
                    changeToDetails={this.changeToDetails}
                    mountFd={this.props.mountFd}
                    changePage={this.changePage}
                    changeTheme={this.changeTheme}

                />,
            2: <Details
                    changePage={this.changePage}
                    nextSpirit={this.nextSpirit}
                    previousSpirit={this.previousSpirit}
                    spirit={this.state.selectedSpirit}
                    mountFd={this.props.mountFd}
                    fdMounted={this.props.fdMounted}
                    spirits={this.props.spirits}
            />,
            3: <Credits 
                    changePage={this.changePage}
                    changeTheme={this.changeTheme}
            />,
            4: <Quiz
                    changePage={this.changePage}
                    changeTheme={this.changeTheme}
                    handleModal={this.handleModal}
                />,
            5: <LoginPage
                changePage={this.changePage}
            />,
            6: <RegisterPage 
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
            <div className={theme[this.state.themeset]}>
                <Modal
                    isOpen={this.state.modalOpen}
                    contnetLabel={"Modal"}
                    style={
                        {
                            content: {
                                color: 'white',
                                background: 'black'
                            }
                        }
                    }
                >
                    <Modals 
                        modalType={this.state.modalType}
                    />
                </Modal>
                {pages[this.state.page]}
            </div>
        )
    }   
}

export default Page;