<?php
require('vendor/autoload.php');
use \phpCAS;

// 引入配置文件
require_once 'config.php';

// 开启phpCAS debug
phpCAS::setLogger();

// 启用详细错误消息。在生产中禁用
phpCAS::setVerbose(true);

# 初始化phpCAS,参数说明：CAS协议版本号、cas server的域名、cas server的端口号、cas server的项目访问路径
phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);

phpCAS::handleLogoutRequests(false);

# 开启设置证书验证。如果是开发环境可将此注释，如果是生产环境为了安全性建议将此开启
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);

# 不为CAS服务器设置SSL验证
# 为了快速测试，您可以禁用CAS服务器的SSL验证。此建议不建议用于生产环境。验证CAS服务器对CAS协议的安全性至关重要！
phpCAS::setNoCasServerValidation();

// 进行CAS服务验证，这个方法确保用户是否验证过，如果没有验证则跳转到验证界面
// 这个是强制认证模式，查看 CAS.php 可以找到几种不同的方式：
# a) forceAuthentication - phpCAS::forceAuthentication();
# b) checkAuthentication - phpCAS::checkAuthentication();
# c) renewAuthentication - phpCAS::renewAuthentication();
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().

// 注销接口(注销后跳转地址)
if (isset($_REQUEST['logout'])) {
	phpCAS::logout(['service'=>$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']]);
}


// for this test, simply print that the authentication was successfull
?>
<html>
  <head>
    <title>phpCAS simple client</title>
  </head>
  <body>
    <h1>Successfull Authentication!</h1>
    <?php require 'script_info.php' ?>
    <p>the user's login is <b><?php echo phpCAS::getUser(); ?></b>.</p>
    <p>phpCAS version is <b><?php echo phpCAS::getVersion(); ?></b>.</p>
    <p><a href="?logout=">Logout</a></p>
  </body>
</html>
