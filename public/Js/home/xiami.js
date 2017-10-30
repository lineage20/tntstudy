$(window).load(function(){
	//loadBG();
	fPlay();
});
$(function(){
	//setTimeout("fPlay()",500);
	/*歌曲列表效果*/
	$(".songList").hover(function(){
		$(this).find(".more").show();
		$(this).find(".dele").show();
	},function(){
		$(this).find(".more").hide();
		$(this).find(".dele").hide();
	});
	/*自定义滚动条*/
	$(".songUL").rollbar({zIndex:80});
	//$("#lyr").rollbar({zIndex:80});
	/*复选框*/
	$(".checkIn").click(function(){
		var s=$(this).attr("select");
		if (s==0) {
			$(this).css("background-position","-37px -710px");
			$(this).attr("select","1");
		};
		if (s==1) {
			$(this).css("background-position","");
			$(this).attr("select","0");
		};		
	});
	$(".checkAll").click(function(){
		var s=$(this).attr("select");
		if (s==0) {
			$(this).css("background-position","-37px -710px");
			$(".checkIn[select='0']").css("background-position","-37px -710px");
			$(".checkIn[select='0']").attr("select","1");
			$(this).attr("select","1");
		};
		if (s==1) {
			$(this).css("background-position","");
			$(".checkIn[select='1']").css("background-position","");
			$(".checkIn[select='1']").attr("select","0");
			$(this).attr("select","0");
		};
		
	});
	/*点击列表播放按钮*/
	$(".start em").click(function(){
		/*开始放歌*/
		var sid=$(this).attr("sonN");
		songIndex=sid;
		//alert(sid);
		$("#audio").attr("src",'../../public/music/'+sid+'.mp3');	
		audio=document.getElementById("audio");//获得音频元素
		/*显示歌曲总长度*/
		if(audio.paused){
			audio.play();
		} 				
		else
			audio.pause();	
		audio.addEventListener('timeupdate',updateProgress,false);
		
		audio.addEventListener('play',audioPlay,false);
		audio.addEventListener('pause',audioPause,false);
		audio.addEventListener('ended',audioEnded,false); 
		/*播放歌词*/
		getReady(sid);//准备播放
		mPlay();//显示歌词
		//对audio元素监听pause事件
		/*外观改变*/
		var html="";
		html+='<div class="manyou">';
		html+='	<a href="#" class="manyouA">漫游相似歌曲</a>';
		html+='</div>';
		$(".start em").css({
			"background":"",
			"color":""
		}); 
		$(".manyou").remove();
		$(".songList").css("background-color","#f5f5f5");
		$(this).css({
			"background":'url("../../public/Images/home/index/T1X4JEFq8qXXXaYEA_-11-12.gif") no-repeat',
			"color":"transparent"
		});
		$(this).parent().parent().parent().append(html);
		$(this).parent().parent().parent().css("background-color","#f0f0f0");

		/*底部显示歌曲信息*/
		var songName=$(this).parent().parent().find(".colsn").html();
		var singerName =$(this).parent().parent().find(".colcn").html();
		$(".songName").html(songName);
		$(".songPlayer").html(singerName);
		/*换右侧图片*/
		$("#canvas1").attr("src",'images/'+sid+'.jpg');
		$("#canvas1").load(function(){
			loadBG();
		});
		//setTimeout('loadBG()',100);
		$(".blur").css("opacity","0");
		$(".blur").animate({opacity:"1"},1000);

	});
	/*双击播放*/
	$(".songList").dblclick(function(){
		var sid = $(this).find(".start em").html();
		$(".start em[sonN="+sid+"]").click();
	});
	/*底部进度条控制*/
	$( ".dian" ).draggable({ 
		containment:".pro2",
		drag: function() {
			var l=$(".dian").css("left");
			var le = parseInt(l);
			audio.currentTime = audio.duration*(le/678);
      	}
	});
	/*音量控制*/
	$( ".dian2" ).draggable({ 
		containment:".volControl",
		drag: function() {
			var l=$(".dian2").css("left");
			var le = parseInt(l);
			audio.volume=(le/80);
      }
	});
	/*底部播放按钮*/
	$(".playBtn").click(function(){	
		var p = $(this).attr("isplay");		
		if (p==0) {
			$(this).css("background-position","0 -30px");
			$(this).attr("isplay","1");
		};
		if (p==1) {
			$(this).css("background-position","");
			$(this).attr("isplay","0");
		};
		if(audio.paused) 
			audio.play();
		else
			audio.pause();
		
	});
	$(".mode").click(function(){
		// var t = calcTime(Math.floor(audio.currentTime))+'/'+calcTime(Math.floor(audio.duration));
		// //alert(t);
		// var p =Math.floor(audio.currentTime)/Math.floor(audio.duration);
		// alert(p);
		//alert(lytext[1]);
	});
	/*切歌*/
	$(".prevBtn").click(function(){
		var sid = parseInt(songIndex)-1;
		$(".start em[sonN="+sid+"]").click();
	});
	$(".nextBtn").click(function(){
		var sid = parseInt(songIndex)+1;
		$(".start em[sonN="+sid+"]").click();
	});

});

