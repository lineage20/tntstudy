<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title><?php echo $data['title']?>_宁静致远 - 刘宁</title>

<meta name="baidu_union_verify" content="1f4bf8fb796d8702f9dcff06a09ed8ff">
<meta name="keywords" content="PHP 防sql注入,php技术,PHP编程宁静致远,刘宁,个人网站" />
<meta name="description" content="php自带的几个防止sql注入的函数" />
<meta name="generator" content="Discuz! X3.2" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2013 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<meta name="application-name" content="宁静致远" />
<meta name="msapplication-tooltip" content="宁静致远" />
<link rel="shortcut icon" href="/public/images/favicon.ico">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?1ef7ac1602114b715ac1ed4759c7343f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

 <script type="text/javascript" src="/public/static/index/js/common.js"></script><script type="text/javascript" src="/public/static/index/js/logging.js"></script><script type="text/javascript" src="/public/static/index/js/comlimi.js"></script><script type="text/javascript" src="/public/static/index/js/comlimi_pic.js"></script><script type="text/javascript" src="/public/static/index/js/jquery_comlimi.js"></script><script type="text/javascript" src="/public/static/index/js/portal.js"></script>

 <link rel="stylesheet" type="text/css" href="/public/static/index/css/style_16_common.css" /><link rel="stylesheet" type="text/css" href="/public/static/index/css/style_16_portal_index.css" /><link rel="stylesheet" type="text/css" href="/public/static/index/css/style.css" />
 
<script type="text/javascript">jQuery.noConflict();</script>
</head>

<body id="nv_portal" class="pg_index" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="comlimi_header">
	<div id="toptb" class="comlimi_toptb cl">
		<div class="wp tool">
			<div class="z" id="comlimi_mob">
				<a target="_blank" href="mobile/">手机版</a>
				<a href="javascript:;"  onclick="setHomepage('/');">设为首页</a>
				<a href="/"  onclick="addFavorite(this.href, '宁静致远');return false;">收藏本站</a>
			</div>
			<div class="y">
				<a id="switchblind" href="javascript:;" onclick="toggleBlind(this)" title="开启辅助访问" class="switchblind">开启辅助访问</a>
				<a href="http://weibo.com/u/3883801623/home?wvr=5" >新浪微博</a><a href="javascript:void(0);" >认证空间</a></div>
			</div>
		</div>

<!--     	<ul id="cuser_menu" class="p_pop nav_pop" style="display:none">
			<li><a href="http://www.suibiwang.com.php?mod=space&amp;do=notice" target="_blank">提醒</a></li>
			<li><a href="http://www.suibiwang.com.php?mod=space&amp;do=pm" target="_blank">消息</a></li>
			<li></li>
        	<li><a href="http://www.suibiwang.com.php?mod=spacecp">我的设置</a></li>
            <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=2af22305">退出登录</a></li>
    	</ul>
    	<div id="qmenu_menu" class="p_pop blk" style="display: none;">
			<div class="ptm pbw hm">请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=register" class="xi2 xw1">读者注册</a>
			</div>
		</div> -->
		<div id="hd" class="comlimi_head">
			<div class="logo comlimi_fl cl">
                <h2><a href="/" title="宁静致远"><img src="/public/static/common/images/xjx.png" alt="宁静致远" border="0" /></a></h2>
            </div>
            <div class="left comlimi_fr">
     			
<!--             	<div class="right comlimi_fr">
            		<a class="s-weibo" href="http://weibo.com/suibiwang" title="关注新浪微博"></a>
           			<a class="t-weibo" href="http://t.qq.com/suibiwi" title="关注腾讯微博"></a>
            		<a class="i-qzone" href="http://suibiwang.qzone.qq.com" title="关注认证空间"></a>
            		<a class="i-marks" href="http://www.suibiwang.com" title="加入收藏夹" onclick="addFavorite(this.href, '随笔网');return false;"></a>
					<button class="tougao_btn comlimi_fr i-write" href="http://www.suibiwang.com/forum-142-1.html" onclick="tougao()">在线投稿</button>
				</div> -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear"></div>

<div id="nv" class="comlimi_nav">
	<div class="comlimi_wrap" style="height: 45px;">
