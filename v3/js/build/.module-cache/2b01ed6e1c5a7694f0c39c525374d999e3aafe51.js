/** @jsx React.DOM */

var JK = React.createClass({displayName: 'JK',
	render: function(){
		return (
			React.DOM.div(null, 
				Header(null ),
				Content(null ),
				CurrentNoiseList(null )
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

var CurrentNoiseList = React.createClass({displayName: 'CurrentNoiseList',
	lastfm_api: 'http://ws.audioscrobbler.com/2.0',
	lastfm_defaults: {
		user: 'spaceyraygun',
		api_key: '5c0d3688c8baa9174fd725a920152143',
		format: 'json'
	},
	interval: null,	

	getInitialState: function() {
		return {
			lastTen: '',
			nowPlaying: ''
		};
	},

	componentDidMount: function() {
		this._init();
		this._getLastTen();
		this._getNowPlaying();

		this.interval = setInterval(this._getNowPlaying(), 3000);
	},

	componentWillUnmount: function() {
		clearInterval(this.interval);
	},

	_init: function() {
		$.ajaxSetup({
			url: this.lastfm_api,
			dataType: 'json',
			type: 'get'
		});
	},

	_getLastTen: function() {
		var data = $.extend(this.lastfm_defaults, {
					method: 'user.getweeklyartistchart',
					limit: 10
				});

		$.ajax({
			data: data,
			context: this
		}).done(function(data){
			this.setState({
				lastTen: data.weeklyartistchart.artist
			});
		});
	},

	_getNowPlaying: function() {
		var data = $.extend(this.lastfm_defaults, {
					method: 'user.getrecenttracks',
					limit: 1
				});

		$.ajax({
			data: data,
			context: this
		}).done(function(data){
			
			var lastPlayed = data.recenttracks.track[0];

			if(typeof(lastPlayed) !== 'undefined' && lastPlayed['@attr']['nowplaying'] === 'true') {
				this.setState({
					nowPlaying: lastPlayed
				});
			}
		});
	},

	render: function() {
		var items = [];
		$.map(this.state.lastTen, function(artist, i){
			items.push(CurrentNoiseListItem( {href:artist.url, text:artist.name, key:i} ))
		});

		return (
			React.DOM.ul(null, items)
		);
	}

});

var CurrentNoiseListItem = React.createClass({displayName: 'CurrentNoiseListItem',

	render: function() {
		return (
			React.DOM.li(null, 
				React.DOM.a( {href:this.props.href}, this.props.text)
			)
		);
	}

});

React.renderComponent(
	JK(null ),
	document.body
);