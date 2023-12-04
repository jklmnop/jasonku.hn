/** @jsx React.DOM */

var Reddit = React.createClass({displayName: 'Reddit',

  getInitialState: function() {
    return {
      data: ''
    }
  },

  componentDidMount: function() {

  },

  componentWillUnmount: function() {},

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
      React.DOM.ul(null, RedditListItem(null ))
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