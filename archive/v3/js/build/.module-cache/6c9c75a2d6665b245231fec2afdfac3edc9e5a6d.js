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
      console.log(data);
    });
  },

  render: function() {

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