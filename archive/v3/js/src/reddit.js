/** @jsx React.DOM */

var Reddit = React.createClass({
  interval: null,
  ticker: 30,

  getInitialState: function() {
    return {
      data: ''
    }
  },

  componentDidMount: function() {
    this._getData();

    this.interval = setInterval(this._getData, 1000*5);
  },

  componentWillUnmount: function() {
    clearInterval(this.interval);
  },

  _getData: function() {
    
    $.ajax('http://www.reddit.com/new.json', {
      context: this
    }).done(function(data) {
      this.setState({
        data: data.data.children
      });
    });
  },

  render: function() {

    var items = [];

    $.map(this.state.data, function(item, i){
      items.push(<RedditListItem url={item.data.url} text={item.data.title} key={i} />);
    });

    return (
      <section>
        <RedditList>
          {items}
        </RedditList>
      </section>
    );
  }
});

var RedditList = React.createClass({

  render: function() {

    return (
      <ul>
        {this.props.children}
      </ul>
    );

  }

});

var RedditListItem = React.createClass({

  render: function() {

    return (
      <li>
        <a href={this.props.url}>{this.props.text}</a>
      </li>
    );

  }

});

React.renderComponent(
  <Reddit />,
  document.body
);