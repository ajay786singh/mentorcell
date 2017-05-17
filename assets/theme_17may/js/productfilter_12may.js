$("input[type='checkbox'], input[type='radio']").on( "click", showValues );
    $("select").on( "change", showValues );
	

		function showValues() {
			var examarray = new Array();		
		$('input[name="examcheck"]:checked').each(function(){			
			examarray.push($(this).val());	
		});
		var exam_checklist = "&excheck="+examarray;
		
		var locarray = new Array();		
		$('input[name="locationcheck"]:checked').each(function(){	
			locarray.push($(this).val());	
		});
		var location_checklist = "&loccheck="+locarray;
		
		var feearray = new Array();		
		$('input[name="feecheck"]:checked').each(function(){	
			feearray.push($(this).val());	
		});
		var fee_checklist = "&feecheck="+feearray;
		
		var specialarray = new Array();		
		$('input[name="specialcheck"]:checked').each(function(){	
			specialarray.push($(this).val());	
		});
		var spec_checklist = "&speccheck="+specialarray;
		
		var recognarray = new Array();		
		$('input[name="recogncheck"]:checked').each(function(){	
			recognarray.push($(this).val());	
		});
		var recog_checklist = "&recogcheck="+recognarray;
			
		var main_string = exam_checklist+location_checklist+fee_checklist+spec_checklist+recog_checklist;
		main_string = main_string.substring(1, main_string.length)
         $.ajax({
			type: "POST",
			url: "getproducts.php",
			url: base_url+"getproducts.php",
			data: main_string, 
			cache: false,
			beforeSend: function() {
				$("#results").html('');
              $('.loader').html('<img src="'+base_url+'assets/theme/images/bx_loader.gif" alt="" width="200" style="margin: 10% 0% 0% 30%;" >');
                                    },
			success: function(html){
				$("#results").html(html);
                $('.loader').html('');
             }
			});
		}
		

	

	
	