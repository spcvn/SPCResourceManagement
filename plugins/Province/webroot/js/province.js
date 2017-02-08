jQuery(function(){
	var url = "/province/provinces/load-address";
    $("#provinceid").on('change click',function(e){
			$.post(url,{provinceid:$(this).val()},function(data){
					var opts = $.parseJSON(data);
					$('#districtid').html('');
					$('#wardid').html('');
	                $.each(opts.district, function(key, val) {
	                    $('#districtid').append($('<option>', { value : val.districtid })
							          .text(val.type+" "+val.name));
	                });

				});
		});
		$("#districtid").on('change click',function(e){
			$.post(url,{districtid:$(this).val()},function(data){
					var opts = $.parseJSON(data);
					$('#wardid').html('');
	                $.each(opts.ward, function(key, val) {
	                    $('#wardid').append($('<option>', { value : val.wardid })
							          .text(val.type+" "+val.name)); 
	                });

				});
		});
});