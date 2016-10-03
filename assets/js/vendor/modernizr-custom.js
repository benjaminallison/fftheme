/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-bgsizecover-cssvhunit-cssvwunit-objectfit-setclasses !*/
!function(e,n,t){function r(e,n){return typeof e===n}function i(){var e,n,t,i,o,s,a;for(var l in C)if(C.hasOwnProperty(l)){if(e=[],n=C[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(i=r(n.fn,"function")?n.fn():n.fn,o=0;o<e.length;o++)s=e[o],a=s.split("."),1===a.length?Modernizr[a[0]]=i:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=i),y.push((i?"":"no-")+a.join("-"))}}function o(e){var n=w.className,t=Modernizr._config.classPrefix||"";if(_&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),_?w.className.baseVal=n:w.className=n)}function s(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function a(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):_?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function l(){var e=n.body;return e||(e=a(_?"svg":"body"),e.fake=!0),e}function f(e,t,r,i){var o,s,f,u,d="modernizr",p=a("div"),c=l();if(parseInt(r,10))for(;r--;)f=a("div"),f.id=i?i[r]:d+(r+1),p.appendChild(f);return o=a("style"),o.type="text/css",o.id="s"+d,(c.fake?c:p).appendChild(o),c.appendChild(p),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(n.createTextNode(e)),p.id=d,c.fake&&(c.style.background="",c.style.overflow="hidden",u=w.style.overflow,w.style.overflow="hidden",w.appendChild(c)),s=t(p,e),c.fake?(c.parentNode.removeChild(c),w.style.overflow=u,w.offsetHeight):p.parentNode.removeChild(p),!!s}function u(e,n){return!!~(""+e).indexOf(n)}function d(e,n){return function(){return e.apply(n,arguments)}}function p(e,n,t){var i;for(var o in e)if(e[o]in n)return t===!1?e[o]:(i=n[e[o]],r(i,"function")?d(i,t||n):i);return!1}function c(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(n,r){var i=n.length;if("CSS"in e&&"supports"in e.CSS){for(;i--;)if(e.CSS.supports(c(n[i]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];i--;)o.push("("+c(n[i])+":"+r+")");return o=o.join(" or "),f("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return t}function v(e,n,i,o){function l(){d&&(delete P.style,delete P.modElem)}if(o=r(o,"undefined")?!1:o,!r(i,"undefined")){var f=m(e,i);if(!r(f,"undefined"))return f}for(var d,p,c,v,h,g=["modernizr","tspan","samp"];!P.style&&g.length;)d=!0,P.modElem=a(g.shift()),P.style=P.modElem.style;for(c=e.length,p=0;c>p;p++)if(v=e[p],h=P.style[v],u(v,"-")&&(v=s(v)),P.style[v]!==t){if(o||r(i,"undefined"))return l(),"pfx"==n?v:!0;try{P.style[v]=i}catch(y){}if(P.style[v]!=h)return l(),"pfx"==n?v:!0}return l(),!1}function h(e,n,t,i,o){var s=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+z.join(s+" ")+s).split(" ");return r(n,"string")||r(n,"undefined")?v(a,n,i,o):(a=(e+" "+T.join(s+" ")+s).split(" "),p(a,n,t))}function g(e,n,r){return h(e,t,t,n,r)}var y=[],C=[],S={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){C.push({name:e,fn:n,options:t})},addAsyncTest:function(e){C.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=S,Modernizr=new Modernizr;var w=n.documentElement,_="svg"===w.nodeName.toLowerCase(),x=S.testStyles=f;x("#modernizr { height: 50vh; }",function(n){var t=parseInt(e.innerHeight/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(n,null):n.currentStyle).height,10);Modernizr.addTest("cssvhunit",r==t)}),x("#modernizr { width: 50vw; }",function(n){var t=parseInt(e.innerWidth/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(n,null):n.currentStyle).width,10);Modernizr.addTest("cssvwunit",r==t)});var b="Moz O ms Webkit",z=S._config.usePrefixes?b.split(" "):[];S._cssomPrefixes=z;var E=function(n){var r,i=prefixes.length,o=e.CSSRule;if("undefined"==typeof o)return t;if(!n)return!1;if(n=n.replace(/^@/,""),r=n.replace(/-/g,"_").toUpperCase()+"_RULE",r in o)return"@"+n;for(var s=0;i>s;s++){var a=prefixes[s],l=a.toUpperCase()+"_"+r;if(l in o)return"@-"+a.toLowerCase()+"-"+n}return!1};S.atRule=E;var T=S._config.usePrefixes?b.toLowerCase().split(" "):[];S._domPrefixes=T;var j={elem:a("modernizr")};Modernizr._q.push(function(){delete j.elem});var P={style:j.elem.style};Modernizr._q.unshift(function(){delete P.style}),S.testAllProps=h;var N=S.prefixed=function(e,n,t){return 0===e.indexOf("@")?E(e):(-1!=e.indexOf("-")&&(e=s(e)),n?h(e,n,t):h(e,"pfx"))};Modernizr.addTest("objectfit",!!N("objectFit"),{aliases:["object-fit"]}),S.testAllProps=g,Modernizr.addTest("bgsizecover",g("backgroundSize","cover")),i(),o(y),delete S.addTest,delete S.addAsyncTest;for(var k=0;k<Modernizr._q.length;k++)Modernizr._q[k]();e.Modernizr=Modernizr}(window,document);