/*首尾模糊效果*/
function loadBG(){
	//alert();
	// stackBlurImage('canvas1', 'canvas', 60, false);
	var c=document.getElementById("canvas");
	var ctx=c.getContext("2d");
	var img=document.getElementById("canvas1");
	ctx.drawImage(img,45,45,139,115,0,0,1366,700);
	stackBlurCanvasRGBA('canvas',0,0,1366,700,60);
}
function calcTime(time){
	var hour;         	var minute;    	var second;
	hour = String ( parseInt ( time / 3600 , 10 ));
	if (hour.length ==1 )   hour='0'+hour;
	minute=String(parseInt((time%3600)/60,10));
	if(minute.length==1) minute='0'+minute;
	second=String(parseInt(time%60,10));
	if(second.length==1)second='0'+second;
	return minute+":"+second;
}
function updateProgress(ev){
	/*显示歌曲总长度*/
	var songTime = calcTime(Math.floor(audio.duration));
	$(".duration").html(songTime);
	/*显示歌曲当前时间*/
	var curTime = calcTime(Math.floor(audio.currentTime));
	$(".position").html(curTime);
	/*进度条*/
	var lef = 678*(Math.floor(audio.currentTime)/Math.floor(audio.duration));
	var llef = Math.floor(lef).toString()+"px";
	$(".dian").css("left",llef);
}
function audioPlay(ev){
	$(".iplay").css("background",'url("../../public/Images/home/index/T1oHFEFwGeXXXYdLba-18-18.gif") 0 0');
	$(".playBtn").css("background-position","0 -30px");
	$(".playBtn").attr("isplay","1");
}
function audioPause(ev){
	$(".iplay").css("background","");
	// $(".start em").css({
	// 	"background":'url("../../public/Images/home/index/pause.png") no-repeat 50% 50%',
	// 	"color":"transparent"
	// });
}
function audioEnded(ev){
	var sid = parseInt(songIndex)+1;
	$(".start em[sonN="+sid+"]").click();
}


