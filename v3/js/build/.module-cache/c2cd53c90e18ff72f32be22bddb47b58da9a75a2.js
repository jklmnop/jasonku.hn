/** @jsx React.DOM */

var Header = React.createClass({displayName: 'Header',

	render: function(){

		return (
			React.DOM.div(null, 
				React.DOM.h1(null, React.DOM.abbr( {title:"Jason Kuhn"}, "JK")),
                React.DOM.p( {class:"lead"}, "is ", React.DOM.small(null, "short"), " for ", React.DOM.em(null, "just kidding"), " ", React.DOM.abbr( {title:"and per se and", class:"amp"}, "&"), " ", React.DOM.strong(null, "Jason Kühn"),".")
			)
		);
	}
});

React.renderComponent(
	Header(null ),
	document.body
);