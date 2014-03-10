var 



HOMEURL = SITEROOT+'/js/',//'http://192.168.1.3/Pallavi/ibltemplate/js/',



DHVERSION = '.js',



ScriptList = {

	

	lib: HOMEURL + 'lib.js',

	init: HOMEURL + 'init' + DHVERSION,

	top: HOMEURL + 'top' + DHVERSION,

	left: HOMEURL + 'left' + DHVERSION

},

HtmlList = {

	scate: SITEROOT+'/scate.html'

}



head.js({ lib: ScriptList['lib'] }).ready('lib', function(){

	$(document).ready(function(){

		head.js({ init: ScriptList['init'] }, function(){

			var DH_Auto_Transform = new AutoTransform();

			naviinfo_showfirst();

				

		});



		$('#header').one('mouseover', function(){

			head.js(ScriptList['top'], function(){

				var DH_Header_Other_Entrance = new headerOtherEntrance({ triggerEle: [ 'community', 'help' ], listEle: [ 'communityLists', 'helpLists' ], hoverClass: [ 'community-hover', 'help-hover' ] });

				//var DH_Search_Category = new searchSimulationSelect({ url: '' });

			});

		});



		$('body').one('mouseover', function(){

			head.js(ScriptList['left'], function(){

				var DH_Common_Directory = new commonDirectory({ fixedValue: 0, sUrl: HtmlList['scate'] });

			});

		});



		 (function() {

            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;

            po.src = 'https://apis.google.com/js/plusone.js';

            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

       })();



		(function(){

			var a=navigator.userAgent;var BODY=$("body");var tipmsg="";var exp=/android|netscape|iphone|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i;if(exp.test(a)){BODY.before(tipmsg)}

		})();

	});

});