/** @jsx React.DOM */

var JK = React.createClass({
	render: function(){
		return (
			<div>
				<Header />
				<Content />
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
						<BioBlock title="Work"><Work /></BioBlock>
						<BioBlock title="Code"><Code /></BioBlock>
						<BioBlock title="Mind"><Mind /></BioBlock>
						<BioBlock title="Play"><Play /></BioBlock>
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
                    {this.props.children}
                </blockquote>                    
            </article>
		);
	}
});

var Work = React.createClass({
	render: function(){
		return (
            <p>I used to make things for a defense contractor &amp; now I make things for academia.</p>
        );
	}
});

var Code = React.createClass({
	render: function(){
		return(
			<p>I do web stuff with languages, frameworks, &amp; content management systems.</p>
		);
	}
});

var Mind = React.createClass({
	render: function(){
		return (
			<p>I undergrad-ed at an art school, then I grad-ed at a technology school, &amp; now I'm self-educating.</p>
		);
	}
});

var Play = React.createClass({
	render: function(){
		return (
			<p>I live in Philadelphia. I ride my bicycle, I make noise, &amp; I watch MacGyver.</p>
		);
	}
});

/*React.renderComponent(
	<JK />,
	document.body
);*/

$(function(){
    $('body').append(
        React.renderComponentToStaticMarkup(<JK />)
    );
});