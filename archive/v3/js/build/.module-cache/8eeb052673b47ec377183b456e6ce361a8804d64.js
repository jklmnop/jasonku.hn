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
      React.DOM.div(null, "hello.")
    )

  }
});

React.renderComponent(
  Reddit(null ),
  document.body
);