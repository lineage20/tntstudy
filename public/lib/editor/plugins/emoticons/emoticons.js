KindEditor.plugin("emoticons",function(a){var b=this,c="emoticons",f=(b.emoticonsPath||b.pluginsPath+"emoticons/images/"),e=b.allowPreviewEmoticons===undefined?true:b.allowPreviewEmoticons,d=1;b.clickToolbar(c,function(){var p=5,q=9,y=135,h=0,l=p*q,r=Math.ceil(y/l),x=Math.floor(q/2),k=a('<div class="ke-plugin-emoticons"></div>'),s=[],j=b.createMenu({name:c,beforeRemove:function(){u()}});j.div.append(k);var t,m;if(e){t=a('<div class="ke-preview"></div>').css("right",0);m=a('<img class="ke-preview-img" src="'+f+h+'.gif" />');k.append(t);t.append(m)}function w(z,B,A){if(t){z.mouseover(function(){if(B>x){t.css("left",0);t.css("right","")}else{t.css("left","");t.css("right",0)}m.attr("src",f+A+".gif");a(this).addClass("ke-on")})}else{z.mouseover(function(){a(this).addClass("ke-on")})}z.mouseout(function(){a(this).removeClass("ke-on")});z.click(function(C){b.insertHtml('<img src="'+f+A+'.gif" border="0" alt="" />').hideMenu().focus();C.stop()})}function n(D,z){var G=document.createElement("table");z.append(G);if(t){a(G).mouseover(function(){t.show("block")});a(G).mouseout(function(){t.hide()});s.push(a(G))}G.className="ke-table";G.cellPadding=0;G.cellSpacing=0;G.border=0;var C=(D-1)*l+h;for(var B=0;B<p;B++){var H=G.insertRow(B);for(var A=0;A<q;A++){var F=a(H.insertCell(A));F.addClass("ke-cell");w(F,A,C);var E=a('<span class="ke-img"></span>').css("background-position","-"+(24*C)+"px 0px").css("background-image","url("+f+"static.gif)");F.append(E);s.push(F);C++}}return G}var v=n(d,k);function u(){a.each(s,function(){this.unbind()})}var i;function g(z,A){z.click(function(B){u();v.parentNode.removeChild(v);i.remove();v=n(A,k);o(A);d=A;B.stop()})}function o(A){i=a('<div class="ke-page"></div>');k.append(i);for(var B=1;B<=r;B++){if(A!==B){var z=a('<a href="javascript:;">['+B+"]</a>");g(z,B);i.append(z);s.push(z)}else{i.append(a("@["+B+"]"))}i.append(a("@&nbsp;"))}}o(d)})});