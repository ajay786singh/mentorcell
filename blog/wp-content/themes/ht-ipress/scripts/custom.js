/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/
!function(t){"use strict";t.fn.fitVids=function(e){var i={customSelector:null,ignore:null};if(!document.getElementById("fit-vids-style")){var r=document.head||document.getElementsByTagName("head")[0],a=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}",d=document.createElement("div");d.innerHTML='<p>x</p><style id="fit-vids-style">'+a+"</style>",r.appendChild(d.childNodes[1])}return e&&t.extend(i,e),this.each(function(){var e=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&e.push(i.customSelector);var r=".fitvidsignore";i.ignore&&(r=r+", "+i.ignore);var a=t(this).find(e.join(","));a=a.not("object object"),a=a.not(r),a.each(function(){var e=t(this);if(!(e.parents(r).length>0||"embed"===this.tagName.toLowerCase()&&e.parent("object").length||e.parent(".fluid-width-video-wrapper").length)){e.css("height")||e.css("width")||!isNaN(e.attr("height"))&&!isNaN(e.attr("width"))||(e.attr("height",9),e.attr("width",16));var i="object"===this.tagName.toLowerCase()||e.attr("height")&&!isNaN(parseInt(e.attr("height"),10))?parseInt(e.attr("height"),10):e.height(),a=isNaN(parseInt(e.attr("width"),10))?e.width():parseInt(e.attr("width"),10),d=i/a;if(!e.attr("id")){var o="fitvid"+Math.floor(999999*Math.random());e.attr("id",o)}e.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*d+"%"),e.removeAttr("height").removeAttr("width")}})})}}(window.jQuery||window.Zepto);

/* jQuery News Ticker is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, version 2 of the License */
(function(e){e.fn.ticker=function(t){var n=e.extend({},e.fn.ticker.defaults,t);if(e(this).length==0){if(window.console&&window.console.log){}else{}return false}var r="#"+e(this).attr("id");var i=e(this).get(0).tagName;return this.each(function(){function o(e){var t=0,n;for(n in e){if(e.hasOwnProperty(n))t++}return t}function u(){var e=new Date;return e.getTime()}function a(e){if(n.debugMode){if(window.console&&window.console.log){window.console.log(e)}else{alert(e)}}}function f(){l();e(r).wrap('<div id="'+s.dom.wrapperID.replace("#","")+'"></div>');e(s.dom.wrapperID).children().remove();e(s.dom.wrapperID).append('<div id="'+s.dom.tickerID.replace("#","")+'" class="ticker"><div id="'+s.dom.titleID.replace("#","")+'" class="ticker-title"><span><!-- --></span></div><p id="'+s.dom.contentID.replace("#","")+'" class="ticker-content"></p><div id="'+s.dom.revealID.replace("#","")+'" class="ticker-swipe"><span><!-- --></span></div></div>');e(s.dom.wrapperID).removeClass("no-js").addClass("ticker-wrapper has-js "+n.direction);e(s.dom.tickerElem+","+s.dom.contentID).hide();if(n.controls){e(s.dom.controlsID).on("click mouseover mousedown mouseout mouseup",function(t){var n=t.target.id;if(t.type=="click"){switch(n){case s.dom.prevID.replace("#",""):s.paused=true;e(s.dom.playPauseID).addClass("paused");m("prev");break;case s.dom.nextID.replace("#",""):s.paused=true;e(s.dom.playPauseID).addClass("paused");m("next");break;case s.dom.playPauseID.replace("#",""):if(s.play==true){s.paused=true;e(s.dom.playPauseID).addClass("paused");d()}else{s.paused=false;e(s.dom.playPauseID).removeClass("paused");v()}break}}else if(t.type=="mouseover"&&e("#"+n).hasClass("controls")){e("#"+n).addClass("over")}else if(t.type=="mousedown"&&e("#"+n).hasClass("controls")){e("#"+n).addClass("down")}else if(t.type=="mouseup"&&e("#"+n).hasClass("controls")){e("#"+n).removeClass("down")}else if(t.type=="mouseout"&&e("#"+n).hasClass("controls")){e("#"+n).removeClass("over")}});e(s.dom.wrapperID).append('<ul id="'+s.dom.controlsID.replace("#","")+'" class="ticker-controls"><li id="'+s.dom.playPauseID.replace("#","")+'" class="jnt-play-pause controls"><a href=""><!-- --></a></li><li id="'+s.dom.prevID.replace("#","")+'" class="jnt-prev controls"><a href=""><!-- --></a></li><li id="'+s.dom.nextID.replace("#","")+'" class="jnt-next controls"><a href=""><!-- --></a></li></ul>')}if(n.displayType!="fade"){e(s.dom.contentID).mouseover(function(){if(s.paused==false){d()}}).mouseout(function(){if(s.paused==false){v()}})}if(!n.ajaxFeed){c()}}function l(){if(s.contentLoaded==false){if(n.ajaxFeed){if(n.feedType=="xml"){e.ajax({url:n.feedUrl,cache:false,dataType:n.feedType,async:true,success:function(e){count=0;for(var t=0;t<e.childNodes.length;t++){if(e.childNodes[t].nodeName=="rss"){xmlContent=e.childNodes[t]}}for(var r=0;r<xmlContent.childNodes.length;r++){if(xmlContent.childNodes[r].nodeName=="channel"){xmlChannel=xmlContent.childNodes[r]}}for(var i=0;i<xmlChannel.childNodes.length;i++){if(xmlChannel.childNodes[i].nodeName=="item"){xmlItems=xmlChannel.childNodes[i];var u,f=false;for(var l=0;l<xmlItems.childNodes.length;l++){if(xmlItems.childNodes[l].nodeName=="title"){u=xmlItems.childNodes[l].lastChild.nodeValue}else if(xmlItems.childNodes[l].nodeName=="link"){f=xmlItems.childNodes[l].lastChild.nodeValue}if(u!==false&&u!=""&&f!==false){s.newsArr["item-"+count]={type:n.titleText,content:'<a href="'+f+'">'+u+"</a>"};count++;u=false;f=false}}}}if(o(s.newsArr<1)){a("Couldn't find any content from the XML feed for the ticker to use!");return false}s.contentLoaded=true;c()}})}else{a("Code Me!")}}else if(n.htmlFeed){if(e(r+" LI").length>0){e(r+" LI").each(function(t){s.newsArr["item-"+t]={type:n.titleText,content:e(this).html()}})}else{a("Couldn't find HTML any content for the ticker to use!");return false}}else{a("The ticker is set to not use any types of content! Check the settings for the ticker.");return false}}}function c(){s.contentLoaded=true;e(s.dom.titleElem).html(s.newsArr["item-"+s.position].type);e(s.dom.contentID).html(s.newsArr["item-"+s.position].content);if(s.position==o(s.newsArr)-1){s.position=0}else{s.position++}distance=e(s.dom.contentID).width();time=distance/n.speed;h()}function h(){e(s.dom.contentID).css("opacity","1");if(s.play){var t=e(s.dom.titleID).width()+20;e(s.dom.revealID).css(n.direction,t+"px");if(n.displayType=="fade"){e(s.dom.revealID).hide(0,function(){e(s.dom.contentID).css(n.direction,t+"px").fadeIn(n.fadeInSpeed,p)})}else if(n.displayType=="scroll"){}else{e(s.dom.revealElem).show(0,function(){e(s.dom.contentID).css(n.direction,t+"px").show();animationAction=n.direction=="right"?{marginRight:distance+"px"}:{marginLeft:distance+"px"};e(s.dom.revealID).css("margin-"+n.direction,"0px").delay(20).animate(animationAction,time,"linear",p)})}}else{return false}}function p(){if(s.play){e(s.dom.contentID).delay(n.pauseOnItems).fadeOut(n.fadeOutSpeed);if(n.displayType=="fade"){e(s.dom.contentID).fadeOut(n.fadeOutSpeed,function(){e(s.dom.wrapperID).find(s.dom.revealElem+","+s.dom.contentID).hide().end().find(s.dom.tickerID+","+s.dom.revealID).show().end().find(s.dom.tickerID+","+s.dom.revealID).removeAttr("style");c()})}else{e(s.dom.revealID).hide(0,function(){e(s.dom.contentID).fadeOut(n.fadeOutSpeed,function(){e(s.dom.wrapperID).find(s.dom.revealElem+","+s.dom.contentID).hide().end().find(s.dom.tickerID+","+s.dom.revealID).show().end().find(s.dom.tickerID+","+s.dom.revealID).removeAttr("style");c()})})}}else{e(s.dom.revealElem).hide()}}function d(){s.play=false;e(s.dom.tickerID+","+s.dom.revealID+","+s.dom.titleID+","+s.dom.titleElem+","+s.dom.revealElem+","+s.dom.contentID).stop(true,true);e(s.dom.revealID+","+s.dom.revealElem).hide();e(s.dom.wrapperID).find(s.dom.titleID+","+s.dom.titleElem).show().end().find(s.dom.contentID).show()}function v(){s.play=true;s.paused=false;p()}function m(t){d();switch(t){case"prev":if(s.position==0){s.position=o(s.newsArr)-2}else if(s.position==1){s.position=o(s.newsArr)-1}else{s.position=s.position-2}e(s.dom.titleElem).html(s.newsArr["item-"+s.position].type);e(s.dom.contentID).html(s.newsArr["item-"+s.position].content);break;case"next":e(s.dom.titleElem).html(s.newsArr["item-"+s.position].type);e(s.dom.contentID).html(s.newsArr["item-"+s.position].content);break}if(s.position==o(s.newsArr)-1){s.position=0}else{s.position++}}var t=u();var s={position:0,time:0,distance:0,newsArr:{},play:true,paused:false,contentLoaded:false,dom:{contentID:"#ticker-content-"+t,titleID:"#ticker-title-"+t,titleElem:"#ticker-title-"+t+" SPAN",tickerID:"#ticker-"+t,wrapperID:"#ticker-wrapper-"+t,revealID:"#ticker-swipe-"+t,revealElem:"#ticker-swipe-"+t+" SPAN",controlsID:"#ticker-controls-"+t,prevID:"#prev-"+t,nextID:"#next-"+t,playPauseID:"#play-pause-"+t}};if(i!="UL"&&i!="OL"&&n.htmlFeed===true){a("Cannot use <"+i.toLowerCase()+"> type of element for this plugin - must of type <ul> or <ol>");return false}n.direction=="rtl"?n.direction="right":n.direction="left";f();})};e.fn.ticker.defaults={speed:.1,ajaxFeed:false,feedUrl:"",feedType:"xml",displayType:"reveal",htmlFeed:true,debugMode:true,controls:true,titleText:"Latest",direction:"ltr",pauseOnItems:3e3,fadeInSpeed:600,fadeOutSpeed:300}})(jQuery);

/**
 * iPress Scripts
 */
jQuery.easing['jswing']=jQuery.easing['swing'];jQuery.extend(jQuery.easing,{def:'easeOutQuad',swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d)},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+b},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return-c/2*((--t)*(t-2)-1)+b},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+b;return c/2*((t-=2)*t*t+2)+b},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t-1)+b},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+b;return-c/2*((t-=2)*t*t*t-2)+b},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+b;return c/2*((t-=2)*t*t*t*t+2)+b},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+c+b},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+b},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)-1)+b},easeInExpo:function(x,t,b,c,d){return(t==0)?b:c*Math.pow(2,10*(t/d-1))+b},easeOutExpo:function(x,t,b,c,d){return(t==d)?b+c:c*(-Math.pow(2,-10*t/d)+1)+b},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t-1))+b;return c/2*(-Math.pow(2,-10*--t)+2)+b},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)-1)+b},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return-c/2*(Math.sqrt(1-t*t)-1)+b;return c/2*(Math.sqrt(1-(t-=2)*t)+1)+b},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b},easeOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b},easeInOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b},easeInBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b},easeOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},easeInOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b},easeInBounce:function(x,t,b,c,d){return c-jQuery.easing.easeOutBounce(x,d-t,0,c,d)+b},easeOutBounce:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b}},easeInOutBounce:function(x,t,b,c,d){if(t<d/2)return jQuery.easing.easeInBounce(x,t*2,0,c,d)*.5+b;return jQuery.easing.easeOutBounce(x,t*2-d,0,c,d)*.5+c*.5+b}});
(function(e){e.fn.superfish=function(t){var n=e.fn.superfish,r=n.c,i=e(['<span class="',r.arrowClass,'"> <i class="fa fa-chevron-down"></i> </span>'].join("")),s=function(){var t=e(this),n=u(t);clearTimeout(n.sfTimer);t.showSuperfishUl().siblings().hideSuperfishUl()},o=function(){var t=e(this),r=u(t),i=n.op;clearTimeout(r.sfTimer);r.sfTimer=setTimeout(function(){i.retainPath=e.inArray(t[0],i.$path)>-1;t.hideSuperfishUl();if(i.$path.length&&t.parents(["li.",i.hoverClass].join("")).length<1){s.call(i.$path)}},i.delay)},u=function(e){var t=e.parents(["ul.",r.menuClass,":first"].join(""))[0];n.op=n.o[t.serial];return t},a=function(e){e.addClass(r.anchorClass).append(i.clone())};return this.each(function(){var i=this.serial=n.o.length;var u=e.extend({},n.defaults,t);u.$path=e("li."+u.pathClass,this).slice(0,u.pathLevels).each(function(){e(this).addClass([u.hoverClass,r.bcClass].join(" ")).filter("li:has(ul)").removeClass(u.pathClass)});n.o[i]=n.op=u;e("li:has(ul)",this)[e.fn.hoverIntent&&!u.disableHI?"hoverIntent":"hover"](s,o).each(function(){if(u.autoArrows)a(e(">a:first-child",this))}).not("."+r.bcClass).hideSuperfishUl();var f=e("a",this);f.each(function(e){var t=f.eq(e).parents("li");f.eq(e).focus(function(){s.call(t)}).blur(function(){o.call(t)})});u.onInit.call(this)}).each(function(){var t=[r.menuClass];if(n.op.dropShadows&&!(e.browser.msie&&e.browser.version<7))t.push(r.shadowClass);e(this).addClass(t.join(" "))})};var t=e.fn.superfish;t.o=[];t.op={};t.IE7fix=function(){var n=t.op;if(e.browser.msie&&e.browser.version>6&&n.dropShadows&&n.animation.opacity!=undefined)this.toggleClass(t.c.shadowClass+"-off")};t.c={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",arrowClass:"sf-sub-indicator",shadowClass:"sf-shadow"};t.defaults={hoverClass:"sfHover",pathClass:"overideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},speed:"normal",autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};e.fn.extend({hideSuperfishUl:function(){var n=t.op,r=n.retainPath===true?n.$path:"";n.retainPath=false;var i=e(["li.",n.hoverClass].join(""),this).add(this).not(r).removeClass(n.hoverClass).find(">ul").hide().css("visibility","hidden");n.onHide.call(i);return this},showSuperfishUl:function(){var e=t.op,n=t.c.shadowClass+"-off",r=this.addClass(e.hoverClass).find(">ul:hidden").css("visibility","visible");t.IE7fix.call(r);e.onBeforeShow.call(r);r.animate(e.animation,e.speed,function(){t.IE7fix.call(r);e.onShow.call(r)});return this}})})(jQuery);
(function(e){function t(e){if(e.attr("title")||typeof e.attr("original-title")!="string"){e.attr("original-title",e.attr("title")||"").removeAttr("title")}}function n(n,r){this.$element=e(n);this.options=r;this.enabled=true;t(this.$element)}n.prototype={show:function(){var t=this.getTitle();if(t&&this.enabled){var n=this.tip();n.find(".tipsy-inner")[this.options.html?"html":"text"](t);n[0].className="tipsy";n.remove().css({top:0,left:0,visibility:"hidden",display:"block"}).appendTo(document.body);var r=e.extend({},this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight});var i=n[0].offsetWidth,s=n[0].offsetHeight;var o=typeof this.options.gravity=="function"?this.options.gravity.call(this.$element[0]):this.options.gravity;var u;switch(o.charAt(0)){case"n":u={top:r.top+r.height+this.options.offset,left:r.left+r.width/2-i/2};break;case"s":u={top:r.top-s-this.options.offset,left:r.left+r.width/2-i/2};break;case"e":u={top:r.top+r.height/2-s/2,left:r.left-i-this.options.offset};break;case"w":u={top:r.top+r.height/2-s/2,left:r.left+r.width+this.options.offset};break}if(o.length==2){if(o.charAt(1)=="w"){u.left=r.left+r.width/2-15}else{u.left=r.left+r.width/2-i+15}}n.css(u).addClass("tipsy-"+o);if(this.options.fade){n.stop().css({opacity:0,display:"block",visibility:"visible"}).animate({opacity:this.options.opacity})}else{n.css({visibility:"visible",opacity:this.options.opacity})}}},hide:function(){if(this.options.fade){this.tip().stop().fadeOut(function(){e(this).remove()})}else{this.tip().remove()}},getTitle:function(){var e,n=this.$element,r=this.options;t(n);var e,r=this.options;if(typeof r.title=="string"){e=n.attr(r.title=="title"?"original-title":r.title)}else if(typeof r.title=="function"){e=r.title.call(n[0])}e=(""+e).replace(/(^\s*|\s*$)/,"");return e||r.fallback},tip:function(){if(!this.$tip){this.$tip=e('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"/></div>')}return this.$tip},validate:function(){if(!this.$element[0].parentNode){this.hide();this.$element=null;this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled}};e.fn.tipsy=function(t){function r(r){var i=e.data(r,"tipsy");if(!i){i=new n(r,e.fn.tipsy.elementOptions(r,t));e.data(r,"tipsy",i)}return i}function i(){var e=r(this);e.hoverState="in";if(t.delayIn==0){e.show()}else{setTimeout(function(){if(e.hoverState=="in")e.show()},t.delayIn)}}function s(){var e=r(this);e.hoverState="out";if(t.delayOut==0){e.hide()}else{setTimeout(function(){if(e.hoverState=="out")e.hide()},t.delayOut)}}if(t===true){return this.data("tipsy")}else if(typeof t=="string"){return this.data("tipsy")[t]()}t=e.extend({},e.fn.tipsy.defaults,t);if(!t.live)this.each(function(){r(this)});if(t.trigger!="manual"){var o=t.live?"live":"bind",u=t.trigger=="hover"?"mouseenter":"focus",a=t.trigger=="hover"?"mouseleave":"blur";this[o](u,i)[o](a,s)}return this};e.fn.tipsy.defaults={delayIn:0,delayOut:0,fade:false,fallback:"",gravity:"n",html:false,live:false,offset:0,opacity:1,title:"title",trigger:"hover"};e.fn.tipsy.elementOptions=function(t,n){return e.metadata?e.extend({},n,e(t).metadata()):n};e.fn.tipsy.autoNS=function(){return e(this).offset().top>e(document).scrollTop()+e(window).height()/2?"s":"n"};e.fn.tipsy.autoWE=function(){return e(this).offset().left>e(document).scrollLeft()+e(window).width()/2?"e":"w"}})(jQuery);
(function(){function c(){var e=false;if(e){N("keydown",y)}if(t.keyboardSupport&&!e){T("keydown",y)}}function h(){if(!document.body)return;var e=document.body;var i=document.documentElement;var a=window.innerHeight;var f=e.scrollHeight;o=document.compatMode.indexOf("CSS")>=0?i:e;u=e;c();s=true;if(top!=self){r=true}else if(f>a&&(e.offsetHeight<=a||i.offsetHeight<=a)){i.style.height="auto";setTimeout(refresh,10);if(o.offsetHeight<=a){var l=document.createElement("div");l.style.clear="both";e.appendChild(l)}}if(!t.fixedBackground&&!n){e.style.backgroundAttachment="scroll";i.style.backgroundAttachment="scroll"}}function m(e,n,r,i){i||(i=1e3);k(n,r);if(t.accelerationMax!=1){var s=+(new Date);var o=s-v;if(o<t.accelerationDelta){var u=(1+30/o)/2;if(u>1){u=Math.min(u,t.accelerationMax);n*=u;r*=u}}v=+(new Date)}p.push({x:n,y:r,lastX:n<0?.99:-.99,lastY:r<0?.99:-.99,start:+(new Date)});if(d){return}var a=e===document.body;var f=function(s){var o=+(new Date);var u=0;var l=0;for(var c=0;c<p.length;c++){var h=p[c];var v=o-h.start;var m=v>=t.animationTime;var g=m?1:v/t.animationTime;if(t.pulseAlgorithm){g=D(g)}var y=h.x*g-h.lastX>>0;var b=h.y*g-h.lastY>>0;u+=y;l+=b;h.lastX+=y;h.lastY+=b;if(m){p.splice(c,1);c--}}if(a){window.scrollBy(u,l)}else{if(u)e.scrollLeft+=u;if(l)e.scrollTop+=l}if(!n&&!r){p=[]}if(p.length){M(f,e,i/t.frameRate+1)}else{d=false}};M(f,e,0);d=true}function g(e){if(!s){h()}var n=e.target;var r=x(n);if(!r||e.defaultPrevented||C(u,"embed")||C(n,"embed")&&/\.pdf/i.test(n.src)){return true}var i=e.wheelDeltaX||0;var o=e.wheelDeltaY||0;if(!i&&!o){o=e.wheelDelta||0}if(!t.touchpadSupport&&A(o)){return true}if(Math.abs(i)>1.2){i*=t.stepSize/120}if(Math.abs(o)>1.2){o*=t.stepSize/120}m(r,-i,-o);e.preventDefault()}function y(e){var n=e.target;var r=e.ctrlKey||e.altKey||e.metaKey||e.shiftKey&&e.keyCode!==l.spacebar;if(/input|textarea|select|embed/i.test(n.nodeName)||n.isContentEditable||e.defaultPrevented||r){return true}if(C(n,"button")&&e.keyCode===l.spacebar){return true}var i,s=0,o=0;var a=x(u);var f=a.clientHeight;if(a==document.body){f=window.innerHeight}switch(e.keyCode){case l.up:o=-t.arrowScroll;break;case l.down:o=t.arrowScroll;break;case l.spacebar:i=e.shiftKey?1:-1;o=-i*f*.9;break;case l.pageup:o=-f*.9;break;case l.pagedown:o=f*.9;break;case l.home:o=-a.scrollTop;break;case l.end:var c=a.scrollHeight-a.scrollTop-f;o=c>0?c+10:0;break;case l.left:s=-t.arrowScroll;break;case l.right:s=t.arrowScroll;break;default:return true}m(a,s,o);e.preventDefault()}function b(e){u=e.target}function S(e,t){for(var n=e.length;n--;)w[E(e[n])]=t;return t}function x(e){var t=[];var n=o.scrollHeight;do{var i=w[E(e)];if(i){return S(t,i)}t.push(e);if(n===e.scrollHeight){if(!r||o.clientHeight+10<n){return S(t,document.body)}}else if(e.clientHeight+10<e.scrollHeight){overflow=getComputedStyle(e,"").getPropertyValue("overflow-y");if(overflow==="scroll"||overflow==="auto"){return S(t,e)}}}while(e=e.parentNode)}function T(e,t,n){window.addEventListener(e,t,n||false)}function N(e,t,n){window.removeEventListener(e,t,n||false)}function C(e,t){return(e.nodeName||"").toLowerCase()===t.toLowerCase()}function k(e,t){e=e>0?1:-1;t=t>0?1:-1;if(i.x!==e||i.y!==t){i.x=e;i.y=t;p=[];v=0}}function A(e){if(!e)return;e=Math.abs(e);f.push(e);f.shift();clearTimeout(L);var t=f[0]==f[1]&&f[1]==f[2];var n=O(f[0],120)&&O(f[1],120)&&O(f[2],120);return!(t||n)}function O(e,t){return Math.floor(e/t)==e/t}function _(e){var n,r,i;e=e*t.pulseScale;if(e<1){n=e-(1-Math.exp(-e))}else{r=Math.exp(-1);e-=1;i=1-Math.exp(-e);n=r+i*(1-r)}return n*t.pulseNormalize}function D(e){if(e>=1)return 1;if(e<=0)return 0;if(t.pulseNormalize==1){t.pulseNormalize/=_(1)}return _(e)}var e={frameRate:150,animationTime:400,stepSize:120,pulseAlgorithm:true,pulseScale:8,pulseNormalize:1,accelerationDelta:20,accelerationMax:1,keyboardSupport:true,arrowScroll:50,touchpadSupport:true,fixedBackground:true,excluded:""};var t=e;var n=false;var r=false;var i={x:0,y:0};var s=false;var o=document.documentElement;var u;var a;var f=[120,120,120];var l={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36};var t=e;var p=[];var d=false;var v=+(new Date);var w={};setInterval(function(){w={}},10*1e3);var E=function(){var e=0;return function(t){return t.uniqueID||(t.uniqueID=e++)}}();var L;var M=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||function(e,t,n){window.setTimeout(e,n||1e3/60)}}();var P=/chrome/i.test(window.navigator.userAgent);var H="onmousewheel"in document;if(H&&P){T("mousedown",b);T("mousewheel",g);T("load",h)}})();
/**
 * The main custom codes area
 */
