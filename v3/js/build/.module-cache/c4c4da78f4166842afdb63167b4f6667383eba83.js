/** @jsx React.DOM */

var Content = React.createClass({displayName: 'Content',

	render: function(){

		return (
			BioBlock( {title:"Work"}, Work(null ))
		);
	}
});

var BioBlock = React.createClass({displayName: 'BioBlock',

	render: function(){

		return(
			React.DOM.article( {className:"col-sm-3"}, 
                React.DOM.h2(null, this.props.title),
                React.DOM.blockquote(null, 
                    this.props.children
                )                    
            )
		);
	}
});

var Work = React.createClass({displayName: 'Work',
	render: function(){
		return (
			React.DOM.p(null, "I used to make things for a defense contractor ", React.DOM.abbr( {title:"and per se and", class:"amp"}, "&"), " now I make things for academia.")
		);

	}

});

React.renderComponent(
	Content(null ),
	document.body
);