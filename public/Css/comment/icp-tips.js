!function(){function e(e){return"[object Function]"===Object.prototype.toString.call(e)}function n(n,t,i){if(o[n])throw new Error("Module "+n+" has been defined already.");e(t)&&(i=t),o[n]={factory:i,inited:!1,exports:null}}function t(n){var t,a,r,c;if(t=o[n],a={},r={exports:{}},!e(t.factory))throw new Error("Module "+n+" has no factory.");if(c=t.factory.call(void 0,i,a,r),void 0!==c)t.exports=c;else if(r.hasOwnProperty("exports")&&"object"==typeof r.exports&&r.exports instanceof Object==!0){var p,s=!1;for(p in r.exports)r.exports.hasOwnProperty(p)&&(s=!0);s===!1?t.exports=a:t.exports=r.exports}else t.exports=r.exports;t.inited=!0}function i(e){var n;if(n=o[e],!n)throw new Error("Module "+e+" is not defined.");return n.inited===!1&&t(e),n.exports}var o={};n("C:/Users/yuchenzhang/AppData/Roaming/npm/node_modules/mdevp/cache/www/icp-tips/icp-tips.js",function(e,n,t){window.changyan.api.ready(function(n){var t=n.util.jquery,i=n.util._,o=e("C:/Users/yuchenzhang/AppData/Roaming/npm/node_modules/mdevp/cache/www/icp-tips/white-list.js"),a=t('<div node-type="is-icp" style="width:100%;text-align:center;font-size:14px;line-height:20px;background:#fef2e2;color:#f16840;font-family:\'Microsoft YaHei\';margin:10px 0;padding: 10px 0;"></div>'),r={11:"网站未在畅言补全备案信息，当前无法使用评论服务，请联系网站管理员",3:"该评论已关闭"},c=n.getConfig("isvAuditMode");!function(){if(i.has(r,c))return a.html(r[c]),t("#SOHUCS").html(a),void(window.changyan.icp="break");if("break"===o.whiteList()){var e='<div node-type="invalidity-code" class="invalidity" style="width:100%;height:33px;text-align:center;font-size:14px;line-height:33px;background:#fef2e2;color:#f16840;font-family:\'Microsoft YaHei\';margin:10px 0;">您的畅言代码为无效代码，请前往<a href="http://changyan.kuaizhan.com/" target="_blank">畅言官网</a>重新注册</div>';return t("#SOHUCS").html(e),void(window.changyan.icp="break")}window.changyan.icp="continue"}()})}),n("C:/Users/yuchenzhang/AppData/Roaming/npm/node_modules/mdevp/cache/www/icp-tips/white-list.js",function(e,n,t){window.changyan.api.ready(function(e){var t=(e.util.jquery,e.util._),i=function(){function n(e){var n="null";return n="http:"===e.split("//")[0]||"https:"===e.split("//")[0]?e.split("//")[1].split("/")[0].split(":")[0]:e.split("/")[0].split(":")[0]}function i(e){var n=/([a-z0-9][a-z0-9\-]*?\.(?:com|cn|net|org|xyz|wang|top|ren|club|pub|rocks|band|market|software|social|lawyer|engineer|me|bizgov|info|la|cc|co|name|tv|mobi|asia|tel|so|tw|hk|im|biz)(?:\.(?:cn|jp))?)$/;return e.match(n)?1:0}var o=e.getBeConfig("domain_whitelist"),a=location.href,r=o;r&&""!==r&&(r+=",changyan.kuaizhan.com,changyan.sohu.com");var c=n(decodeURIComponent(a)),p=r?r.split(","):[],s=["com","cn","net","org","xyz","wang","top","ren","club","pub","rocks","band","market","software","social","lawyer","engineer","me","bizgov","info","la","cc","co","name","tv","mobi","asia","tel","so","tw","hk","im","biz"];if(p.length>0){for(var l=[],h=0;h<p.length;h++)1===i(n(p[h]))&&l.push(p[h]);for(var d=0,f=0;f<l.length;f++)if(""===l[f])d-=1;else{var u,g=n(l[f]).split(".");u=t.indexOf(s,g[g.length-2])>=0?g[g.length-3]+"."+g[g.length-2]+"."+g[g.length-1]:g[g.length-2]+"."+g[g.length-1],d+=c.indexOf(u)}if(-1*l.length===d&&0!==l.length)return"break"}};n.whiteList=i})}),t("C:/Users/yuchenzhang/AppData/Roaming/npm/node_modules/mdevp/cache/www/icp-tips/icp-tips.js")}();