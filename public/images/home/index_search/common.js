var islogin=0;if($.cookie('uid')!=null) islogin=1;
function _get_login_user(u){
$('#user').html('<a href="http://u.sanwen.net/'+u.uid+'.html" class="utype_'+u.typeid+'" target="_blank">'+u.username+'</a><a href="http://u.sanwen.net/manage/" target="_blank">会员中心</a>');
}
function _get_views(){
if(aid==null) return false;
$.getJSON('/public/views',{aid:aid},function(msg){
$('#article_click').html(msg.data);
});
}

function doLogin(){
$.ajax({
url:'http://u.sanwen.net/connect/xlogin',
dataType:'jsonp',
data:$('#frmlogin').serialize(),
success:function(msg){
	if(msg.status==1){
		$('#login').html('<a href="http://u.sanwen.net/'+msg.data.uid+'.html"><img src="'+msg.data.avatar+'" class="bavatar" /></a><div class="userinfo"><p><a href="http://u.sanwen.net/'+msg.data.uid+'.html" class="username">'+msg.data.username+'</a></p><p><a href="http://u.sanwen.net/manage/postarticle">发文章</a><a href="http://u.sanwen.net/manage/postblog">写日记</a></p><p><a href="http://u.sanwen.net/manage/">管理中心</a><a href="http://www.sanwen.net/public/doexit/">退出登录</p></div>');
	}else{
		alert(msg.info);
	}
}
});
}
function checklogin(){
$.getJSON('/do/checklogin',function(msg){
if(msg.status==1) $('#login').html('<a href="http://u.sanwen.net/'+msg.data.uid+'.html"><img src="'+msg.data.avatar+'" class="bavatar" /></a><div class="userinfo"><p><a href="http://u.sanwen.net/'+msg.data.uid+'.html" class="username">'+msg.data.username+'</a></p><p><a href="http://u.sanwen.net/manage/postarticle">发文章</a><a href="http://u.sanwen.net/manage/postblog">写日记</a></p><p><a href="http://u.sanwen.net/manage/">管理中心</a><a href="http://www.sanwen.net/public/doexit/">退出登录</p></div>');
});
}
function docomment(){
$.ajax({
url:'http://u.sanwen.net/manage/postcomment',
dataType:'jsonp',
data:$('#frmComment').serialize(),
success:function(msg){
if(msg.status==1){
$("#cmessage").val('');
$(".newcomment").addClass('myreply').html('<div class="cu"><a href="http://u.sanwen.net/'+msg.data.uid+'.html"><img src="'+msg.data.avatar+'" class="mavatar" style="display: inline;"></a></div><div class="ci"><p><em>'+msg.data.message+'</em></p><div><a href="javascript:void(0)" onclick="delreply('+msg.data.cid+');" class="dr">删除</a><label class="dateline">刚刚</label></div></div>').fadeIn().attr('id','c'+msg.data.cid);
$.dialog({
title:'评论结果',
content:'恭喜你，评论成功！',
time:1000
});
}else{
alert(msg.info);
}
}
});
}
function postmessage(uid){
$.dialog({
	title:'发短消息',
	content:'<textarea name="message" style="padding:8px; border:1px solid #ccc; width:300px; height:60px; overflow:auto;" id="ttmessage"></textarea>',
	okValue:'发送',
	ok:function(){
		var message = $("#ttmessage").val();
		if(message==''){
			alert('短消息内容不能空');
			return false;
		}
		$.post('/do/message',{uid:uid,message:message},function(msg){
			if(msg.status==0){
				alert(msg.info);
			}else{
				$.dialog({
				title:'结果',
				content:'恭喜你，发送成功！',
				time:1000
				});
			}
		},'json');
	},
	cancelValue:'取消',
	cancel:function(){},
	padding:'15px'
});
}
function reply(cid){
$.dialog({
	title:'回复评论',
	content:'<textarea name="replymessage" style="padding:8px; border:1px solid #ccc; width:300px; height:60px; overflow:auto;" id="replymessage"></textarea>',
	okValue:'提交回复',
	ok:function(){
		var message = $("#replymessage").val();
		if(message==''){
			alert('回复内容不能空');
			return false;
		}
		$.post('/do/reply',{cid:cid,message:message},function(msg){
			if(msg.status==0){
				alert(msg.info);
			}else{
				$("#c"+cid).after('<li id="c'+msg.data.cid+'" class="myreply"><div class="cu"><span style="height:48px;line-height:48px; border:1px solid #eee; width:48px;display:block;font-size:50px;">我</span></div><div class="ci"><p><em>'+message+'</em></p><div><a href="javascript:void(0)" onclick="delreply('+msg.data.cid+');" class="dr">删除</a><label class="dateline">刚刚</label></div></div></li>');
				$.dialog({
					title:'回复结果',
					content:'恭喜你，回复成功！',
					time:1000
				});
			}
		},'json');
	},
	cancelValue:'取消',
	cancel:function(){},
	padding:'15px'
});
}
function delreply(cid){
$.post('/do/delreply',{cid:cid},function(msg){
	var title='删除成功';
	if(msg.status==0) title='删除失败';
	$.dialog({
		title:title,
		content:msg.info,
		time:1000
	});
	if(msg.status==1){
		$('#c'+cid).fadeOut();
	}
},'json');
}
function dofollow(uid){
$.post('/do/follow',{fuid:uid},function(msg){
	var title='关注成功';
	if(msg.status==0) title='关注失败';
	$.dialog({
		title:title,
		content:msg.info,
		time:1000
	});
},'json');
}
function dofavorite(aid){
$.post('/do/favorite',{aid:aid},function(msg){
	var title='收藏成功';
	if(msg.status==0) title='收藏失败';
	$.dialog({
		title:title,
		content:msg.info,
		time:1000
	});
},'json');
}