/*显示歌词部分*/
var scrollt=0; var tflag=0;//存放时间和歌词的数组的下标
var lytext=new Array();//放存汉字的歌词 
var lytime=new Array();//存放时间
var delay=10; var line=0; var scrollh=0; 
var songIndex=2;
function getLy(s)//取得歌词 
{ 	
	var ly="";
	if (s=="1"){
		ly="[00:03]作词：张超.[00:06]作曲：张超.[00:09]演唱：郑东 .[00:12] .[00:13]歌词编辑 小彭 QQ:121500339 .[00:17] .[00:18]忘了是什么时候 .[00:22]习惯了一些问候 .[00:26]听老情歌 最后一首 .[00:30]轻轻的唇在颤抖 .[00:33] .[00:34]时间像无边的海 .[00:38]我们在无力地游 .[00:42]思念在前后 焦心在左右 .[00:46]谁在挥舞着衣袖 .[00:49] .[00:50]你会爱我到什么时候 .[00:53]你会陪我到哪个路口 .[00:57]我不知道用什么理由 .[01:01]让你可以和我厮守到白头 .[01:04] .[01:06]你会爱我到什么时候 .[01:09]你会等我到哪座桥头 .[01:13]我只剩下这一颗红豆 .[01:17]请你把它收下 别让风带走 .[01:21] .[01:23]LRC编辑 小彭 QQ:121500339 .[01:35] .[01:37]时间像无边的海 .[01:41]我们在无力地游 .[01:45]思念在前后 焦心在左右 .[01:49]谁在挥舞着衣袖 .[01:52] .[01:55]你会爱我到什么时候 .[01:58]你会陪我到哪个路口 .[02:02]我不知道用什么理由 .[02:06]让你可以和我厮守到白头.[02:10]你会爱我到什么时候.[02:14]你会等我到哪座桥头.[02:18]我只剩下这一颗红豆.[02:22]请你把它收下 别让风带走 .[02:25] .[02:28]LRC编辑 小彭 QQ:121500339 .[02:55] .[02:58]你会爱我到什么时候 .[03:01]你会陪我到哪个路口 .[03:05]我不知道用什么理由 .[03:09]让你可以和我厮守到白头 .[03:12] .[03:13]你会爱我到什么时候 .[03:17]你会等我到哪座桥头 .[03:21]我只剩下这一颗红豆 .[03:24]请你把它收下 别让风带走 .[03:28]请你把它收下 别让风带走 .[03:36] "; }; 
	 if (s=="2") {
	 	ly="[00:01]演唱:Demi Lovato .[00:01] .[00:02]Let it go, let it go .[00:03]Can't hold it back anymore .[00:06]Let it go, let it go .[00:10]Turn my back and slam the door .[00:14] .[00:15]The snow blows white on the mountain tonight .[00:19]Not a footprint to be seen .[00:22]A kingdom of isolation .[00:25]and it looks like I'm the Queen .[00:29] .[00:29]The wind is howling .[00:32]like the swirling storm inside .[00:36]Couldn't keep it in, .[00:38]Heaven knows I tried .[00:42] .[00:43]Don't let them in, don't let them see .[00:47]Be the good girl you always have to be .[00:50]Conceal, don't feel .[00:52]Don't let them know .[00:56]Well, now they know .[00:59] .[00:59]Let it go, let it go .[01:03]Can't hold it back anymore .[01:06]Let it go, let it go .[01:10]Turn my back and slam the door .[01:13] .[01:14]And here I stand .[01:17]and here I'll stay .[01:20]Let it go, let it go .[01:24]The cold never bothered me anyway .[01:27] .[01:28]It's funny how some distance .[01:30]Makes everything seem small .[01:34]And the fears that once controlled me .[01:37]Can't get to me at all .[01:40] .[01:41]Up here in the cold thin air .[01:44]I finally can breathe .[01:48]I know I left a life behind .[01:51]But I'm too relieved to grieve .[01:54] .[01:54]Let it go, let it go .[01:58]Can't hold it back anymore .[02:01]Let it go, let it go .[02:05]Turn my back and slam the door .[02:08] .[02:08]And here I stand .[02:12]and here I'll stay .[02:15]Let it go, let it go .[02:18]The cold never bothered me anyway .[02:22] .[02:23]Standing frozen .[02:26]in the life I've chosen .[02:30]You won't find me .[02:33]The past is all behind me .[02:37]Buried in the snow .[02:42] .[02:42]Let it go, let it go .[02:46]Can't hold it back anymore .[02:50] .[02:51]Let it go, let it go .[02:54]Turn my back and slam the door .[02:58]And here I stand .[03:02]and here I'll stay .[03:05]Let it go, let it go .[03:08]The cold never bothered me anyway .[03:26].[03:13] .[03:29]Here we stand .[03:32]Let it go, let it go .[03:36] .[03:39]Let it go .[03:41] .[03:22]LRC Produced by Brittany ";
	 };
	if(s=="3"){
		ly="[00:02]作词：小美 作曲：黄家驹 .[00:06]演唱：Beyond .[00:08] .[00:25]无法可修饰的一对手 .[00:29]带出温暖永远在背后 .[00:32]总是罗嗦始终关注 .[00:34]不懂珍惜太内疚 .[00:37]沉醉于音阶她不赞赏 .[00:41]母亲的爱却永远未退让 .[00:44]决心冲开心中挣扎 .[00:46]亲恩终可报答 .[00:50]春风化雨暖透我的心 .[00:53]一生眷顾无言地送赠 .[00:58]是你多么温馨的目光 .[01:01]教我坚毅望着前路 .[01:04]叮嘱我跌倒不应放弃 .[01:10]没法解释怎可报尽亲恩 .[01:14]爱意宽大是无限 .[01:17]请准我说声真的爱你 .[01:22] .[01:35]无法可修饰的一对手 .[01:39]带出温暖永远在背后 .[01:42]总是罗嗦始终关注 .[01:44]不懂珍惜太内疚 .[01:47]仍记起温馨的一对手 .[01:51]始终给我照顾未变样 .[01:54]理想今天终于等到 .[01:56]分享光辉盼做到 .[02:00]春风化雨暖透我的心 .[02:03]一生眷顾无言地送赠 .[02:08]是你多么温馨的目光 .[02:11]教我坚毅望着前路 .[02:14]叮嘱我跌倒不应放弃 .[02:20]没法解释怎可报尽亲恩 .[02:24]爱意宽大是无限 .[02:27]请准我说声真的爱你 .[02:32] .[02:57]春风化雨暖透我的心 .[03:01]一生眷顾无言地送赠 .[03:06]是你多么温馨的目光 .[03:09]教我坚毅望着前路 .[03:12]叮嘱我跌倒不应放弃 .[03:18]没法解释怎可报尽亲恩 .[03:21]爱意宽大是无限 .[03:25]请准我说声真的爱你 .[03:30]是你多么温馨的目光（哦） .[03:34]教我坚毅望着前路 .[03:37]叮嘱我跌倒不应放弃（哦） .[03:43]没法解释怎可报尽亲恩（哦） .[03:47]爱意宽大是无限 .[03:50]请准我说声真的爱你（哦） .[03:55] ";
	};	
	if(s=="4"){
		ly="[00:01]Only Love .[00:03]Trademark .[00:05]Only Love .[00:07] .[00:17]Two a.m. and the rain is falling .[00:24]Here we are at the cross roads once again .[00:31]You're telling me you're so confused .[00:35]You can't make up your mind .[00:38]This is meant to be you're asking me .[00:46]But only love can say .[00:51]Try again or walk away .[00:54]But I believe for you and me .[00:58]The sun will shine one day .[01:01]So I'll just play me part .[01:06]And pray you'll have a change of heart .[01:10]But I can't make you see it through .[01:15]That's something only love can do .[01:21] .[01:27]In your arm as the dawn is breaking .[01:35]Face to face and a thousand mines apart .[01:41]I've tried my best to make you see .[01:45]There's hope beyond the pain .[01:49]If we give enough if we learn to trust .[01:56]But only love can say .[02:01]Try again or walk away .[02:05]But I believe for you and me .[02:09]The sun will shine one day .[02:12]So I'll just play me part .[02:16]And pray you'll have a change of heart .[02:21]But I can't make you see it through .[02:25]That's something only love can do .[02:33] .[02:36]Only Love - Trademark .[02:39] .[02:44]I know if I could find the words .[02:48]To touch you deep inside .[02:52]You'd give our dream just one more chance .[02:56]Don't let this be our goodbye .[03:03]But only love can say .[03:08]Try again or walk away .[03:11]But I believe for you and me .[03:15]The sun will shine one day .[03:18]So I'll just play me part .[03:23]And pray you'll have a change of heart .[03:29]But I can't make you see it through .[03:34]That's something only love can do .[03:42]That's something only love can do .[03:47] .[03:49]Only Love - Trademark .[03:51] ";
	};
	if(s=="5"){
		ly="[00:01]1983组合 - 对不起我爱你 .[00:05]专辑《壹加壹》（2006.09.06） .[00:10] .[00:11]★ 红糖豆浆 .[02:02].[00:34] .[02:03]我爱歌词网 www.yue365.com .[02:13] .[02:14].[00:35]这熟悉的天气 留在深处的记忆 .[02:20].[00:42]似乎那次我们相遇 是缘分前世的累积 .[02:27].[00:48]那曾经的旋律 却不能再次响起 .[02:33].[00:55]是否我们无法逃避 早已注定的结局 .[02:42].[01:03]而距离 我们在不同轨迹 .[02:48].[01:10]再多的努力也是悲戚 在心底 .[02:57].[01:18]千万次的练习 千万次不停的温习 .[03:04].[01:26]只怕已来不及 只是还没告诉你 .[03:11].[01:33]对不起我爱你 没有你我无法呼吸 .[03:18].[01:39]我不能看你泪流了几公里 .[03:22].[01:43]只是我还没有鼓足勇气 .[03:25].[01:47]还没告诉你 对不起我爱你 .[03:31].[01:52]就算有一天脱离了身体 .[03:35].[01:56]我依然这样的死心塌地 .[03:42]我不能听信别人为我做好的安排 .[03:48]我知道现在的你对我有多么的依赖 .[03:55]我相信你一定还在原地为我等待 .[04:01]因为你而我存在 别离开我的爱 .[04:10] .[04:12]还没告诉你 对不起我爱你 .[04:18]没有你我无法呼吸 .[04:21]我不能看你泪流了几公里 .[04:25]只是我还没有鼓足勇气 .[04:29]还没告诉你 对不起我爱你 .[04:34]没有你我无法呼吸 .[04:38]我不能看你泪流了几公里 .[04:42]只是我还没有鼓足勇气 .[04:45]还没告诉你 对不起我爱你 .[04:51]就算有一天脱离了身体 .[04:55]我依然无法 与你分离 .[04:59]还要和你继续在一起 .[05:02]对你说声那句 我 .[05:05] .[05:08]爱你 .[05:12] .[05:13]☆永远爱你们！★ 红糖豆浆 .[05:31]☆END ";
		 };
	if(s=="6"){
		ly="[00:07]父亲 .[00:12]词曲：筷子兄弟 .[00:22]演唱：刘宁 .[00:44] .[01:02]总是向你索取 却不曾说谢谢你 .[01:10]直到长大以后 才懂得你不容易 .[01:15]每次离开总是 装做轻松的样子 .[01:24]微笑着说回去吧 转身泪湿眼底 .[01:30]多想和从前一样 牵你温暖手掌 .[01:39]可是你不在我身旁 托清风捎去安康 .[01:50]时光时光慢些吧 .[01:53]不要再让你再变老了 .[01:57]我愿用我一切 换你岁月长留 .[02:05]一生要强的爸爸 .[02:08]我能为你做些什么 .[02:12]微不足道的关心收下吧 .[02:19]谢谢你做的一切 .[02:23]双手撑起我们的家 .[02:27]总是竭尽所有 把最好的给我 .[02:34]我是你的骄傲吗 .[02:38]还在为我而担心吗 .[02:41]你牵挂的孩子啊 长大啦 .[03:07]此歌送给天下所有的父亲 .[03:15]亲切的说声：您辛苦了！ .[03:19] .[03:19]多想和从前一样 牵你温暖手掌 .[03:29]可是你不在我身旁 托清风捎去安康 .[03:41]时光时光慢些吧 .[03:44]不要再让你再变老了 .[03:48]我愿用我一切 换你岁月长留 .[03:55]一生要强的爸爸 .[03:59]我能为你做些什么 .[04:03]微不足道的关心收下吧 .[04:10]谢谢你做的一切 .[04:14]双手撑起我们的家 .[04:17]总是竭尽所有 把最好的给我 .[04:25]我是你的骄傲吗 .[04:28]还在为我而担心吗 .[04:32]你牵挂的孩子啊 长大啦 .[04:40]时光时光慢些吧 .[04:43]不要再让你再变老了 .[04:47]我愿用我一切 换你岁月长留 .[04:51]我是你的骄傲吗 .[04:58]还在为我而担心吗 .[05:02]你牵挂的孩子啊 长大啦 .[05:09]感谢一路上有你 .[06:09] ";
	};
	if(s=="7"){
		ly="[00:01]过火 .[00:04]演唱:刘宁 .[00:05] .[00:28]是否对你承诺了太多 .[00:30]还是我原本给的就不够 .[00:35]你始终有千万种理由 .[00:38]我一直都跟随你的感受 .[00:43]让你疯　让你去放纵 .[00:47]以为你　有天会感动 .[00:50]关於流言　我装作无动於衷 .[00:56] .[01:02]直到所有的梦已破碎 .[01:05]才看见你的眼泪和後悔 .[01:10]我是多想再给你机会 .[01:12]多想问你究竟爱谁 .[01:17]既然爱　难分是非 .[01:21]就别逃避　勇敢面对 .[01:24]给了他的心 .[01:26]你是否能够要得回 .[01:30] .[01:31]怎麽忍心怪你犯了错 .[01:36]是我给你自由过了火 .[01:40]让你更寂寞 .[01:43]才会陷入感情漩涡 .[01:47]怎麽忍心让你受折磨 .[01:51]是我给你自由过了火 .[01:55]如果你想飞  伤痛我背 .[02:02] .[02:33]是否对你承诺了太多 .[02:36]还是我原本给的就不够 .[02:41]你始终有千万种理由 .[02:44]我一直都跟随你的感受 .[02:49]让你疯　让你去放纵 .[02:52]以为你　有天会感动 .[02:56]关於流言　我装作无动於衷 .[03:01] .[03:04]直到所有的梦已破碎 .[03:06]才看见你的眼泪和後悔 .[03:11]我是多想再给你机会 .[03:14]多想问你究竟爱谁 .[03:19]既然爱　难分是非 .[03:23]就别逃避　勇敢面对 .[03:26]给了他的心 .[03:28]你是否能够要得回 .[03:32] .[03:33]怎麽忍心怪你犯了错 .[03:38]是我给你自由过了火 .[03:42]让你更寂寞 .[03:45]才会陷入感情漩涡 .[03:49]怎麽忍心让你受折磨 .[03:53]是我给你自由过了火 .[03:57]如果你想飞 伤痛我背 .[04:03] .[04:04]怎麽忍心怪你犯了错 .[04:09]是我给你自由过了火 .[04:12]让你更寂寞 .[04:16]才会陷入感情漩涡 .[04:19]怎麽忍心让你受折磨 .[04:24]是我给你自由过了火 .[04:28]如果你想飞 伤痛我背 .[04:40]";
	};
	if(s=="8"){
		ly="[00:01]红日 .[00:03]演唱：刘宁 .[00:06] .[00:21]命运就算颠沛流离 .[00:23]命运就算曲折离奇 .[00:25]命运就算恐吓着你做人没趣味 .[00:28]别流泪 心酸 更不应舍弃 .[00:32]我愿能 一生永远陪伴你 .[00:37]命运就算颠沛流离 .[00:39]命运就算曲折离奇 .[00:41]命运就算恐吓着你做人没趣味 .[00:44]别流泪 心酸 更不应舍弃 .[00:49]我愿能 一生永远陪伴你 .[00:53]哦~~ .[01:01]一生之中兜兜转转 那会看清楚 .[01:04]彷徨时我也试过独坐一角像是没协助 .[01:09]在某年 那幼小的我 .[01:12]跌倒过几多几多落泪在雨夜滂沱 .[01:16]一生之中弯弯曲曲我也要走过 .[01:20]从何时有你有你伴我给我热烈地拍和 .[01:24]像红日之火 燃点真的我 .[01:28]结伴行 千山也定能踏过 .[01:32]让晚风 轻轻吹过 .[01:36]伴送着清幽花香像是在祝福你我 .[01:40]让晚星 轻轻闪过 .[01:44]闪出你每个希冀如浪花 快要沾湿我 .[01:53]命运就算颠沛流离 .[01:55]命运就算曲折离奇 .[01:57]命运就算恐吓着你做人没趣味 .[02:00]别流泪 心酸 更不应舍弃 .[02:05]我愿能 一生永远陪伴你 .[02:09]哦~~ .[02:17]一生之中兜兜转转 那会看清楚 .[02:20]彷徨时我也试过独坐一角像是没协助 .[02:25]在某年 那幼小的我 .[02:28]跌倒过几多几多落泪在雨夜滂沱 .[02:33]一生之中弯弯曲曲我也要走过 .[02:36]从何时有你有你伴我给我热烈地拍和 .[02:40]像红日之火 燃点真的我 .[02:44]结伴行 千山也定能踏过 .[02:48]让晚风 轻轻吹过 .[02:52]伴送着清幽花香像是在祝福你我 .[02:56]让晚星 轻轻闪过 .[03:00]闪出你每个希冀如浪花 快要沾湿我 .[03:08]命运就算颠沛流离 .[03:10]命运就算曲折离奇 .[03:12]命运就算恐吓着你做人没趣味 .[03:15]别流泪 心酸 更不应舍弃 .[03:20]我愿能 一生永远陪伴你 .[03:25]命运就算颠沛流离 .[03:27]命运就算曲折离奇 .[03:29]命运就算恐吓着你做人没趣味 .[03:32]别流泪 心酸 更不应舍弃 .[03:36]我愿能 一生永远陪伴你 .[03:41]命运就算颠沛流离 .[03:43]命运就算曲折离奇 .[03:45]命运就算恐吓着你做人没趣味 .[03:48]别流泪 心酸 更不应舍弃 .[03:52]我愿能 一生永远陪伴你 .[03:57]命运就算颠沛流离 .[03:59]命运就算曲折离奇 .[04:01]命运就算恐吓着你做人没趣味 .[04:04]别流泪 心酸 更不应舍弃 .[04:08]我愿能 一生永远陪伴你 .[04:13]命运就算颠沛流离 .[04:15]命运就算曲折离奇 .[04:17]命运就算恐吓着你做人没趣味 .[04:20]别流泪 心酸 更不应舍弃 .[04:24]我愿能 一生永远陪伴你 .[04:28]哦~~ .[04:42] ";
	};
	if(s=="9"){
		ly="[00:01]你那么爱他 .[00:03]演唱：刘宁 .[00:06] .[00:36]直到爱消失你才懂得 .[00:41]去珍惜身边每个美好风景 .[00:47]只是他早已离去 .[00:52]直到你想通 .[00:54]他早已经不在对你留恋 .[01:01]最后的你 .[01:03]开始了一段挣扎 .[01:08]你那么爱他 .[01:10]为什么不把他留下 .[01:14]为什么不说心里话 .[01:18]你深爱他 .[01:21]这是每个人都知道啊 .[01:24]你那么爱他 .[01:26]为什么不把他留下 .[01:30]是不是你有深爱的两个他 .[01:37]所以你不想再让自己无法自拔 .[01:45] .[01:59]直到爱消失你才懂得 .[02:03]去珍惜身边每个美好风景 .[02:09]只是他早已离去 .[02:14]直到你想通 .[02:16]他早已经不在对你留恋 .[02:23]最后的你 .[02:25]开始了一段挣扎 .[02:29]哦～～～ .[02:30]你那么爱他 .[02:32]为什么不把他留下 .[02:36]为什么不说心里话 .[02:40]你深爱他 .[02:43]这是每个人都知道啊 .[02:46]你那么爱他 .[02:48]为什么不把他留下 .[02:52]是不是你有深爱的两个他 .[02:58]所以你不想再让自己无法自拔 .[03:06]哦～～～～～～ .[03:12]你那么爱他 .[03:14]为什么不把他留下 .[03:18]为什么不说心里话 .[03:22]你深爱他 .[03:24]这是每个人都知道啊 .[03:28]你那么爱他 .[03:30]为什么不把他留下 .[03:34]是不是你有深爱的两个他 .[03:40]所以你不想再让自己无法自拔"; 
	};
	if(s=="10"){
		ly="[00:01]歌曲：同桌的你 .[00:03]歌手：刘宁+糖宝 .[00:05]词曲：高晓松 .[00:07]吉它 贝斯： .[00:09]弦乐：乐团 .[00:11]口琴： .[00:13] .[00:29]明天你是否会想起 .[00:33]昨天你写的日记 .[00:36]明天你是否还惦记 .[00:40]曾经最爱哭的你 .[00:44]老师们都已想不起 .[00:48]猜不出问题的你 .[00:51]我也是偶然翻相片 .[00:55]才想起同桌的你 .[00:59]谁娶了多愁善感的你 .[01:02]谁看了你的日记 .[01:06]谁把你的长发盘起 .[01:10]谁给你做的嫁衣 .[01:14]歌曲：同桌的你 .[01:16]歌手：刘宁+糖宝 .[01:18] .[01:27]你从前总是很小心 .[01:31]问我借半块橡皮 .[01:35]你也曾无意中说起 .[01:39]喜欢跟我在一起 .[01:42]那时候天总是很蓝 .[01:46]日子总过得太慢 .[01:49]你总说毕业遥遥无期 .[01:53]转眼就各奔东西 .[01:57]谁遇到多愁善感的你 .[02:01]谁安慰爱哭的你 .[02:04]谁看了我给你写的信 .[02:08]谁把它丢在风里 .[02:15]歌曲：同桌的你 .[02:17]歌手：刘宁+糖宝 .[02:18] .[02:27]从前的日子都远去 .[02:30]我也将有我的妻 .[02:33]我也会给她看相片 .[02:37]给她讲同桌的你 .[02:40]谁娶了多愁善感的你 .[02:44]谁安慰爱哭的你 .[02:48]谁把你的长发盘起 .[02:52]谁给你做的嫁衣 .[02:55]啦 啦 啦 啦 .[03:27]歌曲：同桌的你 .[03:29]歌手：刘宁+糖宝 .[03:31] ";
	};
	if(s=="11"){
		ly="[00:01]等不到的爱 .[00:03]作词：易善佑 .[00:07]作曲：樊凡 .[00:10]演唱：刘宁 .[00:14] .[00:18]LRC编辑：宁静致远 QQ：441380237 .[00:28] .[00:32]你深邃的眼眸 想要透漏什么密码 .[00:40]犹豫的嘴角 躲在严肃的背影下 .[00:48]压抑的空气 回绕闭塞的城堡里 .[00:56]谜一般的天鹅 .[00:58]有你说不尽的故事 .[01:04]孤独的身影 只有钟声陪伴 .[01:11]敲进了城堡却敲不进你的心 .[01:19]冷淡的表情 只剩风霜遮掩我的身躯 .[01:29]遮住了天地遮不住你的情 .[01:35]你在等待着谁 建筑了城堡 .[01:43]等待着天鹅的栖息 .[01:47]藏不住你空虚的心灵 .[01:51]你在眺望着谁 拥有了世界 .[02:01]却拥有不了平凡的爱 .[02:07] .[02:18]宁静致远 QQ：441380237 .[02:30] .[02:40]孤独的身影 只有钟声陪伴 .[02:47]敲进了城堡却敲不进你的心 .[02:55]冷淡的表情 只剩风霜遮掩我的身躯 .[03:04]遮住了天地遮不住你的情 .[03:11]你在等待着谁 建筑了城堡 .[03:19]等待着天鹅的栖息 .[03:23]藏不住你空虚的心灵 .[03:27]你在眺望着谁 拥有了世界 .[03:37]却拥有不了平凡的爱 .[03:42] .[03:42]你在等待着谁 建筑了城堡 .[03:51]等待着天鹅的栖息 .[03:55]藏不住你空虚的心灵 .[04:00]你在眺望着谁 拥有了世界 .[04:09]却拥有不了平凡的爱 .[04:16] "; };
	if(s>11){
		ly="[00] .[00]纯音乐暂无歌词"
	};
 	return ly; 
} 
function show(t)//显示歌词 
{ 
	var div1=document.getElementById("lyr");//取得层
	document.getElementById("lyr").innerHTML=" ";//每次调用清空以前的一次 
	if(t<lytime[lytime.length-1])//先舍弃数组的最后一个
		{ 	
			for(var k=0;k<lytext.length;k++)
				{ 
	   			if(lytime[k]<=t&&t<lytime[k+1]) 
	   			{ scrollh=k*25;//让当前的滚动条的顶部改变一行的高度 
	   			div1.innerHTML+="<font color=#f60 style=font-weight:bold>"+lytext[k]+"</font><br>"; 
	   			} 
	   			else if(t<lytime[lytime.length-1])//数组的最后一个要舍弃
	   	 		div1.innerHTML+=lytext[k]+"<br>"; 
	 			} 
 		}
   else//加上数组的最后一个
      { 
         for(var j=0;j<lytext.length-1;j++) 
            div1.innerHTML+=lytext[j]+"<br>"; 
            div1.innerHTML+="<font color=red style=font-weight:bold>"+lytext[lytext.length-1]+"</font><br>"; 
      } 
} 
function scrollBar()//设置滚动条的滚动 
{ 
      if(document.getElementById("lyr").scrollTop<=scrollh) 
         document.getElementById("lyr").scrollTop+=1; 
      if(document.getElementById("lyr").scrollTop>=scrollh+50) 
         document.getElementById("lyr").scrollTop-=1; 
      window.setTimeout("scrollBar()",delay); 
} 
function getReady(s)//在显示歌词前做好准备工作 
{ 	
	var ly=getLy(s);//得到歌词
	//alert(ly);
	// lytext.length=0;
	// lytime.length=0;
	// lytext = new Array();
	// lytime = new Array();
	if (ly=="") {
		$("#lry").html("本歌暂无歌词！");
	};
	var arrly=ly.split(".");//转化成数组
  	//alert(arrly[1]);
  	tflag=0;
  	for( var i=0;i<lytext.length;i++)
	{
		lytext[i]="";
	}
	for( var i=0;i<lytime.length;i++)
	{
		lytime[i]="";
	}
  	$("#lry").html(" ");
  	document.getElementById("lyr").scrollTop=0;
	for(var i=0;i<arrly.length;i++) 
  	sToArray(arrly[i]);
  	// alert(lytext[2]);
  	// alert(lytime[2]);
	sortAr();
	//$("#lyr").html("");
  	// for(var j=0;j<lytext.length;j++) 
   //   { 
   //      document.getElementById("lyr").innerHTML+=lytime[j]+lytext[j]+"<br>"; 
   //   }
	scrollBar(); 
}
function sToArray(str)//解析如“[02:02][00:24]没想到是你”的字符串前放入数组
{  
	
   var left=0;//"["的个数
   var leftAr=new Array(); 
   for(var k=0;k<str.length;k++) 
   { 
      if(str.charAt(k)=="[") { leftAr[left]=k; left++; } 
   } 
   if(left!=0) 
   {
      for(var i=0;i<leftAr.length;i++) 
      {  
         lytext[tflag]=str.substring(str.lastIndexOf("]")+1);//放歌词 
         lytime[tflag]=conSeconds(str.substring(leftAr[i]+1,leftAr[i]+6));//放时间
         tflag++; 
      } 
   } 
     //alert(str.substring(leftAr[0]+1,leftAr[0]+6)); 
} 
function sortAr()//按时间重新排序时间和歌词的数组 
{ 
	var temp=null; var temp1=null; for(var k=0;k<lytime.length;k++) { for(var j=0;j<lytime.length-k;j++) { if(lytime[j]>lytime[j+1]) { temp=lytime[j]; temp1=lytext[j]; lytime[j]=lytime[j+1]; lytext[j]=lytext[j+1]; lytime[j+1]=temp; lytext[j+1]=temp1; } } } 
} 
function conSeconds(t)//把形如：01：25的时间转化成秒；
{	
   var m=t.substring(0,t.indexOf(":")); 
   var s=t.substring(t.indexOf(":")+1); 
   m=parseInt(m.replace(/0/,""));
   //if(isNaN(s)) s=0; 
   var totalt=parseInt(m)*60+parseInt(s); 
   //alert
   // (parseInt(s.replace(//b(0+)/gi,""))); 
   //if(isNaN(totalt))  return 0; 
  
	return totalt; 
} 
// function getSeconds()//得到当前播放器播放位置的时间 
// { var t=getPosition(); t=t.toString();//数字转换成字符串
//  var s=t.substring(0,t.lastIndexOf("."));//得到当前的秒 
//  //alert(s); 
//  return s; 
//  } 
//  function getPosition()//返回当前播放的时间位置
//   { var mm=document.getElementById("MediaPlayer1"); 
//    //var mmt=;
//    //alert(mmt); 
//    return mm.CurrentPosition; 
// } 
function mPlay()//开始播放
{ 
	// var ms=parseInt(getSeconds()); 
	// if(isNaN(ms)) show(0); 
	// else show(ms);
   var ms =audio.currentTime;
   show(ms); 
	window.setTimeout("mPlay()",100) 
}
function fPlay(){
	$(".start em[sonN="+songIndex+"]").click();
} 
// window.setTimeout("mPlay()",100);
// window.setTimeout("getReady()",100);
// function test()//测试使用，
// { 
// 	alert(lytime[lytime.length-1]); 
// }

