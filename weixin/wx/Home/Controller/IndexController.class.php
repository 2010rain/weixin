<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$timestamp = $_GET['timestamp'];
		$nonce = $_GET['nonce'];
		$token = "weixin";
		$signature = $_GET['signature'];
		$arr = array($token,$timestamp,$nonce);
		sort($arr);
		$tmpstr = implode('', $arr);
		$tmpstr = sha1($tmpstr);
		if($tmpstr == $signature && $_GET['echostr']){
			echo $_GET['echostr'];
			exit;
		}
		else{
			$this->responseMsg();
		}
    }
    public function responseMsg(){
    	$postArr = $GLOBALS["HTTP_RAW_POST_DATA"];
    	$postObj = simplexml_load_string($postArr);
    			$toUser = $postObj->FromUserName;
    			$fromUser = $postObj->ToUserName;
    			$time = time();
    			$MsgType = "test";
    			$Content = "欢迎关注我们的微信账号.";
    			$template ="<xml>
 							<ToUserName><![CDATA[%s]]></ToUserName>
 							<FromUserName><![CDATA[%s]]></FromUserName> 
 							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
 							<Content><![CDATA[%s]]></Content>
 							</xml>";
 				$info = sprintf($template,$toUser,$fromUser,$time,$MsgType,$Content);
 				echo $info;
                                                        echo "asd";			
    }
}