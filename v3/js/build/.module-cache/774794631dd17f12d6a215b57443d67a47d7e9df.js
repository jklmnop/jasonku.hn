/** @jsx React.DOM */

var Content = React.createClass({displayName: 'Content',

	render: function(){

		return (
			React.DOM.div( {className:"content-wrap"}, 
		        React.DOM.div( {className:"container"}, 
		            React.DOM.section( {className:"row"}, 
						BioBlock( {title:"Work"}, Work(null )),
						BioBlock( {title:"Code"}, Code(null ))
					)
				)
			)
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
			React.DOM.p(null, "I used to make things for a defense contractor ", React.DOM.abbr( {title:"and per se and", className:"amp"}, "&"), " now I make things for academia.")
		);
	}
});

var Code = React.createClass({displayName: 'Code',
	render: function(){
		return(
			React.DOM.p(null, "I do web stuff with languages, frameworks, ", React.DOM.abbr( {title:"and per se and", className:"amp"}, "&"), " content management systems.")
		);
	}
});