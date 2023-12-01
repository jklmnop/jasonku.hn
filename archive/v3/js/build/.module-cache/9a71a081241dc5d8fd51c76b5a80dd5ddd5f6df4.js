/** @jsx React.DOM */
require(['header.js', 'content.js']);


var JK = React.createClass({displayName: 'JK',
	render: function(){
		return (
			React.DOM.div(null, 
				Header(null ),
				Content(null )
			)
		);
	}
});

React.renderComponent(
	JK(null ),
	document.body
);