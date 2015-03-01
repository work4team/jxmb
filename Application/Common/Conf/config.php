<?php
return array(
	//'配置项'=>'配置值'	
	'LOAD_EXT_CONFIG'	=>'db,auth',
	
	'MULTI_MODULE' => true, // 单模块访问
	'DEFAULT_MODULE' => 'Home', // 默认访问模块    
    'DEFAULT_FILTER' => '',
    'MODULE_ALLOW_LIST'  => array('Home','Weixin','App'),
     
    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
	
	'VAR_PAGE'	=>'p',			
	'TMPL_CACHE_ON' => false,
	'TOKEN_ON'=>false, 
	'TMPL_STRIP_SPACE'=>false,
	'URL_HTML_SUFFIX' => '',
	'DB_FIELDS_CACHE'=>false,
    'SESSION_AUTO_START'=>true,
    
    'USER_AUTH_KEY'	=>'auth_id',	// 用户认证SESSION标记
    'ADMIN_AUTH_KEY'			=>'administrator',        
    'USER_AUTH_GATEWAY'=>'public/login',// 默认认证网关
    'DB_LIKE_FIELDS'            =>'content|remark',

    'SHOW_PAGE_TRACE'=>0, //显示调试信息
            
    /* 认证相关 */
    'USER_AUTH_KEY'	=>'auth_id',
	'USER_AUTH_GATEWAY'=>'public/login',
    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '1*NX+Jds|p!IFqltgD)"?4;ic<{,wuya239Ax^]-', //默认数据加密KEY        
);