<?php
/**
 * Template Name: Boxmoe登录页
 *  防止刷新页面重复提交数据
 */
 if(!isset($_SESSION))
  session_start();
  
if( isset($_POST['md_token']) && ($_POST['md_token'] == $_SESSION['md_token'])) {
  $error = '';
  $secure_cookie = false;
  $user_name = sanitize_user( $_POST['log'] );
  $user_password = $_POST['pwd'];
  if ( empty($user_name) || ! validate_username( $user_name ) ) {
    $error .= '<strong>错误</strong>：请输入有效的用户名。<br />';
    $user_name = '';
  }
  
  if( empty($user_password) ) {
    $error .= '<strong>错误</strong>：请输入密码。<br />';
  }
  
  if($error == '') {
    // If the user wants ssl but the session is not ssl, force a secure cookie.
    if ( !empty($user_name) && !force_ssl_admin() ) {
      if ( $user = get_user_by('login', $user_name) ) {
        if ( get_user_option('use_ssl', $user->ID) ) {
          $secure_cookie = true;
          force_ssl_admin(true);
        }
      }
    }
	  

      $redirect_to = ''.site_url().'?page_id='.get_boxmoe('users_page').'';

	
    if ( !$secure_cookie && is_ssl() && force_ssl_login() && !force_ssl_admin() && ( 0 !== strpos($redirect_to, 'https') ) && ( 0 === strpos($redirect_to, 'http') ) )
      $secure_cookie = false;
	
    $creds = array();
    $creds['user_login'] = $user_name;
    $creds['user_password'] = $user_password;
    $creds['remember'] = !empty( $_POST['rememberme'] );
    $user = wp_signon( $creds, $secure_cookie );
    if ( is_wp_error($user) ) {
      $error .= $user->get_error_message();
    }
    else {
      unset($_SESSION['md_token']);
      wp_safe_redirect($redirect_to);
    }
  }

  unset($_SESSION['md_token']);
}

$rememberme = !empty( $_POST['rememberme'] );
  
$token = md5(uniqid(rand(), true));
$_SESSION['md_token'] = $token;
?>
<?php 
if (!is_user_logged_in()) { get_header();?>
<link rel='stylesheet'  href='<?php echo boxmoe_load_style();?>/assets/css/login.css' type='text/css' media='all' />
      <div class="container">
        <div class="section-head">
          <span>Login</span></div>
      </div>
      <div class="boxmoe-blog-content mb30">
        <div class="container form-body">
          <div class="row">
            <div class="col-md-10 col-lg-10 ml-auto mr-auto">	  
            <div class="form-holder">			
                <div class="form-content" style="background-image: url('<?php echo boxmoe_load_style();?>/assets/images/login.jpg');">
                    <div class="form-items">
                        <div class="page-links">
                            <a href="<?php get_login_url(); ?>?r=<?php get_user_url(); ?>" class="active">登录会员</a><a href="<?php get_reg_url(); ?>">注册会员</a>
                        </div>
                        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" >
                            <input class="form-control" type="text" name="log" id="log" value="<?php if(!empty($user_name)) echo $user_name; ?>" placeholder="Email或用户名">
                            <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Password" value="">
							 <div class="custom-control custom-checkbox"> 
							 <input class="custom-control-input" name="rememberme" type="checkbox" id="rememberme" value="1" <?php checked( $rememberme ); ?>>
							 <label class="custom-control-label" for="rememberme">
							 <span>记住账户</span>
							 </label>
							 </div>
                            <div class="form-button">
							<input type="hidden" name="md_token" value="<?php echo $token; ?>" />
				            <input type="hidden" name="redirect_to" value="<?php echo $redirect_to; ?>" />
                            <button id="submit" type="submit" class="ibtn">登录 ^_^</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>如果忘记密码你有两种选择(╥﹏╥)</span><a href="<?php echo site_url('/') ?>wp-login.php?action=lostpassword">1.找回密码</a><a href="<?php echo get_boxmoe('users_reg') ?>">2.重新注册</a>
                        </div>
                    </div>
                </div>
<?php if(!empty($error)) {
 echo '<div class="text-muted text-center mb20"><div class="alert alert-danger mt20">'.$error.'</div></div>';
}?>						
            </div>
	
            </div>
          </div>
        </div>
      </div>	
<?php get_footer(); } else {
echo "<script type='text/javascript'>window.location='".get_boxmoe('regto')."'</script>";
} ?>
