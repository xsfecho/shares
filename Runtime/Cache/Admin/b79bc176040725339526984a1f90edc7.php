<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|股票管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/PCASClass.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        
        <!-- Logo -->
        <span class="logo yhy_logo">股票管理平台</span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->
        

        
        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
        
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(isset($_menu_list)): if(is_array($_menu_list)): $i = 0; $__LIST__ = $_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i; if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                            <ul class="side-sub-menu">
                                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                        <a class="item" href="<?php echo (U($menu["url"])); ?>">
                                            <?php echo ($menu["title"]); ?>
                                            <?php if($menu['have_summary'] == 1): ?><span style="display:inline-block;width:10px;height:10px;background-color:red;border-radius: 10px;"></span><?php endif; ?>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <?php if(!empty($_extra_menu)): ?>
                        <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                    <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                        <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                            <ul class="side-sub-menu">
                                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                        <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; ?>
                        <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <!-- 标题栏 -->
    <div class="main-title">
        <h2>交易结算</h2>
    </div>
    <div class="cf">
        <div class="fl">
            <a class="btn" href="<?php echo U('index?id='.$_user_info['id']);?>">已结交易</a>
            <!--button class="btn ajax-post confirm" url="<?php echo U('changeStatus?method=deleteUser');?>" target-form="ids">导 出</button-->
        </div>
    </div>

    <div class="nameinfo">
        <span>账户名：</span><?php echo ($_user_info["name"]); ?>&nbsp;&nbsp;
        <span>质押比例：</span><?php echo ($_user_info["pledge"]); ?>&nbsp;&nbsp;
        <span>保证金：</span><?php echo ($_user_info["ensure_money"]); ?>&nbsp;&nbsp;
        <span>可用资金：</span><?php echo ($_user_info["able_money"]); ?>&nbsp;&nbsp;

    </div>
    <!-- 数据列表 -->
    <div class="data-table table-striped">
        <table class="">
            <thead>
            <tr>
                <th class="">状态</th>
                <th class="">股票代码</th>
                <th class="">股票名称</th>
                <th class="">买入金额</th>
                <th class="">买入费用</th>
                <th class="">卖出金额</th>
                <th class="">卖出费用</th>
                <th class="">利息</th>
                <th class="">盈亏金额</th>
                <th class="">卖出时间</th>
                <th class="">管理员</th>
                <th class="">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["status_text"]); ?> </td>
                        <td><?php echo ($vo["shares_code"]); ?></td>
                        <td><?php echo ($vo["shares_name"]); ?></td>
                        <td><?php echo ($vo["buy_money"]); ?></td>
                        <td><?php echo ($vo["buy_cost"]); ?></td>
                        <td><?php echo ($vo["sell_money"]); ?></td>
                        <td><?php echo ($vo["sell_cost"]); ?></td>
                        <td><?php echo ($vo["interest"]); ?></td>
                        <td><span <?php if((0 > $vo['win_loss'])): ?>style="color:red;"<?php endif; ?>><?php echo ($vo["win_loss"]); ?></span></td>
                        <td><?php echo (date('Y-m-d H:i:s',$vo["sell_time"])); ?></td>
                        <td><?php echo ($vo["nickname"]); ?></td>
                        <td>
                            <a style="font-size: 14px;font-weight: bold;color: white;background-color: #5992CB;border-radius: 3px;padding: 5px;" href="<?php echo U('Account/winLoss_to_ensure?id='.$vo['id']);?>" class="confirm ajax-get bigbutton">盈亏转本金</a>
                            <!--a href="<?php echo U('Account/winLoss_to_cash?id='.$vo['id']);?>" class="authorize">盈亏结现</a-->
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                <td colspan="15" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="page">
        <?php echo ($_page); ?>
    </div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">股票管理平台</div>
                <div class="fr">V<?php echo (股票管理平台_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script src="/Public/static/thinkbox/jquery.thinkbox.js"></script>

    <script type="text/javascript">
        //搜索功能
        $("#search").click(function(){
            var url = $(this).attr('url');
            var query  = $('.search-form').find('input').serialize();
            query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
            query = query.replace(/^&/g,'');
            if( url.indexOf('?')>0 ){
                url += '&' + query;
            }else{
                url += '?' + query;
            }
            window.location.href = url;
        });
        //回车搜索
        $(".search-input").keyup(function(e){
            if(e.keyCode === 13){
                $("#search").click();
                return false;
            }
        });
        //导航高亮
        var id = <?php echo ($_user_info["id"]); ?>;
        highlight_subnav("<?php echo U('Account/un_deal_list/id/"+id+"');?>");
    </script>

</body>
</html>