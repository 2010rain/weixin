<?php /* Smarty version Smarty-3.1.6, created on 2016-03-02 10:15:56
         compiled from "./wx/Home/View/Report/basketball.html" */ ?>
<?php /*%%SmartyHeaderCode:6876704256d5ae38c276c6-15183276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fab4da04aa4df62a6252c77dc03b720663b8f3e' => 
    array (
      0 => './wx/Home/View/Report/basketball.html',
      1 => 1456884887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6876704256d5ae38c276c6-15183276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56d5ae38cb5b2',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d5ae38cb5b2')) {function content_56d5ae38cb5b2($_smarty_tpl) {?><!DOCTYPE html>
<html lang="utf-8">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>篮球比赛报名</title>
	<script type="text/javascript" src="<?php echo @JS_URL;?>
/jquery-1.3.1.js"></script>
	<script type="text/javascript" src="<?php echo @JS_URL;?>
/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo @JS_URL;?>
/jquery.validate.messages_cn.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo @CSS_URL;?>
/bootstrap-theme.css">

	<script type="text/javascript">
		$(function(){
			$("#form1").validate();
		});
  	</script>

	<style type="text/css">
		label.error{
			color:red;
		}
		body{
			background-color: #900;
			color:white;
		}
		.left{
			background: url(<?php echo @IMG_URL;?>
/basketball.png) no-repeat;
			background-size: 40% auto;
		}
	</style>
</head>
<body>
	<div class="col-md-4 col-md-offset-4 left" >
		<center>
		<h1>篮球比赛报名</h1>
		</center>
		<div >

			<form id="form1">
			<form>
            	<div class="form-group">
                	<label for="name" class="label-control">姓名:</label>
                    <input type="text" id="name" class="required form-control" minlength="2" />
                </div>
            	<div class="form-group">
                	<label for="age" class="label-control">年龄:</label>
                    <input type="text" id="age" class="digits required form-control" />
                </div>
            	<div class="form-group">
                	<label for="email" class="label-control">邮箱:</label>
                    <input type="text" id="email" class="required email form-control" />
                </div>
            	<div class="form-group">
                	<label for="tel" class="label-control">手机:</label>
                    <input type="text" id="tel" class="digits required form-control" minlength="6" maxlength="11" />
                </div>
                <div class="form-group">
                <input type="submit" width=100% class="btn btn-primary btn-lg btn-block" value="提交信息" /> 
                </div>

			</form>
		</div>
	</div>
</body>
</html><?php }} ?>