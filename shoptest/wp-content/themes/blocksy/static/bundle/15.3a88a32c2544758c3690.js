(window.blocksyJsonP=window.blocksyJsonP||[]).push([[15],{56:function(t,n,e){"use strict";function i(t){return function(t){if(Array.isArray(t)){for(var n=0,e=new Array(t.length);n<t.length;n++)e[n]=t[n];return e}}(t)||function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}e.r(n),e.d(n,"mount",function(){return o});var r=function t(n){n.classList.contains("active")?function(t,n){var e=t.querySelector("ul");requestAnimationFrame(function(){var t=e.getBoundingClientRect().height;e.style.height="".concat(t,"px"),e.classList.add("is-animating"),requestAnimationFrame(function(){e.style.height="0px",a(e,function(){e.classList.remove("is-animating"),e.removeAttribute("style"),n()})})})}(n,function(){n.classList.toggle("active"),i(n.querySelectorAll(".menu-item-has-children.active")).map(function(t){return t.classList.remove("active")})}):(i(n.parentNode.children).map(function(n){return n.classList.contains("active")&&t(n)}),n.classList.toggle("active"),function(t){var n=t.querySelector("ul");requestAnimationFrame(function(){var t=n.getBoundingClientRect().height;n.style.height="0px",n.classList.add("is-animating"),requestAnimationFrame(function(){n.style.height="".concat(t,"px"),a(n,function(){n.classList.remove("is-animating"),n.removeAttribute("style")})})})}(n))},o=function(t){t.addEventListener("click",function(n){n.preventDefault(),n.stopPropagation(),r(t.closest(".menu-item-has-children"))})};function a(t,n){var e=function(){t.removeEventListener("transitionend",i),n()},i=function(n){n.target===t&&e()};t.addEventListener("transitionend",i)}}}]);