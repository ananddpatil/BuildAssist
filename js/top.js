﻿var headerOtherEntrance=function(options){this.SetOptions(options);this.triggerEle=[];this.listEle=[];this.hoverClass=this.options.hoverClass;this.timer=this.options.timer;this.Init()};headerOtherEntrance.prototype={SetOptions:function(options){this.options={triggerEle:[],listEle:[],hoverClass:[],timer:[null,null]};$.extend(this.options,options||{})},Init:function(){var _this=this;for(var i=0;i<this.options.triggerEle.length;i++){this.triggerEle.push($('#'+this.options.triggerEle[i]));this.listEle.push($('#'+this.options.listEle[i]));(function(){_this.Over(i);_this.Out(i)})()}},Over:function(index){var _this=this;this.triggerEle[index].mouseenter(function(){_this.timer[index]=setTimeout(function(){_this.triggerEle[index].addClass(_this.hoverClass[index]);_this.listEle[index].css({display:'block'})},300)})},Out:function(index){var _this=this;this.triggerEle[index].mouseleave(function(event){_this.Clear(index);if($(event.relatedTarget).attr('id')!=_this.options.listEle[index]){$(this).removeClass(_this.hoverClass[index]);_this.listEle[index].css({display:'none'})}});$(this.listEle[index]).mouseleave(function(event){_this.Clear(index);if($(event.relatedTarget).attr('id')!=_this.options.triggerEle[index]){_this.triggerEle[index].removeClass(_this.hoverClass[index]);$(this).css({display:'none'})}})},Clear:function(index){if(this.timer[index]){clearTimeout(this.timer[index])}}};
var searchSimulationSelect=function(options){this.SetOptions(options);this.catalogBox=$('#'+this.options.catalogBox);this.catalog=$('#'+this.options.catalog);this.catalogId=$('#'+this.options.catalogId);this.arrow=$('#'+this.options.arrow);this.catalogListBox=$('#'+this.options.catalogListBox);this.catalogListLi=$('#'+this.options.catalogListBox+' > ul > li').not('.sub-line');this.reverseCatalog=this.options.reverseCatalog;this.url=this.options.url;this.isIE6=$.browser.version;this.Init()};searchSimulationSelect.prototype={SetOptions:function(options){this.options={catalogBox:'catalogBox',catalog:'catalog',catalogId:'catalogId',arrow:'arrow',catalogListBox:'catalogListBox',url:null,reverseCatalog:[]};$.extend(this.options,options||{})},Init:function(){this.ControlArrow();this.OpenCatalogList()},ControlArrow:function(){var _this=this;this.catalogBox.mouseenter(function(){_this.arrow.addClass('drop-down-activation')}).mouseleave(function(){_this.arrow.removeClass('drop-down-activation')})},OpenCatalogList:function(){var _this=this;this.catalogBox.click(function(event){event.stopPropagation();if(_this.catalogListBox.css('display')=='none'){_this.catalogListBox.css({display:'block'});_this.GetCatalogContent()}else{_this.catalogListBox.css({display:'none'});_this.HighlightDefaultStatus()}})},AddOtherCatalog:function(){if(this.reverseCatalog.length==0)return;var __catalogContent='';for(var i=0;i<this.reverseCatalog.length;i++){__catalogContent+='<li catalogId="'+this.reverseCatalog[i][1]+'">'+this.reverseCatalog[i][0]+'</li>'}this.catalogList.prepend(__catalogContent)},GetCatalogContent:function(){if(this.GetCatalogContent.__index==1){return}var _this=this;$.ajax({url:_this.url,type:'GET',dataType:'jsonp',cache:false,success:function(data){_this.catalogListBox.append(data.cate);_this.catalogList=$('#'+_this.options.catalogList);_this.AddOtherCatalog();_this.catalogListLi=$('#'+_this.options.catalogListBox+' > ul > li').not('.sub-line');$(_this.catalogListLi[0]).addClass('hover');_this.SelectCatalog();_this.ClickCatalogText();_this.Close()}});this.GetCatalogContent.__index=1},SelectCatalog:function(){var _this=this;for(var i=0;i<this.catalogListLi.length;i++){(function(){var index=i;$(_this.catalogListLi[index]).mouseenter(function(){$(this).addClass('hover');for(var j=0;j<i;j++){if(j!=index){$(_this.catalogListLi[j]).removeClass('hover')}}})})()}},ClickCatalogText:function(){if(this.isIE6=='6.0'){this.IE6AddIframe()}var _this=this;for(var i=0;i<this.catalogListLi.length;i++){$(this.catalogListLi[i]).click(function(){_this.catalog.val($(this).text());_this.catalogId.val($(this).attr('catalogId'))})}},IE6AddIframe:function(){if(!!this.catalogListBox.children("iframe")[0])return;var oHeight,oWidth,oIframe;oHeight=this.catalogList.height()+2;oWidth=this.catalogList.width()+2;this.catalogListBox.append("<iframe></iframe>");oIframe=this.catalogListBox.children("iframe");oIframe.css({position:"absolute",top:0,left:0,opacity:0,"z-index":-1,height:oHeight,width:oWidth,border:0})},HighlightDefaultStatus:function(){$(this.catalogListLi[0]).addClass('hover');for(var i=1;i<this.catalogListLi.length;i++){$(this.catalogListLi[i]).removeClass('hover')}},Close:function(){var _this=this;$(document).click(function(){if(_this.catalogListBox.css('display')=='block'){_this.catalogListBox.css({display:'none'});_this.HighlightDefaultStatus()}})}};