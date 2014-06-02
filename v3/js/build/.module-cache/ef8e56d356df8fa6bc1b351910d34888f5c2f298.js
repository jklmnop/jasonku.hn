/** @jsx React.DOM */

var Reddit = React.createClass({displayName: 'Reddit',

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