<!-- 		<div class="comlimi_userbox y">
			<a href="javascript:;" id="qmenu" onmouseover="delayShow(this, function () {showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});showForummenu(0);})">快捷导航</a>
    
			<form method="post" autocomplete="off" id="lsform" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;infloat=yes&amp;lssubmit=yes" onsubmit="return lsSubmit();">
				<div class="fastlg cl">
					<span id="return_ls" style="display:none"></span>
					<div class="comlimi_login_k z">
						<a onclick="showWindow('login', this.href);return false;" href="member.php?mod=logging&amp;action=login" rel="nofollow" class="login">登录</a>
						<a href="member.php?mod=register" rel="nofollow" class="register">注册</a>
					</div>
 				</div>
			</form>

    	</div> -->
		<ul>
            <li  id="mn_portal" >
                <a href="/" hidefocus="true" title="Portal"  >首页</a>
            </li>
            <li id="mn_P1"   >
                <a href="<?php echo U('/index/jishu')?>" hidefocus="true">编程技术</a>
            </li>
            <li id="mn_P28"   >
                <a href="<?php echo U('/index/suibi')?>" hidefocus="true">随笔散文</a>
            </li>
            <!-- <li id="mn_forum_2"   >
                <a href="<?php echo U('/index/music')?>" hidefocus="true" title="BBS">&#9832;我的云音乐</a>
            </li>
            <li id="mn_Nd569"  >
                <a href="<?php echo U('/index/game')?>" hidefocus="true">游戏视频</a>
            </li>
            <li id="mn_N5149" class="a" >
                <a href="<?php echo U('/index/xiami')?>"  hidefocus="true" title="快来抒发您的心情吧">宁静致远</a> -->
            </li>
            <li id="mn_N455c"   >
                <a href="<?php echo U('/index/liuyan')?>" hidefocus="true">留言墙</a>
            </li>
            <!-- <li id="mn_N7053" >
                <a href="<?php echo U('/index/fengyun')?>" hidefocus="true" target="_blank"   style="color: yellow">关于我</a>
            </li> -->
        </ul>
 	</div>
</div>

<ul class="p_pop h_pop" id="plugin_menu" style="display: none">  
	<li><a href="javascript:void(0);" id="mn_plink_sign">每日签到</a></li>
</ul>
<div class="sub_nav"> 
	<div class="p_pop h_pop" id="mn_userapp_menu" style="display: none"></div> 
</div>
<div class="comlimi_wrap"> 
	<div id="mu" class="comlimi_mu cl">
		<ul class="cl " id="snav_mn_userapp" style="display:none"></ul>
    </div>
</div>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
        }else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
    ar s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<div class="comlimi_subnav">
    <ul>
        <!---->
    </ul>
</div>
<div id="wp" class="wp comlimi_container list_repeat">
<div class="container_bd list_top">
<div class="main-wrap">
<div class="clear"></div>

