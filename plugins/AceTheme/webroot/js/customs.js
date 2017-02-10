$(document).ready(function(){
	$('.viewDetail').on('click',function(){
		var _controller = $(this).closest('table').attr('data-col');
		var param = $(this).attr('data-id');
		console.log()
		redirectURL(_controller,'view',param);
	});

	submitForm();
	/*$('button[type=submit]').click(function() {
          // return confirm('You sure you want to save this?');
          $(this).confirm({
                content: "You sure you want to save this?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action : function() {
                        	return true;
                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
    });*/
    


});
jQuery(function(){
    sideBarActive(activeMenu);
    console.log(activeMenu);
	/*$('#datepicker').datetimepicker({
    	timepicker:false,
  		format:'Y-m-d'
    });
    //datetimepicker
    $('#datetimepicker').datetimepicker({
    	defaultDate:new Date(),
  		format:'Y-m-d H:i',
  		allowTimes :[
		  '9:00', '9:30', '10:00', '10:30',
		  '11:00', '11:30', '12:00', '12:30',
		  '13:00', '13:30', '14:00', '14:30',
		  '15:00', '15:30', '16:00', '16:30',
		  '15:00', '15:30', '18:00', '18:30'
		 ]
    });*/
    $('input[name=mobile]').on('keypress',function(event){
    	if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }
    });
});
function redirectURL($controller,$action,$param){
	window.location = "/"+$controller+"/"+$action+"/"+$param; 
}

function submitForm(){
        $( "button[type=submit]" ).each(function(index) {
        	var btn = $( this );
            $(this).confirm({
                content: "Are you sure you want to "+btn.text()+" this?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action: function(){
                        	$('form').submit();
                            console.log($(this));
                        }
                    },
                    no: {
                        keys: ['N'],
                    },
                }
            });
        });
    }

function generationPassword(){
	$.post("/users/generate-random-string/8",null,function(res){
		$('input[name=password]').val(res);
		$('input[name=confirm_password]').val(res);
		$('.pass').html(res);
	});
}
function sideBarActive($activeMenu){
		$('#sidebar').find('li').removeClass('active open');
		$('#sidebar').find('#'+$activeMenu).addClass('active');
		if($('#sidebar').find('.active').find('ul').hasClass('submenu')){
			$('#sidebar').find('#'+$activeMenu).addClass('open');
			$('#sidebar').find('.active').find('ul').find('#'+activeSubMenu).addClass('active');
		}
}
