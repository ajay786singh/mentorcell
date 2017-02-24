function getAdminPaging(id,url,offset,page){
	jQuery("#waiting").show();
	jQuery('body,html').animate({
		scrollTop: 0
	}, 800);
	jQuery.post(url,{'page':page,'offset':offset}, function(data){
		jQuery("#waiting").hide();
		document.getElementById(id).innerHTML=data;
	});
}