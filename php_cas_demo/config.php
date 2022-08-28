<?php

/**
 * ==============================================
 * Created by SaiJia Technology.
 * Project: PHP对接CAS单点登陆系统
 * Power: CAS配置文件
 * ==============================================
 */
function p($arr){
    echo "<pre><hr>";
    if(is_bool($arr)){
        var_dump($arr);
    } else {
        print_r($arr);
    }
    die;
}

# 1 CAS Server 主机域名
# 此配置是你搭建的CAS SSO SERVER服务的域名
$cas_host = 'dev03.aplum-inc.com';
//$cas_host = 'test-casdoor-gateway.aplum-inc.com';

# 2 CAS Server 路径
# 此配置是你搭建的CAS SSO SERVER服务的路径
$cas_context = '/cas/casbin/app-built-in/';

// 3 CAS server 端口
# 此配置是你搭建的CAS SSO SERVER服务的端口
$cas_port = 8261;
//$cas_port = 80;

// 4 CAS server 证书
# 此配置是你搭建的CAS SSO SERVER服务的证书文件
$cas_server_ca_cert_path = './ssoserver.cer';
