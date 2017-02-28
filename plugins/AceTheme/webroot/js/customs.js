$(document).ready(function(){
	$('.viewDetail').on('click',function(){
		var _controller = $(this).closest('table').attr('data-col');
		var param = $(this).attr('data-id');
		console.log()
		redirectURL(_controller,'view',param);
	});

	submitForm();
});
jQuery(function(){
    sideBarActive(activeMenu);
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
        $( ".content button[type=submit]" ).each(function(index) {
        	var btn = $( this );
            $(this).confirm({
                content: "Are you sure you want to "+btn.text()+" this?",
                title: "",
                buttons: {
                    yes: {
                        btnClass:'btn-danger',
                        keys: ['Y'],
                        action: function(){
                        	$('.content form').submit();
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
        if($activeMenu == 'Quizs') {
            $activeMenu = 'Examstemplates';
            activeSubMenu = 'Quizs_index';
            console.log(activeSubMenu);
        }
        $('#sidebar').find('li').removeClass('active open');
        $('#sidebar').find('.'+$activeMenu).addClass('active');
		if($('#sidebar').find('.active').find('ul').hasClass('submenu')){
			$('#sidebar').find('.'+$activeMenu).addClass('open');
			$('#sidebar').find('.active').find('ul').find('#'+activeSubMenu).addClass('active');
		}
}
