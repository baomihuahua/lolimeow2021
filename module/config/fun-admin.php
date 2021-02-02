<?php
function boxmoe_options_menu_filter($menu) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = 'Boxmoe主题设置';
	$menu['menu_title'] = 'Boxmoe主题设置';
	$menu['menu_slug'] = 'boxmoe-options';
	return $menu;
}
add_filter('optionsframework_menu', 'boxmoe_options_menu_filter');
//自动给修改网站登陆页面logo
function customize_login_logo(){         
    echo '<style type="text/css">
        .login{position: relative;width: 100%;background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, #ff5f6d 0%, #ffb270 100%) repeat scroll 0 0;background: rgba(0, 0, 0, 0) linear-gradient(to right, #ff5f6d 0%, #ffb270 100%) repeat scroll 0 0;overflow: hidden;background-size: cover;background-position: center center;z-index: 1;background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);}.login h1 a { background-image:url('.get_template_directory_uri() .'/assets/images/logo.png); width: 180px; max-height: 100px;margin: 20px auto 15px; background-size: contain;background-repeat: no-repeat;background-position: center center;}
		.login form{border-radius: 10px;}
        </style>';   
  
}  
add_action('login_head', 'customize_login_logo');   

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return '';
}

// 后台Ctrl+Enter提交评论回复
add_action('admin_footer', '_admin_comment_ctrlenter');
function _admin_comment_ctrlenter() {
	echo '<script type="text/javascript">
        jQuery(document).ready(function($){
            $("textarea").keypress(function(e){
                if(e.ctrlKey&&e.which==13||e.which==10){
                    $("#replybtn").click();
                }
            });
        });
    </script>';
};
//版权信息
function example_footer_admin () {
echo '<span id="footer-thankyou">感谢使用<a href="https://cn.wordpress.org/">WordPress</a>进行创作。Theme by <a href="https://www.boxmoe.com/" style="color:red;">Lolimeow</a></span> ';
}
add_filter('admin_footer_text', 'example_footer_admin');
//编辑器TinyMCE增强
function enable_more_buttons($buttons)
{
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'wp_page';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	return $buttons;
}
add_filter("mce_buttons_3", "enable_more_buttons");
// 后台编辑器添加下拉式按钮
function boxmoe_select(){
echo '
<select id="short_code_select">
	<option value="短代码选择！">Boxmoe短代码</option>
	<option value="<h2>内容</h2>">H2</option>
	<option value="<h3>内容</h3>">H3</option>
	<option value="<h2 class=\'section-title\'><span><i class=\'fa fa-paint-brush\'></i>文字</span></h2>">H2设置标</option>
	<option value="<h2 class=\'section-title\'><span><i class=\'fa fa-cloud-download\'></i>文字</span></h2>">H2下载标</option>
	<option value="<a href=\'链接地址\' rel=\'noopener\' target=\'_blank\' class=\'download_btn\' data-toggle=\'tooltip\' data-original-title=\'该资源来源于网络如有侵权,请联系删除.\'>下载按钮</a>">下载按钮</option>
	<option value="<a href=\'链接地址\' rel=\'noopener\' target=\'_blank\' class=\'links_btn\' >链接按钮</a>">链接按钮</option>
	<option value="<div class=\'quote\'><blockquote><p>内容段</p><cite>签名</cite></blockquote></div>">引用Blockquote-1</option>
	<option value="<div class=\'animated-border-quote\'><blockquote><p>内容段</p><cite>签名</cite></blockquote></div>">引用Blockquote-2</option>
	<option value="<ul class=\'ol\'><ol>ol内容段</ol></ul>">OL列表</option>
	<option value="<div class=\'link-title wow rollIn\'>内容段</div>">飞进来的模块</option>
	<option value="<span class=\'badge badge-pill badge-danger mt10 mb10\'>内容</span>">红色药丸</option>
	<option value="<span class=\'badge badge-pill badge-primary mt10 mb10\'>内容</span>">蓝色药丸</option>
	<option value="<span class=\'badge badge-pill badge-success mt10 mb10\'>内容</span>">绿色药丸</option>
	<option value="<span class=\'badge badge-pill badge-info mt10 mb10\'>内容</span>">蓝色药丸</option>
	<option value="<span class=\'badge badge-pill badge-warning mt10 mb10\'>内容</span>">黄色药丸</option>
	<option value="<pre class=\'prettyprint linenums\'>代码内容</pre>">代码高亮</option>
	<option value="data-fancybox=\'images\'">灯箱(添加在a元素里)</option>
	<option value="<a href=\'javascript:;\' data-fancybox data-type=\'iframe\' data-src=\'这里替换成链接\'>链接文字</a>">iframe链接</option>	
	<option value="<div class=\'alerts\'><strong>NOTE:</strong>文字</div>">警告框</option>
	<option value="<div class=\'alerts infos\'><strong>NOTE:</strong>文字</div>">info警告框</option>
	<option value="<div class=\'alerts error\'><strong>NOTE:</strong>文字</div>">error警告框</option>
	<option value="<div class=\'alerts success\'><strong>NOTE:</strong>文字</div>">success警告框</option>
	<option value="[userreading]隐藏内容[/userreading]">登录查看一</option>
	<option value="[userreading notice=\'未登录时候显示的内容\']隐藏内容[/userreading]">登录查看二</option>
	<option value="<!--nextpage-->">文章分页</option>
	<option value="<div class=\'timeline timeline-one-side\' data-timeline-content=\'axis\' data-timeline-axis-style=\'dashed\'>
<div class=\'timeline-block\'>
<span class=\'timeline-step badge-success\'>
<i class=\'fa fa-bell\'></i>
</span>
<div class=\'timeline-content\'>
<small class=\'text-muted font-weight-bold\'>2021年1月1日</small
<h5 class=\' mt-3 mb-0\'>主题</h5>
<p class=\' text-sm mt-1 mb-0\'>内容段</p>
</div>
</div>
<!--时间段时间开始-->
<div class=\'timeline-block\'>
<span class=\'timeline-step badge-success\'>
<i class=\'fa fa-clock-o\'></i>
</span>
<div class=\'timeline-content\'>
<small class=\'text-muted font-weight-bold\'>2021年1月1日</small
<h5 class=\' mt-3 mb-0\'>主题</h5>
<p class=\' text-sm mt-1 mb-0\'>内容段</p>
</div>
</div>
<!--时间段时间结束，此段可无限复制往下排列-->


<!--以上时间段区--></div>">时间线</option>
</select>';
}
if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
	add_action('media_buttons', 'boxmoe_select', 11);
}

function boxmoe_button() {
echo '<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#short_code_select").change(function(){
			send_to_editor(jQuery("#short_code_select :selected").val());
			return false;
		});
	});
</script>';
}
add_action('admin_head', 'boxmoe_button');

?>