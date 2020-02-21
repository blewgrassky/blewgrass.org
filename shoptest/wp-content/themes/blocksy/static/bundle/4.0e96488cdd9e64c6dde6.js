(window.blocksyJsonP=window.blocksyJsonP||[]).push([[4],[,,,,,,,,,,,,,,function(e,t,n){"use strict";var i=n(15).forEach,o=n(34),r=n(35),a=n(36),s=n(37),l=n(38),d=n(16),c=n(39),u=n(41),f=n(42),h=n(43);function g(e){return Array.isArray(e)||void 0!==e.length}function v(e){if(Array.isArray(e))return e;var t=[];return i(e,function(e){t.push(e)}),t}function p(e){return e&&1===e.nodeType}function m(e,t,n){var i=e[t];return null==i&&void 0!==n?n:i}e.exports=function(e){var t;if((e=e||{}).idHandler)t={get:function(t){return e.idHandler.get(t,!0)},set:e.idHandler.set};else{var n=a(),b=s({idGenerator:n,stateHandler:u});t=b}var y=e.reporter;y||(y=l(!1===y));var w=m(e,"batchProcessor",c({reporter:y})),x={};x.callOnAdd=!!m(e,"callOnAdd",!0),x.debug=!!m(e,"debug",!1);var E,S=r(t),A=o({stateHandler:u}),k=m(e,"strategy","object"),z={reporter:y,batchProcessor:w,stateHandler:u,idHandler:t};if("scroll"===k&&(d.isLegacyOpera()?(y.warn("Scroll strategy is not supported on legacy Opera. Changing to object strategy."),k="object"):d.isIE(9)&&(y.warn("Scroll strategy is not supported on IE9. Changing to object strategy."),k="object")),"scroll"===k)E=h(z);else{if("object"!==k)throw new Error("Invalid strategy name: "+k);E=f(z)}var H={};return{listenTo:function(e,n,o){function r(e){var t=S.get(e);i(t,function(t){t(e)})}function a(e,t,n){S.add(t,n),e&&n(t)}if(o||(o=n,n=e,e={}),!n)throw new Error("At least one element required.");if(!o)throw new Error("Listener required.");if(p(n))n=[n];else{if(!g(n))return y.error("Invalid arguments. Must be a DOM element or a collection of DOM elements.");n=v(n)}var s=0,l=m(e,"callOnAdd",x.callOnAdd),d=m(e,"onReady",function(){}),c=m(e,"debug",x.debug);i(n,function(e){u.getState(e)||(u.initState(e),t.set(e));var f=t.get(e);if(c&&y.log("Attaching listener to element",f,e),!A.isDetectable(e))return c&&y.log(f,"Not detectable."),A.isBusy(e)?(c&&y.log(f,"System busy making it detectable"),a(l,e,o),H[f]=H[f]||[],void H[f].push(function(){++s===n.length&&d()})):(c&&y.log(f,"Making detectable..."),A.markBusy(e,!0),E.makeDetectable({debug:c},e,function(e){if(c&&y.log(f,"onElementDetectable"),u.getState(e)){A.markAsDetectable(e),A.markBusy(e,!1),E.addListener(e,r),a(l,e,o);var t=u.getState(e);if(t&&t.startSize){var h=e.offsetWidth,g=e.offsetHeight;t.startSize.width===h&&t.startSize.height===g||r(e)}H[f]&&i(H[f],function(e){e()})}else c&&y.log(f,"Element uninstalled before being detectable.");delete H[f],++s===n.length&&d()}));c&&y.log(f,"Already detecable, adding listener."),a(l,e,o),s++}),s===n.length&&d()},removeListener:S.removeListener,removeAllListeners:S.removeAllListeners,uninstall:function(e){if(!e)return y.error("At least one element is required.");if(p(e))e=[e];else{if(!g(e))return y.error("Invalid arguments. Must be a DOM element or a collection of DOM elements.");e=v(e)}i(e,function(e){S.removeAllListeners(e),E.uninstall(e),u.cleanState(e)})}}}},function(e,t,n){"use strict";(e.exports={}).forEach=function(e,t){for(var n=0;n<e.length;n++){var i=t(e[n]);if(i)return i}}},function(e,t,n){"use strict";var i=e.exports={};i.isIE=function(e){return(-1!==(t=navigator.userAgent.toLowerCase()).indexOf("msie")||-1!==t.indexOf("trident")||-1!==t.indexOf(" edge/"))&&(!e||e===function(){var e=3,t=document.createElement("div"),n=t.getElementsByTagName("i");do{t.innerHTML="\x3c!--[if gt IE "+ ++e+"]><i></i><![endif]--\x3e"}while(n[0]);return e>4?e:void 0}());var t},i.isLegacyOpera=function(){return!!window.opera}},,,,,,,,,,,,,,,,,,function(e,t,n){"use strict";e.exports=function(e){var t=e.stateHandler.getState;return{isDetectable:function(e){var n=t(e);return n&&!!n.isDetectable},markAsDetectable:function(e){t(e).isDetectable=!0},isBusy:function(e){return!!t(e).busy},markBusy:function(e,n){t(e).busy=!!n}}}},function(e,t,n){"use strict";e.exports=function(e){var t={};function n(n){var i=e.get(n);return void 0===i?[]:t[i]||[]}return{get:n,add:function(n,i){var o=e.get(n);t[o]||(t[o]=[]),t[o].push(i)},removeListener:function(e,t){for(var i=n(e),o=0,r=i.length;o<r;++o)if(i[o]===t){i.splice(o,1);break}},removeAllListeners:function(e){var t=n(e);t&&(t.length=0)}}}},function(e,t,n){"use strict";e.exports=function(){var e=1;return{generate:function(){return e++}}}},function(e,t,n){"use strict";e.exports=function(e){var t=e.idGenerator,n=e.stateHandler.getState;return{get:function(e){var t=n(e);return t&&void 0!==t.id?t.id:null},set:function(e){var i=n(e);if(!i)throw new Error("setId required the element to have a resize detection state.");var o=t.generate();return i.id=o,o}}}},function(e,t,n){"use strict";e.exports=function(e){function t(){}var n={log:t,warn:t,error:t};if(!e&&window.console){var i=function(e,t){e[t]=function(){var e=console[t];if(e.apply)e.apply(console,arguments);else for(var n=0;n<arguments.length;n++)e(arguments[n])}};i(n,"log"),i(n,"warn"),i(n,"error")}return n}},function(e,t,n){"use strict";var i=n(40);function o(){var e={},t=0,n=0,i=0;return{add:function(o,r){r||(r=o,o=0),o>n?n=o:o<i&&(i=o),e[o]||(e[o]=[]),e[o].push(r),t++},process:function(){for(var t=i;t<=n;t++)for(var o=e[t],r=0;r<o.length;r++)(0,o[r])()},size:function(){return t}}}e.exports=function(e){var t=(e=e||{}).reporter,n=i.getOption(e,"async",!0),r=i.getOption(e,"auto",!0);r&&!n&&(t&&t.warn("Invalid options combination. auto=true and async=false is invalid. Setting async=true."),n=!0);var a,s=o(),l=!1;function d(){for(l=!0;s.size();){var e=s;s=o(),e.process()}l=!1}function c(){var e;e=d,a=setTimeout(e,0)}return{add:function(e,t){!l&&r&&n&&0===s.size()&&c(),s.add(e,t)},force:function(e){l||(void 0===e&&(e=n),a&&(clearTimeout(a),a=null),e?c():d())}}}},function(e,t,n){"use strict";(e.exports={}).getOption=function(e,t,n){var i=e[t];if(null==i&&void 0!==n)return n;return i}},function(e,t,n){"use strict";var i="_erd";function o(e){return e[i]}e.exports={initState:function(e){return e[i]={},o(e)},getState:o,cleanState:function(e){delete e[i]}}},function(e,t,n){"use strict";var i=n(16);e.exports=function(e){var t=(e=e||{}).reporter,n=e.batchProcessor,o=e.stateHandler.getState;if(!t)throw new Error("Missing required dependency: reporter.");function r(e){return o(e).object}return{makeDetectable:function(e,r,a){a||(a=r,r=e,e=null),(e=e||{}).debug,i.isIE(8)?a(r):function(e,r){var a="display: block; position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; padding: 0; margin: 0; opacity: 0; z-index: -1000; pointer-events: none;",s=!1,l=window.getComputedStyle(e),d=e.offsetWidth,c=e.offsetHeight;function u(){function n(){if("static"===l.position){e.style.position="relative";var n=function(e,t,n,i){var o=n[i];"auto"!==o&&"0"!==function(e){return e.replace(/[^-\d\.]/g,"")}(o)&&(e.warn("An element that is positioned static has style."+i+"="+o+" which is ignored due to the static positioning. The element will need to be positioned relative, so the style."+i+" will be set to 0. Element: ",t),t.style[i]=0)};n(t,e,l,"top"),n(t,e,l,"right"),n(t,e,l,"bottom"),n(t,e,l,"left")}}""!==l.position&&(n(),s=!0);var d=document.createElement("object");d.style.cssText=a,d.tabIndex=-1,d.type="text/html",d.setAttribute("aria-hidden","true"),d.onload=function(){s||n(),function e(t,n){t.contentDocument?n(t.contentDocument):setTimeout(function(){e(t,n)},100)}(this,function(t){r(e)})},i.isIE()||(d.data="about:blank"),e.appendChild(d),o(e).object=d,i.isIE()&&(d.data="about:blank")}o(e).startSize={width:d,height:c},n?n.add(u):u()}(r,a)},addListener:function(e,t){if(!r(e))throw new Error("Element is not detectable by this strategy.");function n(){t(e)}i.isIE(8)?(o(e).object={proxy:n},e.attachEvent("onresize",n)):r(e).contentDocument.defaultView.addEventListener("resize",n)},uninstall:function(e){i.isIE(8)?e.detachEvent("onresize",o(e).object.proxy):e.removeChild(r(e)),delete o(e).object}}}},function(e,t,n){"use strict";var i=n(15).forEach;e.exports=function(e){var t=(e=e||{}).reporter,n=e.batchProcessor,o=e.stateHandler.getState,r=(e.stateHandler.hasState,e.idHandler);if(!n)throw new Error("Missing required dependency: batchProcessor");if(!t)throw new Error("Missing required dependency: reporter.");var a=function(){var e=document.createElement("div");e.style.cssText="position: absolute; width: 1000px; height: 1000px; visibility: hidden; margin: 0; padding: 0;";var t=document.createElement("div");t.style.cssText="position: absolute; width: 500px; height: 500px; overflow: scroll; visibility: none; top: -1500px; left: -1500px; visibility: hidden; margin: 0; padding: 0;",t.appendChild(e),document.body.insertBefore(t,document.body.firstChild);var n=500-t.clientWidth,i=500-t.clientHeight;return document.body.removeChild(t),{width:n,height:i}}(),s="erd_scroll_detection_container";function l(e,n,i){if(e.addEventListener)e.addEventListener(n,i);else{if(!e.attachEvent)return t.error("[scroll] Don't know how to add event listeners.");e.attachEvent("on"+n,i)}}function d(e,n,i){if(e.removeEventListener)e.removeEventListener(n,i);else{if(!e.detachEvent)return t.error("[scroll] Don't know how to remove event listeners.");e.detachEvent("on"+n,i)}}function c(e){return o(e).container.childNodes[0].childNodes[0].childNodes[0]}function u(e){return o(e).container.childNodes[0].childNodes[0].childNodes[1]}return function(e,t){if(!document.getElementById(e)){var n=t+"_animation",i=t+"_animation_active",o="/* Created by the element-resize-detector library. */\n";o+="."+t+" > div::-webkit-scrollbar { display: none; }\n\n",o+="."+i+" { -webkit-animation-duration: 0.1s; animation-duration: 0.1s; -webkit-animation-name: "+n+"; animation-name: "+n+"; }\n",o+="@-webkit-keyframes "+n+" { 0% { opacity: 1; } 50% { opacity: 0; } 100% { opacity: 1; } }\n",function(t,n){n=n||function(e){document.head.appendChild(e)};var i=document.createElement("style");i.innerHTML=t,i.id=e,n(i)}(o+="@keyframes "+n+" { 0% { opacity: 1; } 50% { opacity: 0; } 100% { opacity: 1; } }")}}("erd_scroll_detection_scrollbar_style",s),{makeDetectable:function(e,d,f){function h(){if(e.debug){var n=Array.prototype.slice.call(arguments);if(n.unshift(r.get(d),"Scroll: "),t.log.apply)t.log.apply(null,n);else for(var i=0;i<n.length;i++)t.log(n[i])}}function g(e){var t=o(e).container.childNodes[0],n=window.getComputedStyle(t);return!n.width||-1===n.width.indexOf("px")}function v(){var e=window.getComputedStyle(d),t={};return t.position=e.position,t.width=d.offsetWidth,t.height=d.offsetHeight,t.top=e.top,t.right=e.right,t.bottom=e.bottom,t.left=e.left,t.widthCSS=e.width,t.heightCSS=e.height,t}function p(){if(h("storeStyle invoked."),o(d)){var e=v();o(d).style=e}else h("Aborting because element has been uninstalled")}function m(e,t,n){o(e).lastWidth=t,o(e).lastHeight=n}function b(){return 2*a.width+1}function y(){return 2*a.height+1}function w(e){return e+10+b()}function x(e){return e+10+y()}function E(e,t,n){var i=c(e),o=u(e),r=w(t),a=x(n),s=function(e){return 2*e+b()}(t),l=function(e){return 2*e+y()}(n);i.scrollLeft=r,i.scrollTop=a,o.scrollLeft=s,o.scrollTop=l}function S(){var e=o(d).container;if(!e){(e=document.createElement("div")).className=s,e.style.cssText="visibility: hidden; display: inline; width: 0px; height: 0px; z-index: -1; overflow: hidden; margin: 0; padding: 0;",o(d).container=e,function(e){e.className+=" "+s+"_animation_active"}(e),d.appendChild(e);var t=function(){o(d).onRendered&&o(d).onRendered()};l(e,"animationstart",t),o(d).onAnimationStart=t}return e}function A(){if(h("Injecting elements"),o(d)){!function(){var e=o(d).style;if("static"===e.position){d.style.position="relative";var n=function(e,t,n,i){var o=n[i];"auto"!==o&&"0"!==function(e){return e.replace(/[^-\d\.]/g,"")}(o)&&(e.warn("An element that is positioned static has style."+i+"="+o+" which is ignored due to the static positioning. The element will need to be positioned relative, so the style."+i+" will be set to 0. Element: ",t),t.style[i]=0)};n(t,d,e,"top"),n(t,d,e,"right"),n(t,d,e,"bottom"),n(t,d,e,"left")}}();var e=o(d).container;e||(e=S());var n,i,r,c,u=a.width,f=a.height,g="position: absolute; flex: none; overflow: hidden; z-index: -1; visibility: hidden; left: "+(n=(n=-(1+u))?n+"px":"0")+"; top: "+(i=(i=-(1+f))?i+"px":"0")+"; right: "+(c=(c=-u)?c+"px":"0")+"; bottom: "+(r=(r=-f)?r+"px":"0")+";",v=document.createElement("div"),p=document.createElement("div"),m=document.createElement("div"),b=document.createElement("div"),y=document.createElement("div"),w=document.createElement("div");v.dir="ltr",v.style.cssText="position: absolute; flex: none; overflow: hidden; z-index: -1; visibility: hidden; width: 100%; height: 100%; left: 0px; top: 0px;",v.className=s,p.className=s,p.style.cssText=g,m.style.cssText="position: absolute; flex: none; overflow: scroll; z-index: -1; visibility: hidden; width: 100%; height: 100%;",b.style.cssText="position: absolute; left: 0; top: 0;",y.style.cssText="position: absolute; flex: none; overflow: scroll; z-index: -1; visibility: hidden; width: 100%; height: 100%;",w.style.cssText="position: absolute; width: 200%; height: 200%;",m.appendChild(b),y.appendChild(w),p.appendChild(m),p.appendChild(y),v.appendChild(p),e.appendChild(v),l(m,"scroll",x),l(y,"scroll",E),o(d).onExpandScroll=x,o(d).onShrinkScroll=E}else h("Aborting because element has been uninstalled");function x(){o(d).onExpand&&o(d).onExpand()}function E(){o(d).onShrink&&o(d).onShrink()}}function k(){function a(e,t,n){var i=function(e){return c(e).childNodes[0]}(e),o=w(t),r=x(n);i.style.width=o+"px",i.style.height=r+"px"}function s(i){var s=d.offsetWidth,c=d.offsetHeight;h("Storing current size",s,c),m(d,s,c),n.add(0,function(){if(o(d))if(l()){if(e.debug){var n=d.offsetWidth,i=d.offsetHeight;n===s&&i===c||t.warn(r.get(d),"Scroll: Size changed before updating detector elements.")}a(d,s,c)}else h("Aborting because element container has not been initialized");else h("Aborting because element has been uninstalled")}),n.add(1,function(){o(d)?l()?E(d,s,c):h("Aborting because element container has not been initialized"):h("Aborting because element has been uninstalled")}),i&&n.add(2,function(){o(d)?l()?i():h("Aborting because element container has not been initialized"):h("Aborting because element has been uninstalled")})}function l(){return!!o(d).container}function f(){h("notifyListenersIfNeeded invoked");var e=o(d);return void 0===o(d).lastNotifiedWidth&&e.lastWidth===e.startSize.width&&e.lastHeight===e.startSize.height?h("Not notifying: Size is the same as the start size, and there has been no notification yet."):e.lastWidth===e.lastNotifiedWidth&&e.lastHeight===e.lastNotifiedHeight?h("Not notifying: Size already notified"):(h("Current size not notified, notifying..."),e.lastNotifiedWidth=e.lastWidth,e.lastNotifiedHeight=e.lastHeight,void i(o(d).listeners,function(e){e(d)}))}function v(){if(h("Scroll detected."),g(d))h("Scroll event fired while unrendered. Ignoring...");else{var e=d.offsetWidth,t=d.offsetHeight;e!==o(d).lastWidth||t!==o(d).lastHeight?(h("Element size changed."),s(f)):h("Element size has not changed ("+e+"x"+t+").")}}if(h("registerListenersAndPositionElements invoked."),o(d)){o(d).onRendered=function(){if(h("startanimation triggered."),g(d))h("Ignoring since element is still unrendered...");else{h("Element rendered.");var e=c(d),t=u(d);0!==e.scrollLeft&&0!==e.scrollTop&&0!==t.scrollLeft&&0!==t.scrollTop||(h("Scrollbars out of sync. Updating detector elements..."),s(f))}},o(d).onExpand=v,o(d).onShrink=v;var p=o(d).style;a(d,p.width,p.height)}else h("Aborting because element has been uninstalled")}function z(){if(h("finalizeDomMutation invoked."),o(d)){var e=o(d).style;m(d,e.width,e.height),E(d,e.width,e.height)}else h("Aborting because element has been uninstalled")}function H(){f(d)}function L(){var e;h("Installing..."),o(d).listeners=[],e=v(),o(d).startSize={width:e.width,height:e.height},h("Element start size",o(d).startSize),n.add(0,p),n.add(1,A),n.add(2,k),n.add(3,z),n.add(4,H)}f||(f=d,d=e,e=null),e=e||{},h("Making detectable..."),function(e){return!function(e){return e===e.ownerDocument.body||e.ownerDocument.body.contains(e)}(e)||null===window.getComputedStyle(e)}(d)?(h("Element is detached"),S(),h("Waiting until element is attached..."),o(d).onRendered=function(){h("Element is now attached"),L()}):L()},addListener:function(e,t){if(!o(e).listeners.push)throw new Error("Cannot add listener to an element that is not detectable.");o(e).listeners.push(t)},uninstall:function(e){var t=o(e);t&&(t.onExpandScroll&&d(c(e),"scroll",t.onExpandScroll),t.onShrinkScroll&&d(u(e),"scroll",t.onShrinkScroll),t.onAnimationStart&&d(t.container,"animationstart",t.onAnimationStart),t.container&&e.removeChild(t.container))}}}}]]);