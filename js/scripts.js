(function(){
    
    var jk = window.jk = {
        
        max_chars : 131,
        
        init: function(){
            this.char_counter();
            this.weekly_noise();
        },
        
        char_counter: function(){
            var $msg = $('textarea#message'),
                $counter = $('<span />', {
                    'id': 'char_count',
                    'class': 'badge',
                    'html': jk.max_chars,
                    'css': {
                        'padding-left': '.5em'
                    }
                });
                
                $counter.appendTo('button#tweet');
                    
                $msg
                    .keyup(function(e){
                        var cur_chars = this.value.length,
                            remain_chars = jk.max_chars - cur_chars,
                            $char_count = $('#char_count'),
                            $tweet_btn = $('button#tweet'),
                            $email_btn = $('button#email'),
                            btn_classes = 'btn-success btn-warning btn-danger';
                            
                            $char_count.html(remain_chars);
                            
                            if(remain_chars > 30) {
                                
                                btns('btn-success');
                                
                            } else if(remain_chars <= 30 && remain_chars > 10) {
                                
                                btns('btn-warning');
                            
                            } else if(remain_chars <= 10 && remain_chars >= 0) {
                                
                                btns('btn-danger');
                                
                            } else {
                                                                                     
                                $tweet_btn.removeClass(btn_classes);
                                $email_btn.addClass('btn-success');
                                $char_count.html('');
                                
                            }
                            
                            function btns(_class) {
                                
                                $tweet_btn.removeClass(btn_classes).addClass(_class);
                                $email_btn.removeClass(btn_classes);
                                
                            }
                        
                    });
            
        },

        weekly_noise: function() {
            var url = 'http://ws.audioscrobbler.com/2.0/user/spaceyraygun/topartists.xml',
                data = {'period':'7day'};

            $.ajax({
                url: url,
                data: data,
                dataType: 'xml',
                type: 'get'
            }).done(function(data){
                var $ol = $('<ol />');

                $(data).find('artist').each(function(i, el){
                    var $li = $('<li />');          

                    $('<a />', {
                        'href': $(el).find('url').text(),
                        'html': $(el).find('name').text()
                    }).appendTo($li);

                    $li.appendTo($ol);
                });


                $('.current-noise').html($ol);
            });
        }    
        
    }   
    
})();



$(function(){
    
   jk.init();  
   
});