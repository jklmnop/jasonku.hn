/* Author: Jason Kühn

*/

(function(){if(typeof console==='object'){console.log(['o hai, webbie friend! :D','if(isset($_GET[\'!\']))']);}})();

$(function(){
	var $t = $('#twitter'),
		$e = $('#email');
	
	$t.find('.toggle').live('click',function(){
		$t.hide();
		$e.show();
		
		return false;
	});
	
	//$t.hide();
	$e.hide();
	
	$e.find('.toggle').live('click',function(){
		$e.hide();
		$t.show();
		
		return false;
	});
	
	$t.find('textarea')
		.html('')
		.removeAttr('maxlength')
		.keyup(function(e){
			var maxchars = 130,
				len = this.value.length,
				left = maxchars - len,
				remaining = left + ' characters remaining.',
				warning = left + ' characters remaining. getting close!',
				toomany = 'try shortening it by ' + Math.abs(left) + ' characters.',
				tryemail = 'maybe try <a href="#email" class="toggle try-email">e-mailing</a> me instead?',
				justenuff = 'phew! just enough.'
				msg = '';
				 
				if(left >= 10)
					msg = remaining;
				else if(left < 10 && left > 0)
					msg = warning;
				else if(left === 0)
					msg = justenuff;
				else if(left <= -1 && left > -10)
					msg = toomany;
				else
					msg = tryemail;
				
			$t.find('.hint').html(msg);
			
			return false;
		});
		
	$t.submit(function(){
		var $el = $t.find('textarea'),
			$hint = $t.find('.hint');
			
		if($el.val().length > 130) {
			$hint.html('you must be no more than 130 characters to ride.');
			return false;
		}
		
		if($el.val().length === 0) {
			$hint.html('surely you must have more to say!');
			return false;
		}
	})
	
	$e.submit(function(){
		var $el = $e.find('textarea'),
			$hint = $e.find('.hint');
		
		if($el.val().length === 0) {
			$hint.html('surely you must have more to say!');
			return false;
		}		   
	});
	
	$('.close').live('click', function(){
		$('#thanks').remove();
		return false;
	});
	
	$('.try-email').live('click', function(){
		var msg = $('#status').val();
		$('#message').val(msg);
	});
	

	if(window.location.hash === '#thanks') {
		$msg = '<p id="thanks" class="grid_6 prefix_5 suffix_5 thanks">Bye! Thanks for stopping by! <a href="#" class="close">close</a></p>'
		$('#wrapper').prepend($msg);	
	}
});























