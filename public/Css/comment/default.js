/*!2015-11-17 15:29 */for(var html="<a target=_blank href='{{click}}'><img src='{{img}}' border=0 /></a>",reg=/{{(\w*?)}}/gi,str="",i=0;i<creativeData.items.length;i++)str+=html.replace(reg,function(a,b){return creativeData.items[i][b]});document.write(str);