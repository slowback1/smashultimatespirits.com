import React, { Component } from 'react';
import Config from './config/index.json';
import FetchData from './FetchData/index';
import Page from './pages/index';

class App extends Component {
  constructor(props) {
    super(props);
    this.updateSpirits = this.updateSpirits.bind(this);
    this.dismountFd = this.dismountFd.bind(this);
    this.doneLoading = this.doneLoading.bind(this);
    this.mountFd = this.mountFd.bind(this);


    this.state = {
      spirits: [],
      length: 0,
      spiritTotal: 0,
      fdMounted: false,
      isFullyLoaded: false,
      autoloadEnabled: false,
      page: 1,
      selectedSpirit: null
    }
  }

  updateSpirits(s){
    let sdata = this.state.spirits;
    sdata.push(s);
    sdata.sort(this.compareSpirits)
    this.setState({      
      spirits: sdata
    });
    this.setState({
      length: this.state.spirits.length
    })
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
            min={this.state.length + 1} 
            max={this.state.length + 50} 
            dismountFd={this.dismountFd} 
            doneLoading={this.doneLoading} 
            spiritTotal={this.state.spiritTotal}
            /> 
            : null 
        }
            <Page
              spirits={this.state.spirits}
              spiritTotal={this.state.spiritTotal}
              mountFd={this.mountFd}
              fdMounted={this.state.fdMounted}
              isFullyLoaded={this.state.isFullyLoaded}
            />
      </div>
    );
  }
}

export default App;