// [00:00]漂洋过海来看你 .[00:04]演唱：刘明湘 .[00:08]作词：李宗盛 .[00:12]作曲：李宗盛 .[00:18]为你 我用了半年的积蓄 .[00:21]飘洋过海的来看你 .[00:26]为了这次相聚 .[00:28]我连见面时的呼吸 都曾反复练习 .[00:33] .[00:35]言语从来没能将我的情意 .[00:38]表达千万分之一 .[00:43]为了这个遗憾 我在夜里想了又想 .[00:48]不肯睡去 .[00:51] .[00:52]记忆它总是慢慢的累积 .[00:56]在我心中无法抹去 .[01:00]为了你的承诺 .[01:02]我在最绝望的时候 都忍着不哭泣 .[01:08] .[01:11]陌生的城市啊 熟悉的角落里 .[01:19]也曾彼此安慰 也曾相拥叹息 .[01:23]不管将会面对什么样的结局 .[01:27] .[01:28]在漫天风沙里望着你远去 .[01:31]我竟悲伤的不能自已 .[01:36]多盼能送君千里 直到山穷水尽 .[01:40]一生和你相依 .[01:44] .[02:03]陌生的城市啊 熟悉的角落里 .[02:12]也曾彼此安慰 也曾相拥叹息 .[02:16]不管将会面对什么样的结局 .[02:20] .[02:20]在漫天风沙里望着你远去 .[02:24]我竟悲伤的不能自已 .[02:28]多盼能送君千里 直到山穷水尽 .[02:33]一生和你相依 .[02:36] .[02:39]多盼能送君千里 直到山穷水尽 .[02:47]一生和你相依 .[02:55] 
//[00:00] 漂洋过海来看你.[00:02] 演唱：刘明湘.[00:04] 词曲：李宗盛.[00:08] 歌词编辑：丁仔.[00:15] 中文歌词库 www.dingzai.com.[00:21] 为你我用了半年的积蓄.[00:24] 飘洋过海的来看你.[00:29] 为了这次相聚.[00:31] 我连见面时的呼吸 都曾反复练习.[00:36] .[00:38] 言语从来没能将我的情意.[00:42] 表达千万分之一.[00:47] 为了这个遗憾 我在夜里想了又想.[00:51] 不肯睡去.[00:54] .[00:55] 记忆它总是慢慢的累积.[00:59] 在我心中无法抹去.[01:04] 为了你的承诺.[01:05] 我在最绝望的时候 都忍着不哭泣.[01:13] .[01:14] 陌生的城市啊 熟悉的角落里.[01:23] 也曾彼此安慰 也曾相拥叹息.[01:26] 不管将会面对什么样的结局.[01:30] .[01:31] 在漫天风沙里望着你远去.[01:35] 我竟悲伤的不能自已.[01:39] 多盼能送君千里 直到山穷水尽.[01:44] 一生和你相依.[01:49] .[02:07] 陌生的城市啊 熟悉的角落里.[02:15] 也曾彼此安慰 也曾相拥叹息.[02:19] 不管将会面对什么样的结局.[02:23] .[02:23] 在漫天风沙里望着你远去.[02:27] 我竟悲伤的不能自已.[02:32] 多盼能送君千里 直到山穷水尽.[02:36] 一生和你相依.[02:42] .[02:43] 多盼能送君千里 直到山穷水尽.[02:50] 一生和你相依


