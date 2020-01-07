import React, { Component } from 'react';
import Config from './config/index.json';

import FetchData from './FetchData/index';
import Token from './Token/index';

import Page from './pages/index';

class App extends Component {
  constructor(props) {
    super(props);
    this.updateSpirits = this.updateSpirits.bind(this);
    this.dismountFd = this.dismountFd.bind(this);
    this.doneLoading = this.doneLoading.bind(this);
    this.mountFd = this.mountFd.bind(this);
    this.dismountToken = this.dismountToken.bind(this);
    this.addToken = this.addToken.bind(this);
    this.updateShownLength = this.updateShownLength.bind(this);


    this.state = {
      spirits: [],
      shownLength: 50,
      length: 0,
      spiritTotal: 0,
      fdMounted: false,
      isFullyLoaded: false,
      autoloadEnabled: false,
      page: 1,
      selectedSpirit: null,
      token: null,
      tokenMounted: true,

    }
  }
  dismountToken() {
    this.setState({tokenMounted: false})
  }
  addToken(token) {
    this.setState({token: token});
  }
  updateShownLength() {
    this.setState({
      shownLength: this.state.shownLength + 50
    });
  }
  updateSpirits(s){
    this.setState({      
      spirits: s,
      length: Number(this.state.length) + 1
    });
  }
  doneLoading(){
    this.setState({isFullyLoaded: true});
  }
  dismountFd() {
    this.setState({fdMounted: false});
  }
  getTotalSpirits() {
    let url = `${Config.apiurl}/spirits/count/`;
    let options = {};
    fetch(url,options)
      .then(res => res.json())
      .then(jdata => {
        if(true) {
          this.setState({spiritsTotal: jdata.responseBody});
        }
      })
      .catch(err => console.error(err));
  }
  compareSpirits(a, b) {
    if(a.id < b.id) {
      return -1;
    }
    if(a.id > b.id) {
      return 1;
    }
    return 0;
  }
  mountFd() {
    this.setState({fdMounted: true});
  }
  componentDidMount(){
    //load fontawesome icons
    const script = document.createElement('script');
    script.src = Config.faurl;
    document.body.appendChild(script);

    //initialize max value
    if(this.state.spiritTotal < 1) {
      this.getTotalSpirits();
    }
    //load first set of spirits
    this.setState({fdMounted: true});
    
    }
  
  render()
  {
    return (
      <div>
        {
        this.state.fdMounted ? 
          <FetchData  
            updateSpirits={this.updateSpirits} 
            min={Number(this.state.length) + 1} 
            max={Number(this.state.length) + 50} 
            dismountFd={this.dismountFd} 
            doneLoading={this.doneLoading} 
            spiritTotal={this.state.spiritTotal}
            spirits={this.state.spirits}
            /> 
            : null 
        }
        {
          this.state.tokenMounted ?
            <Token 
              addToken={this.addToken}
              dismountToken={this.dismountToken}
            />
          : null
        }
            <Page
              spirits={this.state.spirits}
              spiritTotal={this.state.spiritTotal}
              mountFd={this.mountFd}
              fdMounted={this.state.fdMounted}
              isFullyLoaded={this.state.isFullyLoaded}
              token={this.state.token}
              shownLength={this.state.shownLength}
              updateShownLength={this.updateShownLength}
            />
      </div>
    );
  }
}

export default App;