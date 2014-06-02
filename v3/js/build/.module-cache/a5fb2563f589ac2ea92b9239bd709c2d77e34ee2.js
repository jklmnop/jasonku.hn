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
        RedditList(null )
      )
    );

  }
});

var RedditList = React.createClass({displayName: 'RedditList',

  render: function() {

    return (
      React.DOM.ul(null, 
        RedditListItem(null )
      )
    );

  }

});

var RedditListItem = React.createClass({displayName: 'RedditListItem',

  render: function() {

    return (
      React.DOM.li(null, "lol")
    );

  }

});

React.renderComponent(
  Reddit(null ),
  document.body
);