jQuery(function(){
	var url = "/province/provinces/load-address";
	    $("#provinceid").on('change click',function(e){
	    	if($(this).val() == '') return;
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
			if($(this).val() == '') return;
			$.post(url,{districtid:$(this).val()},function(data){
					var opts = $.parseJSON(data);
					$('#wardid').html('');
	                $.each(opts.ward, function(key, val) {
	                    $('#wardid').append($('<option>', { value : val.wardid })
							          .text(val.type+" "+val.name)); 
	                });

				});
		});

		$.fn.provinceAutoFill = function(obj){
			if(obj == '') return;
			$(this).val(obj.provinceid);
			$.post(url,{provinceid:obj.provinceid,districtid:obj.districtid},function(data){
						var opts = $.parseJSON(data);
						$('#districtid').html('');
						$('#wardid').html('');
		                $.each(opts.district, function(key, val) {
		                	var dSelected = (obj.districtid == val.districtid)?true:false;
		                    $('#districtid').append($('<option>', { value : val.districtid, selected : dSelected })
								          .text(val.type+" "+val.name));
		                });
		                $.each(opts.ward, function(key, val) {
		                	var wSelected = (obj.wardid == val.wardid)?true:false;
		                    $('#wardid').append($('<option>', { value : val.districtid, selected : wSelected })
								          .text(val.type+" "+val.name));
		                });

					});
		}
});