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
    
});
jQuery(function(){
	$('#datepicker').datetimepicker({
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
    });
    $('input[name=mobile]').on('keypress',function(event){
    	if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
           event.preventDefault(); //stop character from entering input
       }
    });
    $("#provinceid").on('change',function(e){
			$.post("/users/load-address",{provinceid:$(this).val()},function(data){
					var opts = $.parseJSON(data);
					$('#districtid').html('');
					$('#wardid').html('');
	                $.each(opts.district, function(key, val) {
	                    $('#districtid').append($('<option>', { value : key })
							          .text(val));
	                });

				});
		});
		$("#districtid").on('change',function(e){
			$.post("/users/load-address",{districtid:$(this).val()},function(data){
					var opts = $.parseJSON(data);
					$('#wardid').html('');
	                $.each(opts.ward, function(key, val) {
	                    $('#wardid').append($('<option>', { value : key })
							          .text(val)); 
	                });

				});
		});
});
function redirectURL($controller,$action,$param){
	window.location = "/"+$controller+"/"+$action+"/"+$param; 
}
function submit(form){
	console.log(form);
	form.submit();
}