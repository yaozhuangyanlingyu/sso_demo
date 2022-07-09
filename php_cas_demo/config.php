<?php

/**
 * ==============================================
 * Created by SaiJia Technology.
 * Project: PHP对接CAS单点登陆系统
 * Power: CAS配置文件
 * ==============================================
 */
function p($arr){
    echo "<pre>";
    print_r($arr);
    die;
}

# 1 CAS Server 主机域名
# 此配置是你搭建的CAS SSO SERVER服务的域名
$cas_host = '192.168.1.112';

# 2 CAS Server 路径
# 此配置是你搭建的CAS SSO SERVER服务的路径
$cas_context = '/cas';

// 3 CAS server 端口
# 此配置是你搭建的CAS SSO SERVER服务的端口
$cas_port = 8000;

// 4 CAS server 证书
# 此配置是你搭建的CAS SSO SERVER服务的证书文件
$cas_server_ca_cert_path = './ssoserver.cer';
