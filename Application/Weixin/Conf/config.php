<?php
return array(

	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
		'__STATIC__' => __ROOT__ . '/Public/Static',
		'__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
		'__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
		'__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
		'__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
	),
	 //微信设置
     'SITE_NAME' => '网络民兵指挥管理系统',
     'SITE_URL' => 'http://mbgl.jxsjq.com',
     	 
     'WECHAT_ENCORDINGAESKEY'=>'NmzgF68Lh4Kvn3fJmqj02Rx0bxEDEEHwji9aKhkFTRo',//微信企业号解密密钥
     'WECHAT_CORPID'=>'wx4124a601419ba115',//微信企业号CORPID
     'WECHAT_TOKEN' => 'jxmb',//签名token
     'WECHAT_CORPSECRECT'=>'rwsGp1aPwynIHHdNn4LDYeXJ7P3LJOiEJEyGCsub98iHUHbRZcSt9t1q9IALqAS-',//企业号secrect
   
);