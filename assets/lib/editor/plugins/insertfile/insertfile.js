KindEditor.plugin("insertfile",function(h){var j=this,a="insertfile",b=h.undef(j.allowFileUpload,true),i=h.undef(j.allowFileManager,false),g=h.undef(j.formatUploadUrl,true),e=h.undef(j.uploadJson,j.basePath+"php/upload_json.php"),f=h.undef(j.extraFileUploadParams,{}),d=h.undef(j.filePostName,"imgFile"),c=j.lang(a+".");j.plugin.fileDialog=function(u){var s=h.undef(u.fileUrl,"http://"),o=h.undef(u.fileTitle,""),k=u.clickFn;var p=['<div style="padding:20px;">','<div class="ke-dialog-row">','<label for="keUrl" style="width:60px;">'+c.url+"</label>",'<input type="text" id="keUrl" name="url" class="ke-input-text" style="width:160px;" /> &nbsp;','<input type="button" class="ke-upload-button" value="'+c.upload+'" /> &nbsp;','<span class="ke-button-common ke-button-outer">','<input type="button" class="ke-button-common ke-button" name="viewServer" value="'+c.viewServer+'" />',"</span>","</div>",'<div class="ke-dialog-row">','<label for="keTitle" style="width:60px;">'+c.title+"</label>",'<input type="text" id="keTitle" class="ke-input-text" name="title" value="" style="width:160px;" /></div>',"</div>","</form>","</div>"].join("");var r=j.createDialog({name:a,width:450,title:j.lang(a),body:p,yesBtn:{name:j.lang("yes"),click:function(w){var v=h.trim(n.val()),x=q.val();if(v=="http://"||h.invalidUrl(v)){alert(j.lang("invalidUrl"));n[0].focus();return}if(h.trim(x)===""){x=v}k.call(j,v,x)}}}),l=r.div;var n=h('[name="url"]',l),m=h('[name="viewServer"]',l),q=h('[name="title"]',l);if(b){var t=h.uploadbutton({button:h(".ke-upload-button",l)[0],fieldName:d,url:h.addParam(e,"dir=file"),extraParams:f,afterUpload:function(w){r.hideLoading();if(w.error===0){var v=w.url;if(g){v=h.formatUrl(v,"absolute")}n.val(v);if(j.afterUpload){j.afterUpload.call(j,v,w,a)}alert(j.lang("uploadSuccess"))}else{alert(w.message)}},afterError:function(v){r.hideLoading();j.errorDialog(v)}});t.fileBox.change(function(v){r.showLoading(j.lang("uploadLoading"));t.submit()})}else{h(".ke-upload-button",l).hide()}if(i){m.click(function(v){j.loadPlugin("filemanager",function(){j.plugin.filemanagerDialog({viewType:"LIST",dirName:"file",clickFn:function(w,x){if(j.dialogs.length>1){h('[name="url"]',l).val(w);if(j.afterSelectFile){j.afterSelectFile.call(j,w)}j.hideDialog()}}})})})}else{m.hide()}n.val(s);q.val(o);n[0].focus();n[0].select()};j.clickToolbar(a,function(){j.plugin.fileDialog({clickFn:function(k,m){var l='<a class="ke-insertfile" href="'+k+'" data-ke-src="'+k+'" target="_blank">'+m+"</a>";j.insertHtml(l).hideDialog().focus()}})})});