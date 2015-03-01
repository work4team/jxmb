<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
$db_config_files = "Application/Common/Conf/db.php";

if (isset($_POST["install"])) {
	$db_host = $_POST["db_host"];
	$db_user = $_POST["db_user"];
	$db_pass = $_POST["db_pass"];
	$db_dbname = $_POST["db_dbname"];
	$db_tag = $_POST["db_tag"];

	$config_str = "<?php\n";
	$config_str .= "return array(\n";
	$config_str .= "        'URL_MODEL'=>0, // 如果你的环境不支持PATHINFO 请设置为3,\n";
	$config_str .= "        'DB_TYPE'=>'mysql',\n";
	$config_str .= "        'DB_HOST'=>'" . $db_host . "',\n";
	$config_str .= "        'DB_NAME'=>'" . $db_dbname . "',\n";
	$config_str .= "        'DB_USER'=>'" . $db_user . "',\n";
	$config_str .= "        'DB_PWD'=>'" . $db_pass . "',\n";
	$config_str .= "        'DB_PORT'=>'3306',\n";
	$config_str .= "        'DB_PREFIX'=>'" . $db_tag . "',\n";
	$config_str .= "    );\n";

	$ff = fopen($db_config_files, "w ");
	fwrite($ff, $config_str);

	if (!@$link = mysql_connect($db_host, $db_user, $db_pass)) {//检查数据库连接情况
		echo "<meta charset='utf-8' />";
		echo "<script>\n
					window.onload=function(){
					alert('数据库连接失败! 请返回上一页检查连接参数');
					location.href='install.php';
				}
				</script>";
		die ;
	} else {
		if (!mysql_select_db($db_dbname)) {
			echo "<meta charset='utf-8' />";
			echo "<script>\n
						window.onload=function(){
						alert('请确认数据库是否存在? 请返回上一页检查连接参数');
						location.href='install.php';
					}
					</script>";
			die ;
		} else {
			mysql_select_db($db_dbname);
			mysql_query("set names 'utf8'");
			$lines = file("Data/Sql/demo.sql");
			$sqlstr = "";
			foreach ($lines as $line) {
				$line = trim($line);
				if ($line != "") {
					if (!($line{0} == "#" || $line{0} . $line{1} == "--")) {
						$sqlstr .= $line;
					}
				}
			}
			$sqlstr = rtrim($sqlstr, ";");
			$sqls = explode(";", $sqlstr);
			foreach ($sqls as $val) {
				$val = str_replace("`think_", "`" . $db_tag, $val);
				mysql_query($val);
			}

			rename("install.php", "install.lock");
			echo "<meta charset='utf-8' />";
			echo "<script>\n
						window.onload=function(){
						alert('安装成功');
						location.href='index.php';
					}
					</script>";
			die ;
		}
	}
}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8' />
		<title>安装向导</title>
		<meta content='' name='description' />
		<meta content='' name='author' />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="Public/Static/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
		<link href="Public/Home/css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="page-header">
						<h1>网络民兵指挥管理系统 <small>让工作更轻松快乐</small></h1>
					</div>
					<form   method="POST" class="well form-horizontal">

						<div class="form-group">
							<label class="control-label col-md-4" for="name" >安装说明：</label>
							<div class="col-md-8">
								<p>
									<h4 class="text-danger">1. 执行安装程序之前，手动创建数据库<h4>
								</p>
								<p>
									<h4 class="text-danger">2. 安装成功以后，请手动删除 install.php <h4>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name" >安装文件可写：</label>
							<div class="col-md-8">
								<?php
								if (!is_writable("install.php")) {
									echo "<button type='button' class='btn btn-danger form-con'>Fail</button><p>请检查install.php是否有修改权限</p>";
								} else {
									echo "<button type='button' class='btn btn-success form-con'>OK</button>";
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name" >配置文件可写：</label>
							<div class="col-md-8">
								<?php
								if (!is_writable($db_config_files)) {
									echo "<button type='button' class='btn btn-danger form-con'>Fail</button><p>请检查Application\Common\Conf目录写入权限</p>";
								} else {
									echo "<button type='button' class='btn btn-success form-con'>OK</button>";
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name" >IMAP扩展：</label>
							<div class="col-md-8">
								<?php
								if (!function_exists('imap_open')) {
									echo "<button type='button' class='btn btn-danger form-con'>Fail</button><p>无法正常收发邮件</p>";
								} else {
									echo "<button type='button' class='btn btn-success form-con'>OK</button>";
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name" >填写主机：</label>
							<div class="col-md-8">
								<input type="text" name="db_host" value="localhost" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label  col-md-4" for="name">用 户 名：</label>
							<div class="col-md-8">
								<input type="text" name="db_user" value="root"  class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name">密　　码：</label>
							<div class="col-md-8">
								<input type="text" name="db_pass" value="test" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name">数据库名：</label>
							<div class="col-md-8">
								<input type="text" name="db_dbname" value="xiangmu" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" for="name">数据前缀：</label>
							<div class="col-md-8">
								<input type="text" name="db_tag" value="xiangmu_" class="form-control"/>
							</div>
						</div>
						<div>
							<label class="control-label col-md-4" for="name"> </label>
							<div class="col-md-8">
								<?php
								if (is_writable($db_config_files) && (is_writable("install.php"))) {
									echo "<button type=\"submit\" name=\"install\" class=\"btn btn-primary \">开始安装</button>";
								} else {

								}
								?>
							</div>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
	</body>
</html>