function dodigg(aid){
$.post('/do/digg',{aid:aid},function(msg){
	$.dialog({
		title:msg.info,
		content:'我来说两句'+'<br/><textarea name="replymessage" style="padding:8px; border:1px solid #ccc; width:300px; height:60px; overflow:auto;" id="cmessage"></textarea>',
		okValue:'评论',
		ok:function(){
			var message = $('#cmessage').val();
			$.post('/do/comment',{message:message,aid:aid},function(msg){
				alert(msg.info);
				$(".newcomment").addClass('myreply').html('<div class="cu"><span style="height:48px;line-height:48px; border:1px solid #eee; width:48px;display:block;font-size:50px;">我</span></div><div class="ci"><p><em>'+message+'</em></p><div><a href="javascript:void(0)" onclick="delreply('+msg.data.cid+');" class="dr">删除</a><label class="dateline">刚刚</label></div></div>').fadeIn().attr('id','c'+msg.data.cid);
			},'json');
		}
	});

},'json');
}

$(function(){
	$("img").lazyload({ 
		effect : "fadeIn"
	});
	if(islogin==1){
		$.getJSON('/do/checklogin',function(msg){
			_get_login_user(msg.data);
		});
	}else{
		$('.postcomment').html('<div id="nologin" style="padding:30px; text-align:center; border:1px solid #ccc;"><a href="http://u.sanwen.net/connect/qqlogin" target="_self"><img style="" src="http://www.sanwen.net/public/images/qqlogin.png" alt="使用qq登录" /></a>你需要登录后才可以评论。</div>');
	}
	_get_views();
});
function t300100(){
document.writeln("<script type=\"text/javascript\">");
document.writeln("document.write(\'<a style=\"display:none!important\" id=\"tanx-a-mm_10010445_2281291_22892007\"></a>\');");
document.writeln("tanx_s = document.createElement(\"script\");");
document.writeln("tanx_s.type = \"text/javascript\";");
document.writeln("tanx_s.charset = \"gbk\";");
document.writeln("tanx_s.id = \"tanx-s-mm_10010445_2281291_22892007\";");
document.writeln("tanx_s.async = true;");
document.writeln("tanx_s.src = \"http://p.tanx.com/ex?i=mm_10010445_2281291_22892007\";");
document.writeln("tanx_h = document.getElementsByTagName(\"head\")[0];");
document.writeln("if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);");
document.writeln("</script>");
}
function t300250(){
document.writeln("<script type=\"text/javascript\">");
document.writeln("document.write(\'<a style=\"display:none!important\" id=\"tanx-a-mm_10010445_2281291_9250865\"></a>\');");
document.writeln("tanx_s = document.createElement(\"script\");");
document.writeln("tanx_s.type = \"text/javascript\";");
document.writeln("tanx_s.charset = \"gbk\";");
document.writeln("tanx_s.id = \"tanx-s-mm_10010445_2281291_9250865\";");
document.writeln("tanx_s.async = true;");
document.writeln("tanx_s.src = \"http://p.tanx.com/ex?i=mm_10010445_2281291_9250865\";");
document.writeln("tanx_h = document.getElementsByTagName(\"head\")[0];");
document.writeln("if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);");
document.writeln("</script>");
}
function _get_content_ad(){
if(islogin==0) document.writeln("<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"><\/script><!-- sw_336_280_zw --><ins class=\"adsbygoogle\" style=\"display:inline-block;width:336px;height:280px\" data-ad-client=\"ca-pub-1637650971853106\" data-ad-slot=\"4858989558\"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({ });<\/script>");
}
function _get_duilian(){
if(islogin==0) document.writeln("<script type=\"text/javascript\">var cpro_id = \"u584504\";<\/script><script src=\"http://cpro.baidustatic.com/cpro/ui/f.js\" type=\"text/javascript\"><\/script>");
}
/*-- sk_300_250 */
function g300250(){
if(islogin==0) document.writeln("<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script><ins class=\"adsbygoogle\" style=\"display:inline-block;width:300px;height:250px\" data-ad-client=\"ca-pub-1637650971853106\" data-ad-slot=\"9229908080\"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>");
}
/*散文网_作文_336*280*/
function u1415198(){document.writeln("<script type=\"text/javascript\">var cpro_id = \"u1415198\";</script><script src=\"http://cpro.baidustatic.com/cpro/ui/c.js\" type=\"text/javascript\"></script>");}


