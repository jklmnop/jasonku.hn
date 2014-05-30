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

var LikeButton = React.createClass({
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
			<p className="btn btn-primary" onClick={this.handleClick}>
				You {text} this. Click to toggle.
			</p>
		);

	}
});

var UserGist = React.createClass({
	getInitialState: function() {
		return {
			username: '',
			lastGistUrl: ''
		};
	},

	componentDidMount: function() {
		$.get(this.props.source, function(result){
			var lastGist = result[0];
			this.setState({
				username: lastGist.owner.login,
				lastGistUrl: lastGist.html_url
			});
		}.bind(this));
	},

	render: function() {
		return (
			<div>
				{this.state.username}&rsquo;s last gist is <a href={this.state.lastGistUrl}>here</a>. 
			</div>
		);
	}

});

var CurrentNoiseList = React.createClass({
	getInitialState: function() {
		return {
			data: ''
		};
	},

	componentDidMount: function() {

		var url = 'http://ws.audioscrobbler.com/2.0',
				data = {
					method: 'user.getweeklyartistchart',
					user: 'spaceyraygun',
					api_key: '5c0d3688c8baa9174fd725a920152143',
					format: 'json'
				},
				max_items = 10;

		$.ajax({
			url: url,
			data: data,
			dataType: 'json',
			type: 'get',
			context: this
		}).done(function(data){
			this.setState({
				data: data.weeklyartistchart.artist.slice(0, max_items)
			});
		});
	},

	render: function() {
		var items = [];
		$.map(this.state.data, function(artist, i){
			items.push(<CurrentNoiseListItem href={artist.url} text={artist.name} />)
		});

		return (
			<ul>{items}</ul>
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

React.renderComponent(
	<JK />,
	document.body
);