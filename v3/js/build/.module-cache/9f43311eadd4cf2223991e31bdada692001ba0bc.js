/** @jsx React.DOM */

var JK = React.createClass({displayName: 'JK',
	render: function(){
		return (
			React.DOM.div(null, 
				Header(null ),
				Content(null ),
				LikeButton(null ),
				UserGist( {source:"https://api.github.com/users/octocat/gists"} )
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
						BioBlock( {title:"Work", body:"I used to make things for a defense contractor & now I make things for academia."} ),
						BioBlock( {title:"Code", body:"I do web stuff with languages, frameworks, & content management systems."} ),
						BioBlock( {title:"Mind", body:"I undergrad-ed at an art school, then I grad-ed at a technology school, & now I’m self-educating."} ),
						BioBlock( {title:"Play", body:"I live in Philadelphia. I ride my bicycle, I make noise, & I watch MacGyver."} )
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
                    React.DOM.p(null, this.props.body)
                )                    
            )
		);
	}
});

var LikeButton = React.createClass({displayName: 'LikeButton',
	getInitialState: function() {
		return {
			liked: false
		};
	},

	handleClick: function(event) {
		this.setState({
			liked: !this.state.liked
		});
	},

	render: function() {
		var text = this.state.liked ? 'like': 'unlike';

		return (
			React.DOM.p( {className:"btn btn-primary", onClick:this.handleClick}, 
				"You ", text, " this. Click to toggle."
			)
		);

	}
});

var UserGist = React.createClass({displayName: 'UserGist',
	getInitialState: function() {
		return {
			username: '',
			lastGistUrl: ''
		};
	},

	componentDidMount: function(x) {

		console.log(x);
		$.get(this.props.source, function(result){
			var lastGist = result[0];
			console.log(lastGist);
			this.setState({
				username: lastGist.owner.login,
				lastGistUrl: lastGist.html_url
			});
		}.bind(this));
	},

	render: function() {
		return (
			React.DOM.div(null, 
				this.state.username,"’s last gist is ", React.DOM.a( {href:this.state.lastGistUrl}, "here"),"." 
			)
		);
	}

});

React.renderComponent(
	JK(null ),
	document.body
);