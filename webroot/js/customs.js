$(document).ready(function(){
	$('.viewDetail').on('click',function(){
		var _controller = $(this).closest('table').attr('data-col');
		var param = $(this).attr('data-id');
		console.log()
		redirectURL(_controller,'view',param);
	});
});
function redirectURL($controller,$action,$param){
	window.location = "/"+$controller+"/"+$action+"/"+$param; 
}