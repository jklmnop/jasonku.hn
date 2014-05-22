/** @jsx React.DOM */

var Header = React.createClass({displayName: 'Header',

	render: function(){

		return (
			React.DOM.div( {class:"header-wrap"}, 
		        React.DOM.div( {class:"container"}, 
		            React.DOM.header( {class:"row"}, 
		                React.DOM.div( {class:"col-sm-12"}, 
		                    React.DOM.h1(null, React.DOM.abbr( {title:"Jason Kuhn"}, "JK")),
		                    React.DOM.p( {class:"lead"}, "is ", React.DOM.small(null, "short"), " for ", React.DOM.em(null, "just kidding"), " ", React.DOM.abbr( {title:"and per se and", class:"amp"}, "&"), " ", React.DOM.strong(null, "Jason Kühn"),".")
		                )
		            )
		        )
		    )
		);
	}
});

React.renderComponent(
	Header(null ),
	document.body
);