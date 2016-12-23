$(document).ready(function(e){
	$('button[type=submit]').on('click',function(e){
		return confirm('Do you want to submit this form?');
	});
	$('.corAnswer>label').on('click',function(e){
		$('.corAnswer>label').removeClass('active');
		$(this).addClass('active');
	});
/* Convert from serializeArray to object */
	$.fn.serializeObject = function()
	{
	    var o = {};
	    var a = this.serializeArray();
	    console.log(a);
	    $.each(a, function() {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	    return o;
	};
	$('td.viewDetail').on('click',function(e){
		var _controller = $(this).closest('table').attr('data-col');
		viewDetail(_controller,'view',$(this).attr('data-id'));
	});
});
function viewDetail($controller,$action,$id){
	window.location.href = '/'+$controller+'/'+$action+'/'+$id;
}

