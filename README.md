# jxmb

1、开启邮件拓展
修改文件： "\xampp\php\php.ini"
取消注释：";extension=php_imap.dll". 为: extension=php_imap.dll

2、映射开发虚拟目录
 修改文件：xampp\apache\conf\extra\httpd-vhosts.conf
 追加：
 Alias /jxmb "G:/x/jxmb"

 <Directory "G:/x/jxmb">
     Options Indexes FollowSymLinks Includes ExecCGI
     AllowOverride All
     Require all granted
 </Directory>
