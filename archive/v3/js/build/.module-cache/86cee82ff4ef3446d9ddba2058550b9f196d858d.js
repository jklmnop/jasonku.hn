/** @jsx React.DOM */

var jk = React.createClass({displayName: 'jk',
	render: function(){
		return (
			React.DOM.div(null, 
				Header(null ),
				Content(null )
			)
		);
	}
});

