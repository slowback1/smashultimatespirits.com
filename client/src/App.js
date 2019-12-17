import React, { Component } from 'react';
import Config from './config/index.json';
import FetchData from './FetchData/index';
import Body from './Body/index';

class App extends Component {
  constructor(props) {
    super(props);
    this.updateSpirits = this.updateSpirits.bind(this);
    this.dismountFd = this.dismountFd.bind(this);
    this.doneLoading = this.doneLoading.bind(this);

    this.state = {
      spirits: [],
      length: 0,
      spiritTotal: 0,
      fdMounted: false,
      isFullyLoaded: false,
    }
  }
  updateSpirits(s){
    let sdata = this.state.spirits;
    sdata.push(s);
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
  componentDidMount(){
    if(this.state.spiritTotal < 1) {
      this.getTotalSpirits();
    }
    if(!this.state.isFullyLoaded) {
      setInterval(() => {
        this.setState({fdMounted: true});
      }, 2500);
    }
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
            <Body
              spirits={this.state.spirits}
            />
      </div>
    );
  }
}

export default App;