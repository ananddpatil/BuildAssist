﻿var commonDirectory=function(options){this.SetOptions(options);this.directoryBox=$('#'+this.options.directoryBox);this.directorys=$('#'+this.options.directoryBox+' > li');this.directorySubsBox=$('#'+this.options.directorySubsBox);this.fixedValue=this.options.fixedValue;this.sUrl=this.options.sUrl;this.timer=null;this.Init()};commonDirectory.prototype={SetOptions:function(options){this.options={directoryBox:'directoryBox',directorySubsBox:'directorySubsBox',fixedValue:29,sUrl:null};$.extend(this.options,options||{})},Init:function(){var _this=this;this.directoryBox.mouseleave(function(){if(_this.timer){clearTimeout(_this.timer)}});this.Load()},Load:function(){var _this=this;$.ajax({type:'GET',url:this.sUrl,dataType:'html',cache:false,success:function(html){_this.directorySubsBox.append(html);_this.directorySubs=$('#'+_this.options.directorySubsBox+' > ul');_this.Start()}})},First:function(){},Start:function(){var _this=this;for(var i=0;i<this.directorys.length;i++){$(_this.directorys[i]).mouseover(function(event){_this.Over($(this).attr('index'))})}},Over:function(index){if(this.timer){clearTimeout(this.timer)}var _this=this;this.timer=setTimeout(function(){$(_this.directorys[index]).addClass('hover');_this.directorySubsBox.css({display:'block'});$(_this.directorySubs[index]).css({display:'block'});if(_this.Over.__index&&_this.Over.__index!=index){$(_this.directorys[_this.Over.__index]).removeClass('hover');$(_this.directorySubs[_this.Over.__index]).css({display:'none'})}_this.GetValue(index);_this.SetPosition();_this.Out(index);_this.Over.__index=index},100)},Out:function(index){var _this=this;$(this.directorys[index]).mouseleave(function(event){if($(event.relatedTarget).parents('div').attr('id')!=_this.options.directorySubsBox){_this.Close(index)}});this.directorySubsBox.mouseleave(function(event){if($(event.relatedTarget).parents('ul').attr('id')!=_this.options.directoryBox){_this.Close(index)}});this.directoryBox.mouseleave(function(event){if($(event.relatedTarget).parents('div').attr('id')!=_this.options.directorySubsBox){_this.Close(index)}})},Close:function(index){if($(this.directorys[index]).hasClass('hover')){$(this.directorys[index]).removeClass('hover');this.directorySubsBox.css({display:'none'});$(this.directorySubs[index]).css({display:'none'})}},GetValue:function(index){this.windowHeight=$(window).height();this.scrollHeight=$(document).scrollTop();this.directoryBoxOffsetTop=this.directoryBox.offset().top;this.currentDirectorysOffsetTop=$(this.directorys[index]).offset().top;this.directorySubsBoxHeight=this.directorySubsBox.outerHeight(true)},SetPosition:function(){var y_final,FromTheTop,FromTheBottom;FromTheTop=this.currentDirectorysOffsetTop-this.scrollHeight;FromTheBottom=this.windowHeight-FromTheTop;if(this.windowHeight>=this.directorySubsBoxHeight){if(FromTheTop>=this.fixedValue&&FromTheBottom>=this.directorySubsBoxHeight){y_final=this.currentDirectorysOffsetTop-this.directoryBoxOffsetTop-this.fixedValue}if(FromTheTop<this.fixedValue&&FromTheBottom>=this.directorySubsBoxHeight){if(this.currentDirectorysOffsetTop>=this.scrollHeight){y_final=this.currentDirectorysOffsetTop-this.directoryBoxOffsetTop-FromTheTop}else{y_final=this.currentDirectorysOffsetTop-this.directoryBoxOffsetTop}}if(FromTheBottom<this.directorySubsBoxHeight){y_final=this.currentDirectorysOffsetTop-this.directoryBoxOffsetTop-(this.directorySubsBoxHeight-FromTheBottom)}}else{y_final=this.currentDirectorysOffsetTop-this.directoryBoxOffsetTop-FromTheTop}this.directorySubsBox.css({top:y_final})}};