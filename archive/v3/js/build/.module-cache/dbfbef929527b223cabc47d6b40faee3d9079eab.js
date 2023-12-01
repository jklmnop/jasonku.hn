/** @jsx React.DOM */

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

var Header = React.createClass({displayName: 'Header',

	render: function(){

		return (
			React.DOM.div( {className:"header-wrap"}, 
		        React.DOM.div( {className:"container"}, 
		            React.DOM.header( {className:"row"}, 
		                React.DOM.div( {className:"col-sm-12"}, 
		                    React.DOM.h1(null, React.DOM.abbr( {title:"Jason Kuhn"}, "JK")),
		                    React.DOM.p( {className:"lead"}, "is ", React.DOM.small(null, "short"), " for ", React.DOM.em(null, "just kidding"), " & ", React.DOM.strong(null, "Jason Kühn"),".")
		                )
		            )
		        )
		    )
		);
	}
});

var Content = React.createClass({displayName: 'Content',

	render: function(){

		return (
			React.DOM.div( {className:"content-wrap"}, 
		        React.DOM.div( {className:"container"}, 
		            React.DOM.section( {className:"row"}, 
						BioBlock( {title:"Work"}, Work(null )),
						BioBlock( {title:"Code"}, Code(null )),
						BioBlock( {title:"Mind"}, Mind(null )),
						BioBlock( {title:"Play"}, Play(null ))
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
            React.DOM.p(null, "I used to make things for a defense contractor & now I make things for academia.")
        );
	}
});

var Code = React.createClass({displayName: 'Code',
	render: function(){
		return(
			React.DOM.p(null, "I do web stuff with languages, frameworks, & content management systems.")
		);
	}
});

var Mind = React.createClass({displayName: 'Mind',
	render: function(){
		return (
			React.DOM.p(null, "I undergrad-ed at an art school, then I grad-ed at a technology school, & now I'm self-educating.")
		);
	}
});

var Play = React.createClass({displayName: 'Play',
	render: function(){
		return (
			React.DOM.p(null, "I live in Philadelphia. I ride my bicycle, I make noise, & I watch MacGyver.")
		);
	}
});

React.renderComponent(
	JK(null ),
	document.body
);

$(function(){
    var $amp = $('abbr', {
        'title': 'and per se and',
        'class': 'amp',
        'html': '&'
    });

    $('*:contains(&)').html().replace('&', $amp.html());
});