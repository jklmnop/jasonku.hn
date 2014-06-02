/** @jsx React.DOM */

var Reddit = React.createClass({displayName: 'Reddit',

  getInitialState: function() {
    return {
      data: ''
    }
  },

  componentDidMount: function() {
    this._getData();
  },

  componentWillUnmount: function() {},

  _getData: function() {
    $.ajax('http://www.reddit.com/new.json', {
      context: this
    }).done(function(data) {
      this.setState({
        data: data.data.children
      });
    });
  },

  render: function() {

    var items = [];

    $.map(this.state.lastTen, function(artist, i){
      lastTen.push(CurrentNoiseListItem( {href:artist.url, text:artist.name, key:i} ))
    });

    $.map(this.state.data)

    return (
      React.DOM.section(null, 
        RedditList(null, 
          RedditListItem(null )
        )
      )
    );

  }
});

var RedditList = React.createClass({displayName: 'RedditList',

  render: function() {

    return (
      React.DOM.ul(null, 
        this.props.children
      )
    );

  }

});

var RedditListItem = React.createClass({displayName: 'RedditListItem',

  render: function() {

    return (
      React.DOM.li(null, 
        React.DOM.a( {href:this.props.url}, this.props.text)
      )
    );

  }

});

React.renderComponent(
  Reddit(null ),
  document.body
);