<link rel="stylesheet" type="text/css" href="/public/static/index/css/style_16_portal_view.css" />
<style type="text/css">
.bd-reward-stl {font-family: "microsoft yahei";text-align: center;background: #f1f1f1;padding: 10px 0;color: #666;margin: 20px auto;width: 90%;}
p.bd-pay-info {font-size: 15px;margin: 0 0 10px;}
#bdRewardBtn {border: 0;outline: 0;border-radius: 100%;padding: 0;margin: 0;}
#bdRewardBtn span {display: inline-block;width: 50px;height: 50px;border-radius: 100%;line-height: 58px;color: #fff;font: 400 25px/50px 'microsoft yahei';background: #FEC22C;}
#download{font-size: 14px;height:28px;width: 100%;margin: 20px auto 0;color:#FF7E00;background-color: #FDFFF7;}
#download a{color:#719D00;}
#download a:hover{color:#ff7e00;}
</style>
<script type="text/javascript">zoomstatus = parseInt(1), imagemaxwidth = '660', aimgcount = new Array();</script>
<script type="text/javascript">
  function errorhandle_clickhandle(message, values) {
    if(values['id']) {
      showCreditPrompt();
      show_click(values['idtype'], values['id'], values['clickid']);
    }
  }
  window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>

<style id="diy_style" type="text/css"></style>
<div class="wp"><div id="diy1" class="area"></div></div>

<div id="ct" class="ct2 wp cl">
    <div class="article-left">
        <div class="comlimi_title">
          <h3>当前位置</h3>：&nbsp;
          <a href="" class="breadcrumb">首页</a>
          <a href="<?php echo U('/articleType/index',array('id'=>$type['id']))?>" class="breadcrumb"><?php echo $type['name']?></a>
          <em>查看内容</em>
        </div>
        <div class="list-item vw">
            <div class="comlimi_content">
                <div class="_comlimi_title"><h1><?php echo $data['title']?></h1></div>
                <div class="comlimi_info">
                    <span><i class="ico-19"></i></span>
                    <span><i class="ico-19"></i><a href="javascript:void(0);" >文章</a></span>
                    <span><i class="ico-28"></i>2017-08-18</span>
                    <span><i class="ico-29"></i><span id="article_click"><em id="_viewnum"><?php echo $data['hits']?></em></span>次</span>
                    <span><i class="ico-30"></i><a href="javascript:doZoom(18);">大</a> <a href="javascript:doZoom(16);">中</a> <a href="javascript:doZoom(14);">小</a></span>
                </div>
                <div id="diysummarytop" class="area"></div>
                <div class="comlimi_tipsbox">
                  <div><strong>摘要: </strong><?php echo $data['remark']?></div>
                </div>
                <div id="diysummarybottom" class="area"></div>
                <div class="d comlimi_article">
                    <div id="diycontenttop" class="area"></div>
                   <?php echo htmlspecialchars_decode($data['content'])?>
                                         <div class="bd-reward-stl"><button id="bdRewardBtn"><span>赞</span></button></div> 
                    
                    <div id="diycontentclickbottom" class="area"></div>
                </div>
                <div class="handover">
                    <div class="box">
                        <a href="javascript:void(0);" class="prev" title="上一篇：那年，那月，那前世的光阴">那年，那月，那前世的光阴</a>
                        <a class="rand" href="javascript:void(0);" id="a_share" onclick="showWindow(this.id, this.href, 'get', 0);" title="分享这篇到日志？">分享</a>
                        <a class="nonext" title="没有了">没有了</a>
                    </div>
                </div>
                <div id="diycontentbottom" class="area"></div>
                <div class="o cl ptm pbm"><!--百度分享 Star-->
                    <div class="userStyle">
                        <div class="bdsharebuttonbox z" style="width:260px;">
                            <span>分享到：</span>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                            <a href="#" class="bds_more" data-cmd="more"></a>
                        </div>
                    </div>
                    <a href="javascript:void(0);" id="a_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" class="oshr ofav">收藏</a>
                    <a href="javascript(0);" id="a_invite" onclick="showWindow('invite', this.href, 'get', 0);" class="oshr oivt">邀请</a>
                    <div class="comlimi_ptm"></div>
                </div>
            </div>
            <div id="diycontentrelatetop" class="area"></div>

            <!-- 美图推荐 -->
            <div class="likepic">
              <div class="top"><h3>美图推荐</h3>  </div>
              <div id="comlimi_meiwen_diy04" class="area">
                  <div id="framefg8080" class="cl_frame_bm frame move-span cl frame-1">
                      <div id="framefg8080_left" class="column frame-1-c">
                          <div id="framefg8080_left_temp" class="move-span temp"></div>
                          <div id="portal_block_3939" class="cl_block_bm block move-span">
                              <div id="portal_block_3939_content" class="dxb_bc">
                                  <div class="photo">
                                    <ul class="box">
                                        <?php foreach($img as $key=>$vo):?>
                                        <li <?php if($key==3||$key==7){ echo "class='i_0'"; }?>>
                                            <a href="<?php echo U('/article/index',array('id'=>$vo['id']))?>" title="">
                                                <img src="<?php echo $vo['images']?>" width="160" height="120" alt=" <?php echo $vo['title']?>">
                                                <span><?php echo $vo['title']?></span>
                                            </a>
                                        </li>
                                        <?php endforeach;?>
                                        </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- 美图推荐 -->

            <!-- 评论 开始-->
  <!--           <div id="diycontentrelate" class="area"></div>
            <div id="comment" class="bm">
                <div class="comlimi_title cl"><h3>最新评论</h3></div>
                <div id="comment_ul" class="bm_c">
                    <form id="cform" name="cform" action="portal.php?mod=portalcp&ac=comment" method="post" autocomplete="off">
                        <div class="tedt" style="width: 688px;">
                            <div class="area">
                                <textarea name="message" rows="3" class="pt" id="message" placeholder="文明阅读，理性发言" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="portal_referer" value="portal.php?mod=view&aid=4666#comment">
                        <input type="hidden" name="referer" value="portal.php?mod=view&aid=4666#comment" />
                        <input type="hidden" name="id" value="0" />
                        <input type="hidden" name="idtype" value="" />
                        <input type="hidden" name="aid" value="4666">
                        <input type="hidden" name="formhash" value="2af22305">
                        <input type="hidden" name="replysubmit" value="true">
                        <input type="hidden" name="commentsubmit" value="true" />
                        <p class="ptn pnpost"><button type="submit" name="commentsubmit_btn" id="commentsubmit_btn" value="true" class="comlimi_submit submit"><strong>发表评论</strong></button></p>
                    </form>
                </div>
            </div> -->
            <!--高速版-->
            <div id="SOHUCS" sid="请将此处替换为配置SourceID的语句"></div>
            <script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
            <script type="text/javascript">
            window.changyan.api.config({
            appid: 'cyt0kP5Iu',
            conf: 'prod_6314592dd490825ee415d3f5f4b8d7b2'
            });
            </script>
            <!-- 评论 结束 -->

            <div id="diycontentcomment" class="area"></div>
            <div class="mtn">
                <div id="diy3" class="area"></div>
            </div>
        </div>
    </div>
    <div class="article-right pph">
        <div class="drag">
            <div id="diyrighttop" class="area"></div>
        </div>
        
        <!-- 相关分类  开始 -->
        <div class="right-item comlimi_lanmu">
            <div class="comlimi_title cl">
                <h3>相关分类</h3>
            </div>
            <div class="bm_c">
                <ul class="xl xl2 comlimi_lmul cl">
                <?php foreach($randtype as $vo):?>
                    <li>
                        <a href="<?php echo U('/articleType/index',array('id'=>$vo['id']))?>" title="<?php echo $vo['name']?>"><?php echo $vo['name']?>
                        </a>
                    </li>
                <?php endforeach;?>
                </ul>
            </div>
        </div>
        <!-- 相关分类  结束-->
        
        <!-- 本周推荐  开始-->
        <div class="right-item">
            <div class="comlimi_title">
                <h3>最新上线</h3>
            </div>
            <div id="comlimi_meiwen_diy01" class="area">
                <div id="frameWkpoeJ" class="cl_frame_bm frame move-span cl frame-1">
                    <div id="frameWkpoeJ_left" class="column frame-1-c">
                        <div id="frameWkpoeJ_left_temp" class="move-span temp"></div>
                        <div id="portal_block_3936" class="cl_block_bm block move-span">
                            <div id="portal_block_3936_content" class="dxb_bc">
                                <div class="box">
                                <?php foreach($article as $key=>$vo):?>
                                    <li>
                                      <span class="<?php echo $vo['class']?>"><?php echo $key+1;?></span>
                                      <a href="<?php echo U('/article/index',array('id'=>$vo['id']))?>" title="<?php echo $vo['title']?>" target="_blank"><?php echo $vo['title']?></a>
                                    </li>
                                <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 本周推荐  结束-->

        <div class="drag">
            <div id="diy2" class="area"></div>
        </div>
        <!-- 热点阅读  开始-->
        <div class="right-item">
            <div class="comlimi_title"><h3>心情随笔</h3></div>
            <div id="comlimi_meiwen_diy02" class="area">
                <div id="frameOxbaaB" class="cl_frame_bm frame move-span cl frame-1">
                    <div id="frameOxbaaB_left" class="column frame-1-c">
                        <div id="frameOxbaaB_left_temp" class="move-span temp"></div>
                        <div id="portal_block_3937" class="cl_block_bm block move-span">
                            <div id="portal_block_3937_content" class="dxb_bc">
                                <div class="box">
                                <?php foreach($suibi as $key=>$vo):?>
                                    <li>
                                      <span class="<?php echo $vo['class']?>"><?php echo $key+1;?></span>
                                      <a href="<?php echo U('/article/index',array('id'=>$vo['id']))?>" title="<?php echo $vo['title']?>" target="_blank"><?php echo $vo['title']?></a>
                                    </li>
                                <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 热点阅读  结束-->
        <div class="drag">
            <div id="diy4" class="area"></div>
        </div>
        <!-- 随机推荐  开始-->
        <div id="right-box">
            <div id="right-ad">
                <div class="right-item">
                    <div class="comlimi_title"><h3>游戏视频</h3></div>
                    <div id="comlimi_meiwen_diy03" class="area">
                        <div id="frameG99mRO" class="cl_frame_bm frame move-span cl frame-1">
                            <div id="frameG99mRO_left" class="column frame-1-c">
                                <div id="frameG99mRO_left_temp" class="move-span temp"></div>
                                <div id="portal_block_3938" class="cl_block_bm block move-span">
                                    <div id="portal_block_3938_content" class="dxb_bc">
                                        <div class="box">
                                        <?php foreach($game as $key=>$vo):?>
                                            <li>
                                              <span class="<?php echo $vo['class']?>"><?php echo $key+1;?></span>
                                              <a href="<?php echo U('/article/index',array('id'=>$vo['id']))?>" title="<?php echo $vo['title']?>" target="_blank"><?php echo $vo['title']?></a>
                                            </li>
                                        <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 随机推荐  结束-->
 <script type="text/javascript" src="/public/static/index/js/scrollad.js"></script><script type="text/javascript" src="/public/static/index/js/discuz_tips.js"></script><script type="text/javascript" src="/public/static/index/js/top.js"></script>
</div> 
<div class="c1 container_bottom"></div>
</div>
</div>
  
</div>
<!-- 回到顶部 -->
<a id="toup" href="javascript:;" title="&#22238;&#39030;&#37096;" onclick="goTop();"></a>

<div id="ft" class="comlimi_footer">
    <p class="p_1">
        <a href="javascript:void(0);" >申请友链</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);" >关于我们</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);" >小黑屋</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);" >Archiver</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);" >申请认证</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);" >手机版</a>
        <span class="pipe">|</span>
        <a href="javascript:void(0);" >App下载</a>
        <span class="pipe">|</span>
    </p>
    <p class="p_2"> 
        Copyright &copy; 2012-2016 
        <a href="javascript:void(0);" target="_blank">宁静致远 Inc.</a>
        &nbsp; All Rights Reserved.&nbsp; 
        <a href="javascript:void(0);" target="_blank">宁静致远</a>
        &nbsp; 版权所有 &nbsp;
        <span class="pipe">|</span>
        <a href="sitemap.xml" target="_blank" title="网站地图">网站地图</a>
        <a href="http://wpa.qq.com/msgrd?v=3&uin=441380237&site=qq&menu=yes" target="_blank" title="QQ">  
            <img src="/public/static/index/images/site_qq.jpg" alt="QQ" />
        </a>&nbsp;
        <meta name="baidu_union_verify" content="df6591fe416d4aadb483900e83e3a802">
    </p>
    <p class="p_2">Powered by 
        <a href="javascript:void(0);" target="_blank">心随互联！</a> 
        <em>X3.2</em>&nbsp;技术支持：
        <a href="javascript:void(0);" target="_blank">宁静致远运营部</a> &nbsp;备案信息：
        <a href="javascript:void(0);" target="_blank">赣ICP备16007291号-1</a>
    </p>
    <div class="footer_service">
        <p class="p_2">本站大部分界面参照
            <a href="http://www.suibiwang.com" style="color:#8EC61D;">随笔网</a>，站内部分内容则从美文网或技术博客上摘录并非原创，希望大家谅解！
        </p>
        <p class="p_2">所有作品版权归原创作者所有，与本站立场无关，如不慎侵犯了你的权益，请联系我们告知，我们将做删除处理！</p>
    </div>
</div>
<div id="scrolltop">
<span hidefocus="true">
    <a title="返回顶部" onclick="window.scrollTo('0','0')" class="scrolltopa" >
        <b>返回顶部</b></a>
    </span>
</div>
<div id="discuz_tips" style="display:none;"></div>

<!-- 网站公共弹框 -->
<!-- <div id='window-bg'></div>
<div id='float_box'>
    弹框
</div>
<script type="text/javascript">
(function($) {
       $('#window-bg').hide();
       $('#float_box').hide();
})(jQuery)
</script> -->
<script type="text/javascript">
function close19login(){
    $('#J_loginGuide').hide();
}
</script>
<!-- 微信链接图片 -->
<div>
    <img  style='width:0px;height:0px;' src='/public/static/index/images/share.JPG' />
</div>
<!-- 微信链接图片 -->
</body>
</html>