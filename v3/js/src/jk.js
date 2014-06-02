/** @jsx React.DOM */

var JK = React.createClass({
	render: function(){
		return (
			<div>
				<Header />
				<Content />
				<CurrentNoiseList />
			</div>
		);
	}
});

var Header = React.createClass({

	render: function(){

		return (
			<div className="header-wrap">
		        <div className="container">
		            <header className="row">
		                <div className="col-sm-12">
		                    <h1><abbr title="Jason Kuhn">JK</abbr></h1>
		                    <p className="lead">is <small>short</small> for <em>just kidding</em> &amp; <strong>Jason K&uuml;hn</strong>.</p>
		                </div>
		            </header>
		        </div>
		    </div>
		);
	}
});

var Content = React.createClass({

	render: function(){

		return (
			<div className="content-wrap">
				<div className="container">
					<section className="row">
						<BioBlock title="Work" body="I used to make things for a defense contractor &amp; now I make things for academia." />
						<BioBlock title="Code" body="I do web stuff with languages, frameworks, &amp; content management systems." />
						<BioBlock title="Mind" body="I undergrad-ed at an art school, then I grad-ed at a technology school, &amp; now I&rsquo;m self-educating." />
						<BioBlock title="Play" body="I live in Philadelphia. I ride my bicycle, I make noise, &amp; I watch MacGyver." />
					</section>
				</div>
			</div>
		);
	}
});

var BioBlock = React.createClass({

	render: function(){
		return(
			<article className="col-sm-3">
                <h2>{this.props.title}</h2>
                <blockquote>
                    <p>{this.props.body}</p>
                </blockquote>                    
            </article>
		);
	}
});

var CurrentNoiseList = React.createClass({
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
			var text = this.state.nowPlaying.artist['#text'] +': '+ this.state.nowPlaying.name;
			nowPlaying.push(<NowPlaying href={this.state.nowPlaying.url} text={text} key={666} />);
		}

		$.map(this.state.lastTen, function(artist, i){
			lastTen.push(<CurrentNoiseListItem href={artist.url} text={artist.name} key={i} />)
		});

		return (
			<div>
				{nowPlaying}
				<section>
					<h2>Current Noise</h2>
					<ul>{lastTen}</ul>
				</section>
			</div>
		);
	}

});

var CurrentNoiseListItem = React.createClass({

	render: function() {
		return (
				<li>
					<a href={this.props.href}>{this.props.text}</a>
				</li>
		);
	}
});

var NowPlaying = React.createClass({
	render: function() {
		return (
			<section>
				<h2>Now Playing</h2>
				<p>
					<a href={this.props.href}>{this.props.text}</a>
				</p>
			</section>
		);
	}
});

React.renderComponent(
	<JK />,
	document.body
);