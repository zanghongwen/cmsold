<?php

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return [
    // 数据库类型
    'type'        => '[type]',
    // 数据库连接DSN配置
    'dsn'         => '',
    // 服务器地址
    'hostname'    => '[hostname]',
    // 数据库名
    'database'    => '[database]',
    // 数据库用户名
    'username'    => '[username]',
    // 数据库密码
    'password'    => '[password]',
    // 数据库连接端口
    'hostport'    => '[hostport]',
    // 数据库连接参数
    'params'      => [],
    // 数据库编码默认采用utf8
    'charset'     => 'utf8',
    // 数据库表前缀
    'prefix'      => '[prefix]',
    // 数据库调试模式
    'debug'          => false,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'      => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate' => false,
    // 读写分离后 主服务器数量
    'master_num'  => 1,
    // 是否严格检查字段是否存在
	'fields_strict'  => false,
    // 指定从服务器序号
    'slave_no'    => '',
];