//[00:00]盛夏光年（live）.[00:03]作词：阿信·五月天.[00:04]作曲：阿信·五月天.[00:05]演唱：陈冰.[00:12].[00:14]我骄傲的破坏.[00:17]我痛恨的平凡.[00:19]才想起那些是我最爱.[00:23].[00:24]让盛夏去贪玩.[00:27]把残酷的未来.[00:29]狂放到光年外.[00:34].[00:34]放弃规则 放纵去爱.[00:39]放肆自己 放空未来.[00:44]我不转弯 我不转弯.[00:49]我不转弯 我不转弯.[00:56].[01:14]我要我疯 我要我爱 就是.[01:17]我要我疯 我要我爱.[01:19]一万首的mp3 一万次疯狂的爱.[01:21]灭不了一个渺小的孤单.[01:24].[01:25]我要我疯 我要我爱 就是.[01:27]我要我疯 我要我爱.[01:29]盛夏的一场狂欢 来到了光年之外.[01:32]长大难道是人必经的溃烂.[01:35].[01:36]放弃规则 放纵去爱.[01:40]放肆自己 放空未来.[01:45]我不转弯 我不转弯.[01:50]我不转弯 我不转弯.[01:58].[02:05]我不转弯.[02:15]我不转弯我不 我不转弯我不 我不转弯.[02:25]我不转弯.[02:36]
