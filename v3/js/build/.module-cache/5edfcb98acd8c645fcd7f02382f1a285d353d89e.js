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
		console.log('mount');
		this._init();
		this._getLastTen();
		this._getNowPlaying();

		this.interval = setInterval(this._getNowPlaying, 1000*30);
	},

	componentWillUnmount: function() {
		console.log('unmount');
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
		console.log('now playing');
		var data = $.extend(this.lastfm_defaults, {
					method: 'user.getrecenttracks',
					limit: 1
				});

		$.ajax({
			data: data,
			context: this
		}).done(function(data){
			
			var track = data.recenttracks.track[0];

			if(typeof(track) !== 'undefined' && track['@attr']['nowplaying'] === 'true') {
				this.setState({
					nowPlaying: track
				});

				console.log(this.state.nowPlaying);
			} else {
				console.log('silence');
			}
		});
	},

	render: function() {
		var lastTen = [],
				nowPlaying = [];

		if(this.state.nowPlaying) {
			nowPlaying.push(NowPlaying( {href:this.state.nowPlaying.url, text:this.state.nowPlaying.artist['#text'] +': '+ this.state.nowPlaying.name, key:666} ));
		}

		$.map(this.state.lastTen, function(artist, i){
			lastTen.push(CurrentNoiseListItem( {href:artist.url, text:artist.name, key:i} ))
		});

		return (
			React.DOM.div(null, 
				nowPlaying,
				React.DOM.section(null, 
					React.DOM.h2(null, "Current Noise"),
					React.DOM.ul(null, lastTen)
				)
			)
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

var NowPlaying = React.createClass({displayName: 'NowPlaying',
	render: function() {
		return (
			React.DOM.section(null, 
				React.DOM.h2(null, "Now Playing"),
				React.DOM.p(null, 
					React.DOM.a( {href:this.props.href}, this.props.text)
				)
			)
		);
	}
});

React.renderComponent(
	JK(null ),
	document.body
);