// function ajaxPaging(qlink,param,div_id)
// {
// 	jQuery(document).ready(function() {
// 		jQuery("#"+div_id).html("<img src='"+site_root+"/templates/default/images/site/coming_soon/loadingAnimation.gif'/>");
// 		jQuery.get(qlink,param,function(data){ jQuery("#"+div_id).html(data);});
// 	});
// }

function ajaxPaging(qlink,param,div_id)
{
	jQuery(document).ready(function() {
		jQuery("#"+div_id).html("<div style='width:560px;padding:12px; text-align:center'><image src='"+site_root+"/templates/default/images/loading.gif'></div>");
		jQuery.get(qlink,param,function(data){ jQuery("#"+div_id).html(data);});
	});
}

function ajaxPage(qlink,param,div_id)
{
	jQuery(document).ready(function() {
		jQuery("#"+div_id).html("<div style='width:560px;padding:12px; text-align:center'><image src='"+site_root+"/templates/default/images/loading.gif'></div>");
		jQuery.get(qlink,param,function(data){ jQuery("#"+div_id).html(data);});
	});
}