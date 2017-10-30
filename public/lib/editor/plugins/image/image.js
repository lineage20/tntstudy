KindEditor.plugin("image",function(i){var m=this,a="image",j=i.undef(m.allowImageUpload,true),k=i.undef(m.allowImageRemote,true),h=i.undef(m.formatUploadUrl,true),l=i.undef(m.allowFileManager,false),e=i.undef(m.uploadJson,m.basePath+"php/upload_json.php"),d=i.undef(m.imageTabIndex,0),g=m.pluginsPath+"image/images/",f=i.undef(m.extraFileUploadParams,{}),c=i.undef(m.filePostName,"imgFile"),n=i.undef(m.fillDescAfterUploadImage,false),b=m.lang(a+".");m.plugin.imageDialog=function(t){var O=t.imageUrl,x=i.undef(t.imageWidth,""),Q=i.undef(t.imageHeight,""),J=i.undef(t.imageTitle,""),z=i.undef(t.imageAlign,""),p=i.undef(t.showRemote,true),q=i.undef(t.showLocal,true),u=i.undef(t.tabIndex,0),C=t.clickFn;var S="kindeditor_upload_iframe_"+new Date().getTime();var D=[];for(var H in f){D.push('<input type="hidden" name="'+H+'" value="'+f[H]+'" />')}var y=['<div style="padding:20px;">','<div class="tabs"></div>','<div class="tab1" style="display:none;">','<div class="ke-dialog-row">','<label for="remoteUrl" style="width:60px;">'+b.remoteUrl+"</label>",'<input type="text" id="remoteUrl" class="ke-input-text" name="url" value="" style="width:200px;" /> &nbsp;','<span class="ke-button-common ke-button-outer">','<input type="button" class="ke-button-common ke-button" name="viewServer" value="'+b.viewServer+'" />',"</span>","</div>",'<div class="ke-dialog-row">','<label for="remoteWidth" style="width:60px;">'+b.size+"</label>",b.width+' <input type="text" id="remoteWidth" class="ke-input-text ke-input-number" name="width" value="" maxlength="4" /> ',b.height+' <input type="text" class="ke-input-text ke-input-number" name="height" value="" maxlength="4" /> ','<img class="ke-refresh-btn" src="'+g+'refresh.png" width="16" height="16" alt="" style="cursor:pointer;" title="'+b.resetSize+'" />',"</div>",'<div class="ke-dialog-row">','<label style="width:60px;">'+b.align+"</label>",'<input type="radio" name="align" class="ke-inline-block" value="" checked="checked" /> <img name="defaultImg" src="'+g+'align_top.gif" width="23" height="25" alt="" />',' <input type="radio" name="align" class="ke-inline-block" value="left" /> <img name="leftImg" src="'+g+'align_left.gif" width="23" height="25" alt="" />',' <input type="radio" name="align" class="ke-inline-block" value="right" /> <img name="rightImg" src="'+g+'align_right.gif" width="23" height="25" alt="" />',"</div>",'<div class="ke-dialog-row">','<label for="remoteTitle" style="width:60px;">'+b.imgTitle+"</label>",'<input type="text" id="remoteTitle" class="ke-input-text" name="title" value="" style="width:200px;" />',"</div>","</div>",'<div class="tab2" style="display:none;">','<iframe name="'+S+'" style="display:none;"></iframe>','<form class="ke-upload-area ke-form" method="post" enctype="multipart/form-data" target="'+S+'" action="'+i.addParam(e,"dir=image")+'">','<div class="ke-dialog-row">',D.join(""),'<label style="width:60px;">'+b.localUrl+"</label>",'<input type="text" name="localUrl" class="ke-input-text" tabindex="-1" style="width:200px;" readonly="true" /> &nbsp;','<input type="button" class="ke-upload-button" value="'+b.upload+'" />',"</div>","</form>","</div>","</div>"].join("");var r=q||l?450:400,w=q&&p?300:250;var K=m.createDialog({name:a,width:r,height:w,title:m.lang(a),body:y,yesBtn:{name:m.lang("yes"),click:function(W){if(K.isLoading){return}if(q&&p&&N&&N.selectedIndex===1||!p){if(F.fileBox.val()==""){alert(m.lang("pleaseSelectFile"));return}K.showLoading(m.lang("uploadLoading"));F.submit();v.val("");return}var U=i.trim(A.val()),V=s.val(),T=R.val(),X=L.val(),Y="";o.each(function(){if(this.checked){Y=this.value;return false}});if(U=="http://"||i.invalidUrl(U)){alert(m.lang("invalidUrl"));A[0].focus();return}if(!/^\d*$/.test(V)){alert(m.lang("invalidWidth"));s[0].focus();return}if(!/^\d*$/.test(T)){alert(m.lang("invalidHeight"));R[0].focus();return}C.call(m,U,X,V,T,0,Y)}},beforeRemove:function(){E.unbind();s.unbind();R.unbind();I.unbind()}}),B=K.div;var A=i('[name="url"]',B),v=i('[name="localUrl"]',B),E=i('[name="viewServer"]',B),s=i('.tab1 [name="width"]',B),R=i('.tab1 [name="height"]',B),I=i(".ke-refresh-btn",B),L=i('.tab1 [name="title"]',B),o=i('.tab1 [name="align"]',B);var N;if(p&&q){N=i.tabs({src:i(".tabs",B),afterSelect:function(T){}});N.add({title:b.remoteImage,panel:i(".tab1",B)});N.add({title:b.localImage,panel:i(".tab2",B)});N.select(u)}else{if(p){i(".tab1",B).show()}else{if(q){i(".tab2",B).show()}}}var F=i.uploadbutton({button:i(".ke-upload-button",B)[0],fieldName:c,form:i(".ke-form",B),target:S,width:60,afterUpload:function(U){K.hideLoading();if(U.error===0){var T=U.url;if(h){T=i.formatUrl(T,"absolute")}if(m.afterUpload){m.afterUpload.call(m,T,U,a)}if(!n){C.call(m,T,U.title,U.width,U.height,U.border,U.align)}else{i(".ke-dialog-row #remoteUrl",B).val(T);i(".ke-tabs-li",B)[0].click();i(".ke-refresh-btn",B).click()}}else{alert(U.message)}},afterError:function(T){K.hideLoading();m.errorDialog(T)}});F.fileBox.change(function(T){v.val(F.fileBox.val())});if(l){E.click(function(T){m.loadPlugin("filemanager",function(){m.plugin.filemanagerDialog({viewType:"VIEW",dirName:"image",clickFn:function(U,V){if(m.dialogs.length>1){i('[name="url"]',B).val(U);if(m.afterSelectFile){m.afterSelectFile.call(m,U)}m.hideDialog()}}})})})}else{E.hide()}var P=0,G=0;function M(U,T){s.val(U);R.val(T);P=U;G=T}I.click(function(U){var T=i('<img src="'+A.val()+'" />',document).css({position:"absolute",visibility:"hidden",top:0,left:"-1000px"});T.bind("load",function(){M(T.width(),T.height());T.remove()});i(document.body).append(T)});s.change(function(T){if(P>0){R.val(Math.round(G/P*parseInt(this.value,10)))}});R.change(function(T){if(G>0){s.val(Math.round(P/G*parseInt(this.value,10)))}});A.val(t.imageUrl);M(t.imageWidth,t.imageHeight);L.val(t.imageTitle);o.each(function(){if(this.value===t.imageAlign){this.checked=true;return false}});if(p&&u===0){A[0].focus();A[0].select()}return K};m.plugin.image={edit:function(){var o=m.plugin.getSelectedImage();m.plugin.imageDialog({imageUrl:o?o.attr("data-ke-src"):"http://",imageWidth:o?o.width():"",imageHeight:o?o.height():"",imageTitle:o?o.attr("title"):"",imageAlign:o?o.attr("align"):"",showRemote:k,showLocal:j,tabIndex:o?0:d,clickFn:function(r,t,s,p,q,u){if(o){o.attr("src",r);o.attr("data-ke-src",r);o.attr("width",s);o.attr("height",p);o.attr("title",t);o.attr("align",u);o.attr("alt",t)}else{m.exec("insertimage",r,t,s,p,q,u)}setTimeout(function(){m.hideDialog().focus()},0)}})},"delete":function(){var o=m.plugin.getSelectedImage();if(o.parent().name=="a"){o=o.parent()}o.remove();m.addBookmark()}};m.clickToolbar(a,m.plugin.image.edit)});