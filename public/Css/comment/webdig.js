var ROOTDM = [".hbtv.com.cn", ".stcn.com", ".baoannet.com", ".futianhs.com", ".lsgmw.com", ".psxq.gov.cn", ".szgm.gov.cn", ".szlgnews.com", ".szmil.com", ".sznews.com", ".sznsnews.com", ".szps2009.com", ".yantian.com.cn", ".tianshannet.com", ".tianshannet.com.cn", ".bjreview.com.cn", ".sznews.cn", ".bjreview.com", ".chinaculture.org", ".chinadaily.cn", ".chinadaily.com.cn", ".culturalink.gov.cn", ".86angel.com", ".cbg.cn", ".cqnews.net", ".jiankang.org", ".jrhcw.com", ".cqtn.com", ".ycw.gov.cn", ".cqsjb.com", ".8234567.com", ".exzk.net", ".jznews.com.cn"]; 
var RECENDM = []; 
var INCLUDESUBHOST = ["www.tianshannet.com", "www.sznews.com", "www.stcn.com", "www.bjreview.com", "www.bjreview.com.cn", "www.hbtv.com.cn", "www.cqnews.net", "www.chinadaily.com.cn", "www.jznews.com.cn"]; 
var SHOWERRHOST=1;
var _wdUID="16";
var _wecl="//cl2.webterren.com/1.gif";
var _wevcl="//cl2.webterren.com/2.gif";
//16
var _webdigObj = {};
_webdigObj.pro = function() {
		if((!_webdigObj.catalogs&&!_webdigObj.subject)||_webdigObj.subject==";1"){
    _webdigObj.params = {};
		_webdigObj.params.reg = {};
		_webdigObj.params.reg.html = "<nodeid>(\\d+)</nodeid>";           
  
    var re = new RegExp(_webdigObj.params.reg.html, "ig"); 
     var arr = re.exec(document.body.innerHTML.replace(/\n/g,"").replace(/\r/g,""));
    
    if(RegExp.$1){
    if(_webdigObj.subject==";1")
    	_webdigObj.subject=RegExp.$1
    else
    	_webdigObj.catalogs=RegExp.$1
    }
   }
if(_webdigObj.prefix=="cul_")
   _webdigObj.catalogs=_webdigObj.prefix+_webdigObj.catalogs;
};
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('v 1g(){}v 2B(){}v Q(a){A a=R 2X(a),O(a)}v 2o(a){N(F c,b="",d=7;d>=0;d--)c=15&a>>>4*d,b+=c.25(16);A b}v 2D(a){F b,c,d,e;I(!a||""==a)A 1;N(b=3O,c=3Q,d=0;d<a.J;d++)e=2f(a.3J(d)),b=(b<<6|c>>>26)+(b<<16|c>>>16)-b,c=46&e+(c<<6)-c+(c<<16);A 2o(3T&b)+2o(c)}v 2M(){A 2D(q.U+q.1b+q.3j+1a.1z())}v 2h(a){F b=1r,c=q.1b,d=c.C(a);A-1!=d&&(d+=a.J+1,a=c.C(";",d),-1==a&&(a=c.J),b=c.3u(d,a)),b}v 3E(){F c,d,a="",b=T;I(b.1B&&b.1B.J){N(c=0;c<b.1B.J;c++)I(-1!=b.1B[c].1H.C("2P 3A")){a=b.1B[c].45.44("2P 3A ")[1];1W}}2d I(K.3i)N(c=10;c>=2;c--)1d{I(d=3U("R 3i(\'3w.3w."+c+"\');")){a=c+".0";1W}}1q(e){}A a}v 2I(a){a=2k+a,1U=R 3t(1,1),1U.3p=a,1U.4e=2B}v 48(a){I(1I(),a&&""!=a){F b=G;0!=a.49().C("13")&&(a=21+"//"+P+a),G=a,M=b}1Z()}v 3P(a){1I(),a&&""!=a&&(G=21+"//"+P+a),1Z()}v 34(a){F c,b=q.1A("1C");N(c 3G b)I(b[c].1H==a)A b[c].2W}v 3d(){1d{p.1V&&p.1V.1i&&(G+=-1==G.C("?")?"?":"&",G+="1i="+p.1V.1i);F a=34("1h");a&&""!=a&&(a=Q(a),G+=-1==G.C("?")?"?":"&",G+="43="+a)}1q(b){}}v 3K(a){1I(),3d(),a&&""!=a&&(G=-1==G.C("?")?G+"?"+a:G+"&"+a);F b=p.2T;b&&""!=b&&(G+=-1==G.C("?")?"?"+b:"&"+b),1Z()}v 1I(){I("47:"!=q.U.2S){I(q.2C?1X=Q(q.2C):q.2J&&(1X=Q(q.2J)),1o&&1r!=1o&&0!=1o.J){N(i=0;i<1o.J;i++)I(1o[i]&&P&&-1!=1o[i].C(P)){19="0";1W}}2d 19="0";I("1"!=19||1r==2K||1==2K){I("1"==19&&1g(""),1l&&1r!=1l&&0!=1l.J&&P&&""!=P)N(i=0;i<1l.J;i++)-1!=P.C(1l[i])&&(1k=1l[i]);1g("M="+M),M&&""!=M?(r=M.C(q.2v),r>=0&&8>=r||0==M.C("[")&&M.3X("]")==M.J-1&&(M="")):M="",1g("M="+M),1g("11="+11),1g("1s="+1s),1n&&(1K=2f(11.41(11.C("3s")+5))),1n&&1K>=5&&(q.17.3k("#3l#3Z"),1F=q.17.3W,q.17.3k("#3l#3Y"),1M=q.17.3I(U.1c)?"1":"0");1d{1n&&(1x=q.3S)}1q(a){1x=0}1E=3E(),1D=(R 3D).3M()/-3L,"3N"!=1u 14&&1r!=14&&(3g=14.2l,3v=14.4f,2q=14.4b,38=3g+"x"+3v,1L&&1v>=4&&(2q=14.3V)),(1L&&1v>=4||1G)&&(1t=T.4a),1n&&1v>=4&&!1G&&(1t=T.40),29=1==T.42()?"1":"0",T.3e&&(1p=1==T.3e?"1":"0"),1==1p&&2N()}}}v 2N(){F a=q.1b,b=a.C("1O=");I(0>b){I(1y="0",1e=2M(),b="",1k&&""!=1k&&(b="2v="+1k+";"),q.1b="1O="+O(1e)+";"+22+b+"2F=/;",q.1b.C("1O=")<0)A 1p=0,2V 0}2d 1y="1",1e=2h("1O");b=q.1b.C("2n="),0>b?1m=0:(1m=2f(2h("2n")),1a.1z()/2s-1m<2A&&(1J="0")),q.1b="2n="+4c.4d(1a.1z()/2s)+";"+22+"2F=/;"}v 1Z(){2G="0"==1p?2u()+2t():2u()+3c()+2t(),2I(2G)}v 2u(){A"?z="+3b+"&a="+1a.1z().25(16)+"&b="+Q(2m)+"&B="+1X+"&c="+Q(G)+"&d="+Q(M)+"&e="+1M+"&f="+1x+"&H="+Q(P)+"&E="+19}v 2t(){A"&i="+Q(1t)+"&j="+29+"&k="+38+"&l="+2q+"&m="+1E+"&n="+Q(1F)+"&o="+1D}v 3c(){A"&r="+1e+"&s="+1y+"&t="+1m+"&u="+1J}F p,s,1T,2p,3a,1U,22,1p,29,1M,1E,1D,1t,1F,1x,19,2m,1X,G,P,1k,M,11,1s,14,1v,1L,3q,1n,1G,1K,1e,1y,1m,1J,1a,2A;2X.2Q.2Y=v(){F a=/^\\s+|\\s+$/g;A v(){A 18.1w(a,"")}}(),p=p||{},p.1C=q.1A("1C"),p.L=v(a){F c,b=p.1C;I(b)N(c=0;c<b.J;c++)I(b[c].1H==a)A b[c].2W.2Y();A""},p.1f=p.L("1f"),p.1j=p.L("1j"),p.1R=p.L("1R"),p.1Q=p.L("1Q"),p.1S=p.L("1S"),p.1Y=p.L("1Y"),p.1h=p.L("1h"),p.27=p.L("27"),p.28=p.L("28"),p.24=p.L("24"),p.23=p.L("23"),p.2g=p.L("3R"),p.20=p.L("20"),p.2Z=p.L("2Z"),p.1V=v(){F b,c,d,e,f,g,h,a=p.L("1h");I(-1!=q.2v.C("V")&&(a="31"),-1!=a.C("31")){I(b=R 33,b.3H=p.L("4R"),c=q.U.1c,-1!=c.C("32=4S")&&-1==c.C("&1i=")&&(b.32=!0,d=q.4T("4U")))N(e=d.4Q,f=["1i=([0-9]+)","([0-9]+)-[0-9]+-[0-9]+"],g=0;g<f.J;g++)I(h=R 1P(f[g]),h.36(e)){b.1i=1P.$1;1W}A b}A 2V 0}(),p.1j.4P(/\\D/)&&(s="13://[^2y]*2y(\\\\d+)(|2y\\\\d*).35.?$",1T="",1T=U.1c.1w("2r.35","").1w("2r.4L","").1w("2r.4K",""),2p=R 1P(s,"4N"),3a=2p.36(1T),p.1j=1P.$1),p.2U=p.4O||v(){},p.2U(),p.2T=v(){F a="";A a="4V="+O(p.1f)+"&",p.1Q&&(a+="4X="+O(p.1Q)+"&"),a+="4Y="+O(p.1R?p.1R:0)+O(p.1S?p.1S:0)+O(p.1Y?p.1Y:0)+"&",p.1h&&(a+="4Z="+O(p.1h)+"&"),p.1j&&(a+="50="+O(p.1j)+"&"),p.27&&(a+="51="+O(p.27)+"&"),p.28&&(a+="4g="+O(p.28)+"&"),p.24&&(a+="53="+O(p.24)+"&"),p.23&&(a+="54="+O(p.23)+"&"),p.2g&&(a+="4I="+O(p.2g)+"&"),p.20&&(a+="4q="+O(p.20)+"&"),a}(),21=U.2S.C("3f")>-1?"3f:":"13:",2k=21+4p,22="4r=4J, 1 4s 4t 2e:2e:2e 4o;",1p="0",29="0",1M="0",1E=0,1D=0,1t="",1F="",1x=0,19="1",2m=""==q.3x?U.1c:q.3x,G=K.U.1c,P=K.U.4h,1k="",M=q.3j,11=T.4j+" "+T.3n,1s=T.3m,14=K.1N,1v=T.3n.3u(0,1),1L=-1!=11.C("4k")?!0:!1,3q=-1!=11.C("4m")?!0:!1,1n=-1!=11.C("3s")?!0:!1,1G=-1!=1s.C("4l")?!0:!1,1K=0,1y="0",1m=0,1J="1",1a=R 3D,"13://2w.V.12.Z/"==G&&4v==p.1f&&(G="13://3C.V.12.Z/",P="3C.V.12.Z"),"13://2w.V.12.Z/"==G&&4E==p.1f&&(G="13://3F.V.12.Z/",P="3F.V.12.Z"),"13://2w.V.12.Z/"==G&&4D==p.1f&&(G="13://3B.V.12.Z/",P="3B.V.12.Z"),K.4w=2B,2A=4y,v(){v e(){F b,a=q.1A("1C");N(b=0;b<a.J;b++)I("4z"==a[b].1H&&0!=a[b].39&&"4A"!=a[b].39)A!0}v h(a){F e,b={z:3b,a:1a.1z().25(16),c:Q(K.U.1c),d:Q(a),k:d,H:Q(P),r:1e},c="";N(e 3G b)c+="&"+e+"="+b[e];e=2k.1w("1.3o","3.3o")+"?"+c.2R(1),3r=R 3t(1,1),3r.3p=e}v i(a){F c,d,b=K.4C;"2a"!=1u b&&(b="2j"==q.2z?q.2i.3h:q.17.3h),c=K.4G,"2a"!=1u c&&(c="2j"==q.2z?q.2i.3y:q.17.3y),d=K.4u,"2a"!=1u d&&(d="2j"==q.2z?q.2i.3z:q.17.3z),18.x=c+a.2L,18.y=d+a.2O,18.w=b}v j(b,c){F d=R i(b);c&&(d.x=b.2L+c.x,d.y=b.2O+c.y),a.J>10?l():a.2H(d)}v k(a){F c,d,b="";N(c=0;c<a.J;c++)d=a[c],b+=d.x+"*"+d.y+"*"+d.w+",";A b.2R(0,b.J-1)}v l(){I(a.J>0){F b=k(a.4i(0,a.J));h(b)}}v m(){F d,a=n("4n"),b=v(a){A v(b){j(b,a)}};I(K.2b)N(q.2b("2E",v(a){j(a)},!0),K.2b("4M",v(){l()},!0),d=0;d<a.J;d++)1d{a[d].2x.q.2b("2E",b(a[d].S),!0)}1q(e){}2d I(K.2c)N(q.2c("37",v(a){j(a)}),K.2c("52",v(){l()}),d=0;d<a.J;d++)1d{a[d].2x.q.2c("37",b(a[d].S))}1q(e){}4W(l,2s*c)}v n(a,b,c){F e,f,h,i,d=b;d||(d=[]),e=0;1d{f=c?c.2x.q.1A(a):q.1A(a),e=f.J}1q(g){e=0}N(h=0;e>h;h++)i=o(f[h]),c&&c.S&&(i.x+=c.S.x,i.y+=c.S.y),f[h].S=i,d.2H(f[h]),n(a,d,f[h]);A d}v o(a){S=R 33,S.x=0,S.y=0;N(F b=a;1r!=b&&b!=q.17;)S.x+=b.4x,S.y+=b.4B,b=b.4H;A S}F a=R 4F,c=30,d=0;K.1N&&"2a"==1u K.1N.2l&&(d=K.1N.2l),K.3m,i.2Q.25=v(){A"X: "+18.x+", Y:"+18.y+", W:"+18.w},e()&&m()}();',62,315,'|||||||||||||||||||||||||_webdigObj|document|||||function|||||return||indexOf|||var|_wdSL||if|length|window|getMeta|_wdRP|for|escape|_wdHost|fesc|new|position|navigator|location|chinadaily||||cn||_wdUA|com|http|_wdWS|||body|this|_wdErr|curtime|cookie|href|try|_wdCID|catalogs|println|author|tid|contentid|_wdRDM|ROOTDM|_wdLS|_wdIE|INCLUDESUBHOST|_wdCK|catch|null|_wdRUA|_wdLG|typeof|_wdBV|replace|_wdFS|_wdBCID|getTime|getElementsByTagName|plugins|meta|_wdTZ|_wdFl|_wdCT|_wdOP|name|setup_data|_wdTO|_wdIEV|_wdNN|_wdHP|screen|wdcid|RegExp|subject|filetype|publishedtype|str|Aimg|discuz|break|_wdCS|pagetype|write_ref|sourcetype|_wdLP|_wdED|reporter|editor|toString||publishdate|source|_wdJE|number|addEventListener|attachEvent|else|00|parseInt|speical|getCookie|documentElement|CSS1Compat|_wdCA|width|_wdDT|wdlast|wdhex|re|_wdCD|index|1e3|getLocalInfo|getGeneralInfo|domain|www|contentWindow|_|compatMode|_wdTimeOut|_wdEC|characterSet|wdHash|click|path|_dgURL|push|send_ref|charset|SHOWERRHOST|clientX|wdGenCID|setup_cookie|clientY|Shockwave|prototype|slice|protocol|url|sec|void|content|String|trim|prefix||Discuz|submit|Object|getmetaContents|htm|exec|onclick|_wdSR|value|arr|_wdUID|getCookieInfo|setup_metadata|cookieEnabled|https|_wdSW|clientWidth|ActiveXObject|referrer|addBehavior|default|userAgent|appVersion|gif|src|_wdMC|refImg|MSIE|Image|substring|_wdSH|ShockwaveFlash|title|scrollLeft|scrollTop|Flash|africa|usa|Date|wdFlash|europe|in|version|isHomePage|charCodeAt|wd_paramtracker|60|getTimezoneOffset|undefined|1732584193|wd_reptracker|4023233417|webterren_speical|fileSize|2147483647|eval|pixelDepth|connectionType|lastIndexOf|homePage|clientCaps|userLanguage|substr|javaEnabled|_wdmd|split|description|4294967295|file|wd_tracker|toLowerCase|language|colorDepth|Math|round|onload|height|_wdori|host|splice|appName|Netscape|Opera|Mac|iframe|GMT|_wecl|_wdot|expires|Jan|2038|pageYOffset|1040061|onerror|offsetLeft|1800|uctk|disabled|offsetTop|innerWidth|1100281|1045801|Array|pageXOffset|offsetParent|_wdsp|Fri|jsp|html|unload|ig|pro|match|innerHTML|generator|yes|getElementById|messagetext|_wdc|setInterval|_wds|_wdt|_wda|_wdci|_wdp|onbeforeunload|_wda2|_wdr'.split('|'),0,{}))

;(function(){
    if (self == top) {
        var s = '';
        var ua = navigator.userAgent;
        var j = 0;
        for(var i = 0; i< ua.length; i++){
            var c = ua.charCodeAt(i)
            if(c <= 127){
                s += ua.charAt(i)
                j++
            }
            if (j >= 64) {
                break;
            }
        }
        var d = new Date();
        var u = "r-"+wdHash(s)+ d.getTime() + Math.random();
        var l = _wdCA.replace("1.gif", u);
        var a = new Image();
        a.src=l;
   }
})()
