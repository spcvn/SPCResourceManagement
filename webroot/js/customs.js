$(document).ready(function(){
	$('.viewDetail').on('click',function(){
		var _controller = $(this).closest('table').attr('data-col');
		var param = $(this).attr('data-id');
		console.log()
		redirectURL(_controller,'view',param);
	});
	$('button[type=submit]').click(function() {
          return confirm('You sure you want to save this?');
    });
    $('.datepicker-input').datepicker();
});
function redirectURL($controller,$action,$param){
	window.location = "/"+$controller+"/"+$action+"/"+$param; 
}
function submit(form){
	console.log(form);
	form.submit();
}