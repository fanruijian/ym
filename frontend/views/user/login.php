<?php
use yii\helpers\Url;
?>
<?php \frontend\assets\LoginAsset::register($this);?>
	<div class="login_wrapper">
		<div class="login_header">
        	<a href="{:U('Home/Index/index')}"><img src="../Public/HomeStyle/images/logo_white.png" width="285" height="62" alt="" /></a>
            <div id="cloud_s"><img src="../Public/HomeStyle/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="../Public/HomeStyle/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>
        
    	<input type="hidden" id="resubmitToken" value="" />		
		 <div class="login_box">
        	<form id="loginForm" action="<?php echo Url::toRoute('user/aaa');?>" method='post'>
				<input type="text" id="email" name="email" value="" tabindex="1" placeholder="请输入登录邮箱地址" />
			  	<span class="error" style="display:none;" id="beError"></span>
				<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
				<span class="error" style="display:none;" id="beError"></span>
			    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
			    <a href="reset.html" class="fr" target="_blank">忘记密码？</a>
				<a id="subbb" style="color:#fff;" class="submitLogin" title="登 &nbsp; &nbsp; 录"/>登 &nbsp; &nbsp; 录</a>
			</form>
			<div class="login_right">
				<div>还没有帐号？</div>
				<a  href="<?php echo Url::toRoute('user/register');?>"  class="registor_now">立即注册</a>
			   <!--  <div class="login_others">使用以下帐号直接登录:</div>
			    <a  href="h/ologin/auth/sina.html"  target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
			    <a  href="h/ologin/auth/qq.html"  class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a> -->
			</div>
        </div>
        <div class="login_box_btm"></div>
    </div>
<?php $this->beginBlock('test'); ?>
            var ep=false;
			$('#email').blur(function(){
				$.post('<?php echo Url::toRoute('user/aaa');?>',{'email':$('#email').val()},function(msg){
					if(msg){								
						$('#email').next().html('');
						ep=true;				
					}else{
						$('#email').next().css({display:'block',color:'red'});
						$('#email').next().html('用户名不存在');
					}
				});
			});
			$('#subbb').click(function(){
				$.post('<?php echo Url::toRoute('user/bbb');?>',{'email':$('#email').val()},function(msg){
					if(msg){								
						$('#email').next().html('');
						ep=true;				
					}else{
						$('#email').next().css({display:'block',color:'red'});
						$('#email').next().html('用户名不存在');
					}
				});
			});	
        <?php $this->endBlock() ?>
        <!-- 将数据块 注入到视图中的某个位置 -->
        <?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
</body>
</html>