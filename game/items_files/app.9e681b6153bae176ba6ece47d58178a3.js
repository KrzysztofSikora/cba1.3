function postAjaxRequest(e,t,n,o){var r={},n=!!n;return $.ajax({url:e,type:"post",data:t,dataType:"json",async:n,success:function(e){if(jQuery.isEmptyObject(e))e={},e.error='<div style="color: orange; font-weight: bold; text-align: center">'+reportBug+"</div>";else{var t={};if(t=e,void 0!=t.force_logout&&1==t.force_logout)return location.href="/",!1;"function"==typeof o&&o(e)}},error:function(e,t,n){isAjaxPending=!1;var r={};422==e.status?($errors=e.responseJSON,r["form-error"]=$errors):500===e.status?r.error=e.responseText:403===e.status||401==e.status?(r.error="You have not permission","parsererror"==t&&(r.error=e.responseText)):(r.error="Undefined response code: "+e.status,"parsererror"==t&&(r.error=e.responseText)),"function"==typeof o&&o(r)}}),r}function formData(e){return dane={},$.each(formValues(e),function(e,t){dane[e]=t}),dane}function formValues(e){var t={};return $('input[type="text"], input[type="number"], input[type="email"], input[type="time"], input[type="password"], input[type="hidden"], input[type="date"],input[type="color"], textarea',e).each(function(){var e="";void 0!=(e=$(this).attr("name"))&&""!=e&&(t[e]=$(this).val())}),$("textarea",e).each(function(){var e="";void 0!=(e=$(this).attr("name"))&&""!=e&&(t[e]=$(this).val())}),$('input[type="checkbox"]',e).each(function(){var e="";void 0!=(e=$(this).attr("name"))&&""!=e&&($(this).is(":checked")?t[e]=1:t[e]=0)}),$('input[type="radio"]',e).each(function(){var e="";void 0!=(e=$(this).attr("name"))&&""!=e&&$(this).is(":checked")&&(t[e]=$(this).val())}),$("select",e).each(function(){var e="";void 0!=(e=$(this).attr("name"))&&""!=e&&(t[e]=$(this).val())}),t}function showAlert(e,t,n){$("#ajaxBox").modal("hide"),actionToMade=1==t?"location.reload();":"hideAlert();",void 0!=n&&n.length>0&&(actionToMade="window.location.href ='"+n+"'"),$("#ajaxAlert .modal-header").attr("onclick",actionToMade),$("#ajaxAlert .modal-body .data").html(e),$("#ajaxAlert").modal("show")}function showBox(e,t,n,o,r){$("#ajaxAlert").modal("hide"),actionToMade="hideBox();",$("#ajaxBox .modal-header").attr("onclick",actionToMade),$("#ajaxBox .modal-title").html(t),$("#ajaxBox .modal-body .data").load(e+n,function(e){if('{"force_logout":1}'==e)return location.href="/",!1;$("#ajaxBox .modal-body .data").html(e),$("#ajaxBox").modal("show"),$(r).html(o)})}function hideAllAlert(){$("#ajaxAlert").modal("hide"),$("#ajaxBox").modal("hide")}function hideAlert(){$("#ajaxAlert").modal("hide")}function hideBox(){$("#ajaxBox").modal("hide")}$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$(document).on("click",".laravelBox",function(e){var t=$(this).html();$(this).html('<i class="fa fa-spinner fa-spin"></i>');var n=$(this),o=n.attr("data-route");data=$(this).attr("data")?$(this).attr("data"):"",data_title=$(this).attr("data-title")?$(this).attr("data-title"):"Information",showBox(o,data_title,data,t,$(this))});var isAjaxPending=!1;$(document).on("click",".ajax, .laravelAjax",function(e){if(isAjaxPending)showAlert("Poczekaj na zakończenie poprzedniego żądania.");else{isAjaxPending=!0;var t=$(this),n=t.html(),o=t.attr("type"),r={},i=t.attr("data-route"),a="";if(t.attr("data-token")&&(a=t.attr("data-token")),t.attr("data-request")&&(i=t.attr("data-request")),"submit"===o?(sendAjaxFormClass=$(this).parents("form"),r=formData(sendAjaxFormClass)):(dane={},dane._token=a,r=dane,sendAjaxFormClass=void 0),t.hasClass("prompt"))data=$(this).attr("data"),question=$(this).attr("data-question")?$(this).attr("data-question"):"Confirm this operation",showAlert(question+"<br /><br /> <center class='yesorno'><button data-request='"+i+"' data-token='"+a+"' class='laravelAjax btn btn-sm btn-success' data='"+data+"'><i class='fa fa-check'></i>  YES</button> <button class='btn btn-sm btn-danger' style='margin-left: 20px;' onClick='hideAlert();'><i class='fa fa-close'></i> NO</button></center>",!1),isAjaxPending=!1;else{var s;t.html('<i class="fa fa-spin fa-spinner"></i>'),postAjaxRequest(i,r,!0,function(e){if(isAjaxPending=!1,$(".has-error").removeClass("has-error"),$(".fv").find(".help-block").html(""),t.html(n),void 0!=e["form-error"])jQuery.each(e["form-error"],function(e,t){if("alert"==e)showAlert(t);else{var n=$(".fv-"+e);n.addClass("has-error"),n.find(".help-block").html(t),n.find(".help-block").addClass("has-error"),n.find("label").addClass("has-error")}});else if(void 0!=e.error)void 0!=e.alertReload?showAlert(e.error,!0):showAlert(e.error,!1);else if(void 0!=e.noalert&&hideAllAlert(),void 0!=e.info&&(void 0!=e.reloadPageDelay&&setTimeout(function(){location.reload()},e.reloadPageDelay),void 0!=e.delay&&(showAlert(e.info,!1),setTimeout(function(){window.location.href=e.href},e.delay)),void 0!=e.href?showAlert(e.info,!1,e.href):void 0!=e.alertReload?showAlert(e.info,!0):showAlert(e.info,!1)),void 0!=e.redirect&&(location.href=e.redirect),void 0!=e.reloadPage&&location.reload(),void 0!=e.change&&jQuery.each(e.change,function(e,t){var n="."+e;$(n).is("input")?$(n).val(t):$(n).html(t)}),void 0!=e.attr&&jQuery.each(e.attr,function(t,n){var o="."+t;jQuery.each(e.attr[t],function(e,t){$(o).attr(e,t)})}),void 0!=e.remove&&jQuery.each(e.remove,function(e,t){$("#"+t).slideUp(400,function(){$(this).remove()})}),void 0!=e.removeClass&&jQuery.each(e.removeClass,function(e,t){$("."+e).slideUp(400,function(){$(this).remove()})}),void 0!=e.addClass&&jQuery.each(e.addClass,function(e,t){$(e).addClass(t)}),void 0!=e.prepend&&$("."+e.prepend.class).prepend(e.prepend.body),void 0!=e.setHtml&&$("."+e.setHtml.class).html(e.setHtml.body),void 0!=e.append&&(void 0!=e.append.remove?($("."+e.append.remove).remove(),$("."+e.append.class).append(e.append.body)):$("."+e.append.class).append(e.append.body)),void 0!=e.fullcalendar&&(myEvent=jQuery.parseJSON(e.fullcalendar),void 0!=e.delete&&$("#calendar").fullCalendar("removeEvents",myEvent.id),void 0!=e.create&&$("#calendar").fullCalendar("renderEvent",myEvent)),void 0!=e.slideDown){var o=[];for(s in e.slideDown)o.push(s);for(var r=o.length,i=0;i<r;i++){var a=o[i],f=(e.slideDown[a],a);$(f).slideDown(400)}}return!1})}}return!1}).on("dblclick",function(e){e.preventDefault()}),function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.Popper=t()}(this,function(){"use strict";function e(e){return e&&"[object Function]"==={}.toString.call(e)}function t(e,t){if(1!==e.nodeType)return[];var n=window.getComputedStyle(e,null);return t?n[t]:n}function n(e){return"HTML"===e.nodeName?e:e.parentNode||e.host}function o(e){if(!e||-1!==["HTML","BODY","#document"].indexOf(e.nodeName))return window.document.body;var r=t(e),i=r.overflow,a=r.overflowX;return/(auto|scroll)/.test(i+r.overflowY+a)?e:o(n(e))}function r(e){var n=e&&e.offsetParent,o=n&&n.nodeName;return o&&"BODY"!==o&&"HTML"!==o?-1!==["TD","TABLE"].indexOf(n.nodeName)&&"static"===t(n,"position")?r(n):n:window.document.documentElement}function i(e){var t=e.nodeName;return"BODY"!==t&&("HTML"===t||r(e.firstElementChild)===e)}function a(e){return null===e.parentNode?e:a(e.parentNode)}function s(e,t){if(!(e&&e.nodeType&&t&&t.nodeType))return window.document.documentElement;var n=e.compareDocumentPosition(t)&Node.DOCUMENT_POSITION_FOLLOWING,o=n?e:t,f=n?t:e,d=document.createRange();d.setStart(o,0),d.setEnd(f,0);var l=d.commonAncestorContainer;if(e!==l&&t!==l||o.contains(f))return i(l)?l:r(l);var p=a(e);return p.host?s(p.host,t):s(e,a(t).host)}function f(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:"top",n="top"===t?"scrollTop":"scrollLeft",o=e.nodeName;if("BODY"===o||"HTML"===o){var r=window.document.documentElement;return(window.document.scrollingElement||r)[n]}return e[n]}function d(e,t){var n=2<arguments.length&&void 0!==arguments[2]&&arguments[2],o=f(t,"top"),r=f(t,"left"),i=n?-1:1;return e.top+=o*i,e.bottom+=o*i,e.left+=r*i,e.right+=r*i,e}function l(e,t){var n="x"===t?"Left":"Top",o="Left"==n?"Right":"Bottom";return+e["border"+n+"Width"].split("px")[0]+ +e["border"+o+"Width"].split("px")[0]}function p(e,t,n,o){return z(t["offset"+e],n["client"+e],n["offset"+e],ne()?n["offset"+e]+o["margin"+("Height"===e?"Top":"Left")]+o["margin"+("Height"===e?"Bottom":"Right")]:0)}function c(){var e=window.document.body,t=window.document.documentElement,n=ne()&&window.getComputedStyle(t);return{height:p("Height",e,t,n),width:p("Width",e,t,n)}}function u(e){return ae({},e,{right:e.left+e.width,bottom:e.top+e.height})}function h(e){var n={};if(ne())try{n=e.getBoundingClientRect();var o=f(e,"top"),r=f(e,"left");n.top+=o,n.left+=r,n.bottom+=o,n.right+=r}catch(e){}else n=e.getBoundingClientRect();var i={left:n.left,top:n.top,width:n.right-n.left,height:n.bottom-n.top},a="HTML"===e.nodeName?c():{},s=a.width||e.clientWidth||i.right-i.left,d=a.height||e.clientHeight||i.bottom-i.top,p=e.offsetWidth-s,h=e.offsetHeight-d;if(p||h){var m=t(e);p-=l(m,"x"),h-=l(m,"y"),i.width-=p,i.height-=h}return u(i)}function m(e,n){var r=ne(),i="HTML"===n.nodeName,a=h(e),s=h(n),f=o(e),l=t(n),p=+l.borderTopWidth.split("px")[0],c=+l.borderLeftWidth.split("px")[0],m=u({top:a.top-s.top-p,left:a.left-s.left-c,width:a.width,height:a.height});if(m.marginTop=0,m.marginLeft=0,!r&&i){var v=+l.marginTop.split("px")[0],g=+l.marginLeft.split("px")[0];m.top-=p-v,m.bottom-=p-v,m.left-=c-g,m.right-=c-g,m.marginTop=v,m.marginLeft=g}return(r?n.contains(f):n===f&&"BODY"!==f.nodeName)&&(m=d(m,n)),m}function v(e){var t=window.document.documentElement,n=m(e,t),o=z(t.clientWidth,window.innerWidth||0),r=z(t.clientHeight,window.innerHeight||0),i=f(t),a=f(t,"left");return u({top:i-n.top+n.marginTop,left:a-n.left+n.marginLeft,width:o,height:r})}function g(e){var o=e.nodeName;return"BODY"!==o&&"HTML"!==o&&("fixed"===t(e,"position")||g(n(e)))}function b(e,t,r,i){var a={top:0,left:0},f=s(e,t);if("viewport"===i)a=v(f);else{var d;"scrollParent"===i?(d=o(n(e)),"BODY"===d.nodeName&&(d=window.document.documentElement)):d="window"===i?window.document.documentElement:i;var l=m(d,f);if("HTML"!==d.nodeName||g(f))a=l;else{var p=c(),u=p.height,h=p.width;a.top+=l.top-l.marginTop,a.bottom=u+l.top,a.left+=l.left-l.marginLeft,a.right=h+l.left}}return a.left+=r,a.top+=r,a.right-=r,a.bottom-=r,a}function w(e){return e.width*e.height}function y(e,t,n,o,r){var i=5<arguments.length&&void 0!==arguments[5]?arguments[5]:0;if(-1===e.indexOf("auto"))return e;var a=b(n,o,i,r),s={top:{width:a.width,height:t.top-a.top},right:{width:a.right-t.right,height:a.height},bottom:{width:a.width,height:a.bottom-t.bottom},left:{width:t.left-a.left,height:a.height}},f=Object.keys(s).map(function(e){return ae({key:e},s[e],{area:w(s[e])})}).sort(function(e,t){return t.area-e.area}),d=f.filter(function(e){var t=e.width,o=e.height;return t>=n.clientWidth&&o>=n.clientHeight}),l=0<d.length?d[0].key:f[0].key,p=e.split("-")[1];return l+(p?"-"+p:"")}function x(e,t,n){return m(n,s(t,n))}function $(e){var t=window.getComputedStyle(e),n=parseFloat(t.marginTop)+parseFloat(t.marginBottom),o=parseFloat(t.marginLeft)+parseFloat(t.marginRight);return{width:e.offsetWidth+o,height:e.offsetHeight+n}}function E(e){var t={left:"right",right:"left",bottom:"top",top:"bottom"};return e.replace(/left|right|bottom|top/g,function(e){return t[e]})}function O(e,t,n){n=n.split("-")[0];var o=$(e),r={width:o.width,height:o.height},i=-1!==["right","left"].indexOf(n),a=i?"top":"left",s=i?"left":"top",f=i?"height":"width",d=i?"width":"height";return r[a]=t[a]+t[f]/2-o[f]/2,r[s]=n===s?t[s]-o[d]:t[E(s)],r}function j(e,t){return Array.prototype.find?e.find(t):e.filter(t)[0]}function A(e,t,n){if(Array.prototype.findIndex)return e.findIndex(function(e){return e[t]===n});var o=j(e,function(e){return e[t]===n});return e.indexOf(o)}function C(t,n,o){return(void 0===o?t:t.slice(0,A(t,"name",o))).forEach(function(t){t.function;var o=t.function||t.fn;t.enabled&&e(o)&&(n.offsets.popper=u(n.offsets.popper),n.offsets.reference=u(n.offsets.reference),n=o(n,t))}),n}function T(){if(!this.state.isDestroyed){var e={instance:this,styles:{},attributes:{},flipped:!1,offsets:{}};e.offsets.reference=x(this.state,this.popper,this.reference),e.placement=y(this.options.placement,e.offsets.reference,this.popper,this.reference,this.options.modifiers.flip.boundariesElement,this.options.modifiers.flip.padding),e.originalPlacement=e.placement,e.offsets.popper=O(this.popper,e.offsets.reference,e.placement),e.offsets.popper.position="absolute",e=C(this.modifiers,e),this.state.isCreated?this.options.onUpdate(e):(this.state.isCreated=!0,this.options.onCreate(e))}}function k(e,t){return e.some(function(e){var n=e.name;return e.enabled&&n===t})}function L(e){for(var t=[!1,"ms","Webkit","Moz","O"],n=e.charAt(0).toUpperCase()+e.slice(1),o=0;o<t.length-1;o++){var r=t[o],i=r?""+r+n:e;if(void 0!==window.document.body.style[i])return i}return null}function B(){return this.state.isDestroyed=!0,k(this.modifiers,"applyStyle")&&(this.popper.removeAttribute("x-placement"),this.popper.style.left="",this.popper.style.position="",this.popper.style.top="",this.popper.style[L("transform")]=""),this.disableEventListeners(),this.options.removeOnDestroy&&this.popper.parentNode.removeChild(this.popper),this}function N(e,t,n,r){var i="BODY"===e.nodeName,a=i?window:e;a.addEventListener(t,n,{passive:!0}),i||N(o(a.parentNode),t,n,r),r.push(a)}function D(e,t,n,r){n.updateBound=r,window.addEventListener("resize",n.updateBound,{passive:!0});var i=o(e);return N(i,"scroll",n.updateBound,n.scrollParents),n.scrollElement=i,n.eventsEnabled=!0,n}function P(){this.state.eventsEnabled||(this.state=D(this.reference,this.options,this.state,this.scheduleUpdate))}function M(e,t){return window.removeEventListener("resize",t.updateBound),t.scrollParents.forEach(function(e){e.removeEventListener("scroll",t.updateBound)}),t.updateBound=null,t.scrollParents=[],t.scrollElement=null,t.eventsEnabled=!1,t}function H(){this.state.eventsEnabled&&(window.cancelAnimationFrame(this.scheduleUpdate),this.state=M(this.reference,this.state))}function S(e){return""!==e&&!isNaN(parseFloat(e))&&isFinite(e)}function W(e,t){Object.keys(t).forEach(function(n){var o="";-1!==["width","height","top","right","bottom","left"].indexOf(n)&&S(t[n])&&(o="px"),e.style[n]=t[n]+o})}function F(e,t){Object.keys(t).forEach(function(n){!1===t[n]?e.removeAttribute(n):e.setAttribute(n,t[n])})}function R(e,t,n){var o=j(e,function(e){return e.name===t}),r=!!o&&e.some(function(e){return e.name===n&&e.enabled&&e.order<o.order});if(!r);return r}function U(e){return"end"===e?"start":"start"===e?"end":e}function q(e){var t=1<arguments.length&&void 0!==arguments[1]&&arguments[1],n=fe.indexOf(e),o=fe.slice(n+1).concat(fe.slice(0,n));return t?o.reverse():o}function I(e,t,n,o){var r=e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),i=+r[1],a=r[2];if(!i)return e;if(0===a.indexOf("%")){var s;switch(a){case"%p":s=n;break;case"%":case"%r":default:s=o}return u(s)[t]/100*i}if("vh"===a||"vw"===a){return("vh"===a?z(document.documentElement.clientHeight,window.innerHeight||0):z(document.documentElement.clientWidth,window.innerWidth||0))/100*i}return i}function Y(e,t,n,o){var r=[0,0],i=-1!==["right","left"].indexOf(o),a=e.split(/(\+|\-)/).map(function(e){return e.trim()}),s=a.indexOf(j(a,function(e){return-1!==e.search(/,|\s/)}));a[s]&&a[s].indexOf(",");var f=/\s*,\s*|\s+/,d=-1===s?[a]:[a.slice(0,s).concat([a[s].split(f)[0]]),[a[s].split(f)[1]].concat(a.slice(s+1))];return d=d.map(function(e,o){var r=(1===o?!i:i)?"height":"width",a=!1;return e.reduce(function(e,t){return""===e[e.length-1]&&-1!==["+","-"].indexOf(t)?(e[e.length-1]=t,a=!0,e):a?(e[e.length-1]+=t,a=!1,e):e.concat(t)},[]).map(function(e){return I(e,r,t,n)})}),d.forEach(function(e,t){e.forEach(function(n,o){S(n)&&(r[t]+=n*("-"===e[o-1]?-1:1))})}),r}for(var Q=Math.min,_=Math.floor,z=Math.max,K=["native code","[object MutationObserverConstructor]"],V="undefined"!=typeof window,J=["Edge","Trident","Firefox"],X=0,G=0;G<J.length;G+=1)if(V&&0<=navigator.userAgent.indexOf(J[G])){X=1;break}var Z,ee=V&&function(e){return K.some(function(t){return-1<(e||"").toString().indexOf(t)})}(window.MutationObserver),te=ee?function(e){var t=!1,n=0,o=document.createElement("span");return new MutationObserver(function(){e(),t=!1}).observe(o,{attributes:!0}),function(){t||(t=!0,o.setAttribute("x-index",n),++n)}}:function(e){var t=!1;return function(){t||(t=!0,setTimeout(function(){t=!1,e()},X))}},ne=function(){return void 0==Z&&(Z=-1!==navigator.appVersion.indexOf("MSIE 10")),Z},oe=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},re=function(){function e(e,t){for(var n,o=0;o<t.length;o++)n=t[o],n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),ie=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},ae=Object.assign||function(e){for(var t,n=1;n<arguments.length;n++)for(var o in t=arguments[n])Object.prototype.hasOwnProperty.call(t,o)&&(e[o]=t[o]);return e},se=["auto-start","auto","auto-end","top-start","top","top-end","right-start","right","right-end","bottom-end","bottom","bottom-start","left-end","left","left-start"],fe=se.slice(3),de={FLIP:"flip",CLOCKWISE:"clockwise",COUNTERCLOCKWISE:"counterclockwise"},le=function(){function t(n,o){var r=this,i=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{};oe(this,t),this.scheduleUpdate=function(){return requestAnimationFrame(r.update)},this.update=te(this.update.bind(this)),this.options=ae({},t.Defaults,i),this.state={isDestroyed:!1,isCreated:!1,scrollParents:[]},this.reference=n.jquery?n[0]:n,this.popper=o.jquery?o[0]:o,this.options.modifiers={},Object.keys(ae({},t.Defaults.modifiers,i.modifiers)).forEach(function(e){r.options.modifiers[e]=ae({},t.Defaults.modifiers[e]||{},i.modifiers?i.modifiers[e]:{})}),this.modifiers=Object.keys(this.options.modifiers).map(function(e){return ae({name:e},r.options.modifiers[e])}).sort(function(e,t){return e.order-t.order}),this.modifiers.forEach(function(t){t.enabled&&e(t.onLoad)&&t.onLoad(r.reference,r.popper,r.options,t,r.state)}),this.update();var a=this.options.eventsEnabled;a&&this.enableEventListeners(),this.state.eventsEnabled=a}return re(t,[{key:"update",value:function(){return T.call(this)}},{key:"destroy",value:function(){return B.call(this)}},{key:"enableEventListeners",value:function(){return P.call(this)}},{key:"disableEventListeners",value:function(){return H.call(this)}}]),t}();return le.Utils=("undefined"==typeof window?global:window).PopperUtils,le.placements=se,le.Defaults={placement:"bottom",eventsEnabled:!0,removeOnDestroy:!1,onCreate:function(){},onUpdate:function(){},modifiers:{shift:{order:100,enabled:!0,fn:function(e){var t=e.placement,n=t.split("-")[0],o=t.split("-")[1];if(o){var r=e.offsets,i=r.reference,a=r.popper,s=-1!==["bottom","top"].indexOf(n),f=s?"left":"top",d=s?"width":"height",l={start:ie({},f,i[f]),end:ie({},f,i[f]+i[d]-a[d])};e.offsets.popper=ae({},a,l[o])}return e}},offset:{order:200,enabled:!0,fn:function(e,t){var n,o=t.offset,r=e.placement,i=e.offsets,a=i.popper,s=i.reference,f=r.split("-")[0];return n=S(+o)?[+o,0]:Y(o,a,s,f),"left"===f?(a.top+=n[0],a.left-=n[1]):"right"===f?(a.top+=n[0],a.left+=n[1]):"top"===f?(a.left+=n[0],a.top-=n[1]):"bottom"===f&&(a.left+=n[0],a.top+=n[1]),e.popper=a,e},offset:0},preventOverflow:{order:300,enabled:!0,fn:function(e,t){var n=t.boundariesElement||r(e.instance.popper);e.instance.reference===n&&(n=r(n));var o=b(e.instance.popper,e.instance.reference,t.padding,n);t.boundaries=o;var i=t.priority,a=e.offsets.popper,s={primary:function(e){var n=a[e];return a[e]<o[e]&&!t.escapeWithReference&&(n=z(a[e],o[e])),ie({},e,n)},secondary:function(e){var n="right"===e?"left":"top",r=a[n];return a[e]>o[e]&&!t.escapeWithReference&&(r=Q(a[n],o[e]-("right"===e?a.width:a.height))),ie({},n,r)}};return i.forEach(function(e){var t=-1===["left","top"].indexOf(e)?"secondary":"primary";a=ae({},a,s[t](e))}),e.offsets.popper=a,e},priority:["left","right","top","bottom"],padding:5,boundariesElement:"scrollParent"},keepTogether:{order:400,enabled:!0,fn:function(e){var t=e.offsets,n=t.popper,o=t.reference,r=e.placement.split("-")[0],i=_,a=-1!==["top","bottom"].indexOf(r),s=a?"right":"bottom",f=a?"left":"top",d=a?"width":"height";return n[s]<i(o[f])&&(e.offsets.popper[f]=i(o[f])-n[d]),n[f]>i(o[s])&&(e.offsets.popper[f]=i(o[s])),e}},arrow:{order:500,enabled:!0,fn:function(e,t){if(!R(e.instance.modifiers,"arrow","keepTogether"))return e;var n=t.element;if("string"==typeof n){if(!(n=e.instance.popper.querySelector(n)))return e}else if(!e.instance.popper.contains(n))return e;var o=e.placement.split("-")[0],r=e.offsets,i=r.popper,a=r.reference,s=-1!==["left","right"].indexOf(o),f=s?"height":"width",d=s?"top":"left",l=s?"left":"top",p=s?"bottom":"right",c=$(n)[f];a[p]-c<i[d]&&(e.offsets.popper[d]-=i[d]-(a[p]-c)),a[d]+c>i[p]&&(e.offsets.popper[d]+=a[d]+c-i[p]);var h=a[d]+a[f]/2-c/2,m=h-u(e.offsets.popper)[d];return m=z(Q(i[f]-c,m),0),e.arrowElement=n,e.offsets.arrow={},e.offsets.arrow[d]=Math.round(m),e.offsets.arrow[l]="",e},element:"[x-arrow]"},flip:{order:600,enabled:!0,fn:function(e,t){if(k(e.instance.modifiers,"inner"))return e;if(e.flipped&&e.placement===e.originalPlacement)return e;var n=b(e.instance.popper,e.instance.reference,t.padding,t.boundariesElement),o=e.placement.split("-")[0],r=E(o),i=e.placement.split("-")[1]||"",a=[];switch(t.behavior){case de.FLIP:a=[o,r];break;case de.CLOCKWISE:a=q(o);break;case de.COUNTERCLOCKWISE:a=q(o,!0);break;default:a=t.behavior}return a.forEach(function(s,f){if(o!==s||a.length===f+1)return e;o=e.placement.split("-")[0],r=E(o);var d=e.offsets.popper,l=e.offsets.reference,p=_,c="left"===o&&p(d.right)>p(l.left)||"right"===o&&p(d.left)<p(l.right)||"top"===o&&p(d.bottom)>p(l.top)||"bottom"===o&&p(d.top)<p(l.bottom),u=p(d.left)<p(n.left),h=p(d.right)>p(n.right),m=p(d.top)<p(n.top),v=p(d.bottom)>p(n.bottom),g="left"===o&&u||"right"===o&&h||"top"===o&&m||"bottom"===o&&v,b=-1!==["top","bottom"].indexOf(o),w=!!t.flipVariations&&(b&&"start"===i&&u||b&&"end"===i&&h||!b&&"start"===i&&m||!b&&"end"===i&&v);(c||g||w)&&(e.flipped=!0,(c||g)&&(o=a[f+1]),w&&(i=U(i)),e.placement=o+(i?"-"+i:""),e.offsets.popper=ae({},e.offsets.popper,O(e.instance.popper,e.offsets.reference,e.placement)),e=C(e.instance.modifiers,e,"flip"))}),e},behavior:"flip",padding:5,boundariesElement:"viewport"},inner:{order:700,enabled:!1,fn:function(e){var t=e.placement,n=t.split("-")[0],o=e.offsets,r=o.popper,i=o.reference,a=-1!==["left","right"].indexOf(n),s=-1===["top","left"].indexOf(n);return r[a?"left":"top"]=i[t]-(s?r[a?"width":"height"]:0),e.placement=E(t),e.offsets.popper=u(r),e}},hide:{order:800,enabled:!0,fn:function(e){if(!R(e.instance.modifiers,"hide","preventOverflow"))return e;var t=e.offsets.reference,n=j(e.instance.modifiers,function(e){return"preventOverflow"===e.name}).boundaries;if(t.bottom<n.top||t.left>n.right||t.top>n.bottom||t.right<n.left){if(!0===e.hide)return e;e.hide=!0,e.attributes["x-out-of-boundaries"]=""}else{if(!1===e.hide)return e;e.hide=!1,e.attributes["x-out-of-boundaries"]=!1}return e}},computeStyle:{order:850,enabled:!0,fn:function(e,t){var n,o,i=t.x,a=t.y,s=e.offsets.popper,f=j(e.instance.modifiers,function(e){return"applyStyle"===e.name}).gpuAcceleration,d=void 0===f?t.gpuAcceleration:f,l=r(e.instance.popper),p=h(l),c={position:s.position},u={left:_(s.left),top:_(s.top),bottom:_(s.bottom),right:_(s.right)},m="bottom"===i?"top":"bottom",v="right"===a?"left":"right",g=L("transform");if(o="bottom"==m?-p.height+u.bottom:u.top,n="right"==v?-p.width+u.right:u.left,d&&g)c[g]="translate3d("+n+"px, "+o+"px, 0)",c[m]=0,c[v]=0,c.willChange="transform";else{var b="bottom"==m?-1:1,w="right"==v?-1:1;c[m]=o*b,c[v]=n*w,c.willChange=m+", "+v}var y={"x-placement":e.placement};return e.attributes=ae({},y,e.attributes),e.styles=ae({},c,e.styles),e},gpuAcceleration:!0,x:"bottom",y:"right"},applyStyle:{order:900,enabled:!0,fn:function(e){return W(e.instance.popper,e.styles),F(e.instance.popper,e.attributes),e.offsets.arrow&&W(e.arrowElement,e.offsets.arrow),e},onLoad:function(e,t,n,o,r){var i=x(r,t,e),a=y(n.placement,i,t,e,n.modifiers.flip.boundariesElement,n.modifiers.flip.padding);return t.setAttribute("x-placement",a),W(t,{position:"absolute"}),n},gpuAcceleration:void 0}}},le});