jQuery(document).ready(function ($) {

	"use strict";

	jQuery.browser={};(function(){jQuery.browser.msie=false;
	jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)\./)){
	jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();

	// Superfish
	if ($(".sf-menu")[0]) {
		$('.sf-menu').superfish({
			delay: 100,
			autoArrows: true,
			animation: {
				opacity: 'none', height: 'show'
			},
			speed: 300
		});
		$('.sf-menu li li .sf-sub-indicator i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-right');
	}

	// Responsive
	$(".c_head nav").before('<div id="mobilepro"><i class="fa fa-reorder fa-times"></i></div>');
	$(".second_menu").append('<div id="mobilepro"><i class="fa fa-reorder fa-times"></i></div>');
	$(".sf-menu a.sf-with-ul").before('<div class="subarrow"><i class="fa fa-angle-down"></i></div>');
	$('.c_head .subarrow').click(function () {
		$(this).parent().toggleClass("xpopdrop");
	});
	$('.second_menu .subarrow').click(function () {
		$(this).parent().toggleClass("xpopdrop");
	});
	$('.c_head #mobilepro').click(function () {
		$('.c_head .sf-menu').slideToggle('slow', 'easeInOutExpo').toggleClass("xactive");
		$(".c_head #mobilepro i").toggleClass("fa-reorder");
	});
	$('.second_menu #mobilepro').click(function () {
		$('.second_menu .sf-menu').slideToggle('slow', 'easeInOutExpo').toggleClass("xactive");
		$(".second_menu #mobilepro i").toggleClass("fa-reorder");
	});
	$("body").click(function() {
		$('.c_head .xactive').slideUp('slow', 'easeInOutExpo').removeClass("xactive");
		$(".c_head #mobilepro i").addClass("fa-reorder");
	});
	$("body").click(function() {
		$('.second_menu .xactive').slideUp('slow', 'easeInOutExpo').removeClass("xactive");
		$(".second_menu #mobilepro i").addClass("fa-reorder");
	});
	$('.c_head #mobilepro, .c_head .sf-menu').click(function(e) {
		e.stopPropagation();
	});
	$('.second_menu #mobilepro, .second_menu .sf-menu').click(function(e) {
		e.stopPropagation();
	});
	function checkWindowSize() {
		if ($(window).width() >= 959) {
			$('.sf-menu').css('display', 'block').removeClass("xactive");
		} else {
			$('.sf-menu').css('display', 'none');
		}
	}
	$(window).load(checkWindowSize);
	$(window).resize(checkWindowSize);
	// ToTop
	jQuery('#toTop').click(function () {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 1000);
	});

	// News Ticker
	if ($(".js-hidden")[0]) {	
		$('#js-news').ticker({
			speed: 0.10,
			controls: false,
			titleText: 'Latest',
			displayType: 'reveal',
			direction: 'ltr',
			pauseOnItems: 2500
		});
		$('#js-news-rtl').ticker({
			speed: 0.10,
			controls: false,
			titleText: 'Latest',
			displayType: 'reveal',
			direction: 'rtl',
			pauseOnItems: 2500
		});
	}

	// Search
	$(".search_icon").click(function() {
		if ($(this).hasClass('opened')) {
			$(this).removeClass('opened');
			$('.search_icon i').removeClass('activeated_search');
			$('.s_form').fadeOut('slow').removeClass('animated expandOpen').addClass('animated expandOpen');
		} else {
			$(this).addClass('opened');
			$('.search_icon i').addClass('activeated_search');
			$(".s_form").fadeIn('slow').removeClass('animated expandOpen').addClass('animated expandOpen');
			$('.search_icon #inputhead').focus();
		}
	});
	$("body").click(function() {
		$('.search_icon').removeClass('opened');
		$('.search_icon i').removeClass('activeated_search');
		$('.s_form').fadeOut('slow').removeClass('animated expandOpen').addClass('animated expandOpen');
	});
	$('.search').click(function(e) {
		e.stopPropagation();
	});

	// Notification
	$(".notification-close").click(function () {
		$(this).parent().slideUp("slow");
		return false;
	});

	// Sliders
	if ($(".ipress_slider")[0]) {
		$("[class^='slider_']").owlCarousel({
			slideSpeed : 500,
			paginationSpeed : 500,
			autoPlay: true,
			autoHeight: true,
			stopOnHover: true,
			addClassActive: true,
			transitionStyle : "goDown",
			singleItem:true,
			lazyLoad : true,

			navigation : false,
			navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
			rewindNav : true,
			scrollPerPage : false,
			pagination : true,
			paginationNumbers: false
		});
	}
	if ($("[class^='small_slider_']")[0]) {
		$("[class^='small_slider_']").owlCarousel({
			slideSpeed : 600,
			paginationSpeed : 600,
			autoPlay: false,
			autoHeight: false,
			addClassActive: true,
			singleItem:true,

			navigation : false,
			rewindNav : true,
			scrollPerPage : false,
			pagination : true,
			paginationNumbers: false
		});
	}
	if ($("[class^='carousel_']")[0]) {

		$("[class^='carousel_2c_']").owlCarousel({
			autoPlay: 4000, //Set AutoPlay to 3 seconds
			items : 2,
			stopOnHover: true,
			addClassActive: true,
			transitionStyle : "goDown",
			itemsDesktop : [1170,3],
			itemsDesktopSmall : [960,3]
		});

		$("[class^='carousel_3c_'],[class^='carousel_related']").owlCarousel({
			autoPlay: 4000, //Set AutoPlay to 3 seconds
			items : 3,
			stopOnHover: true,
			addClassActive: true,
			transitionStyle : "goDown",
			itemsDesktop : [1170,3],
			itemsDesktopSmall : [960,3]
		});		
	}
	if ($(".tweets_slider")[0]) {
		$(".tweets_slider").owlCarousel({
			slideSpeed : 1500,
			paginationSpeed : 500,
			autoPlay: true,
			autoHeight: true,
			stopOnHover: true,
			addClassActive: true,
			transitionStyle : "goDown",
			singleItem:true,
			pagination : true,
			paginationNumbers: false
		});
	}

	$(".post-gallery").owlCarousel({
		autoPlay: false,
		autoHeight: true,
		stopOnHover: true,
		addClassActive: true,
		transitionStyle : "goDown",
		singleItem:true,
		pagination : false,
		navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		navigation: true,
	});	

	// Fit Videos
	$("#layout").fitVids();

	// Ajax Contact
	if ($("#contactForm")[0]) {
		$('#contactForm').submit(function () {
			$('#contactForm .error').remove();
			$('#contactForm .requiredField').removeClass('fielderror');
			$('#contactForm .requiredField').addClass('fieldtrue');
			$('#contactForm span strong').remove();
			var hasError = false;
			$('#contactForm .requiredField').each(function () {
				if (jQuery.trim($(this).val()) === '') {
					var labelText = $(this).prev('label').text();
					$(this).addClass('fielderror');
					$('#contactForm span').html('<strong>*Please fill out all fields.</strong>');
					hasError = true;
				} else if ($(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if (!emailReg.test(jQuery.trim($(this).val()))) {
						var labelText = $(this).prev('label').text();
						$(this).addClass('fielderror');
						$('#contactForm span').html('<strong>Is incorrect your email address</strong>');
						hasError = true;
					}
				}
			});
			if (!hasError) {
				$('#contactForm').slideDown('normal', function () {
					$("#contactForm #sendMessage").addClass('load-color');
					$("#contactForm #sendMessage").attr("disabled", "disabled").addClass("btn-success").val('Sending message. Please wait...');
				});
				var formInput = $(this).serialize();
				$.post($(this).attr('action'), formInput, function (data) {
					$('#contactForm').slideUp("normal", function () {
						$(this).before('<div class="notification-box notification-box-success"><p><i class="fa fa-check"></i>Thanks!</strong> Your email was successfully sent. We check Our email all the time.</p></div>');
					});
				});
			}
			return false;
		});
	}

	// Tipsy
		$('.toptip').tipsy({fade: true,gravity: 's'});
		$('.bottomtip').tipsy({fade: true,gravity: 'n'});
		$('.righttip').tipsy({fade: true,gravity: 'w'});
		$('.lefttip').tipsy({fade: true,gravity: 'e'});

	// Sticky
	if ($(".sticky_true")[0]){
		$('.sticky_true').before('<div class="Corpse_Sticky"></div>');
		$(window).scroll(function(){
			var wind_scr = $(window).scrollTop();
			var window_width = $(window).width();
			var head_w = $('.sticky_true').height();
			if (window_width >= 960) {
				if(wind_scr < 200){
					if($('.sticky_true').data('sticky') === true){
						$('.sticky_true').data('sticky', false);
						$('.sticky_true').stop(true).animate({opacity : 0}, 300, function(){
							$('.sticky_true').removeClass('sticky');
							$('.sticky_true').stop(true).animate({opacity : 1}, 300);
							$('.Corpse_Sticky').css('padding-top', '');
						});
					}
				} else {
					if($('.sticky_true').data('sticky') === false || typeof $('.sticky_true').data('sticky') === 'undefined'){
						$('.sticky_true').data('sticky', true);
						$('.sticky_true').stop(true).animate({opacity : 0},300,function(){
							$('.sticky_true').addClass('sticky');
							$('.sticky_true.sticky').stop(true).animate({opacity : 1}, 300);
							$('.Corpse_Sticky').css('padding-top', head_w + 'px');
						});
					}
				}
			}
		});
		$(window).resize(function(){
			var window_width = $(window).width();
			if (window_width <= 960) {
				if($('.sticky_true').hasClass('sticky')){
					$('.sticky_true').removeClass('sticky');
					$('.sticky_true').stop(true).animate({opacity : 0}, 300, function(){
						$('.sticky_true').removeClass('sticky');
						$('.sticky_true').stop(true).animate({opacity : 1}, 300);
						$('.Corpse_Sticky').css('padding-top', '');
					});
				}
			}
		});
	}
});