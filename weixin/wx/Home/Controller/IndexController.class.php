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
		$this->createMenu();
		if($tmpstr == $signature && $_GET['echostr']){
			echo $_GET['echostr'];
			exit;
		}
		else{
			$this->responseMsg();
			$this->basketballClick();
		}
    }
	function http_curl(){
 		$Appid = "wx4082d7a9ddfeed68";
 		$secret = "2288ee8a3f428988f12f374869c02951";
 		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$Appid."&secret=".$secret;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		curl_close($ch);
		$access_token = json_decode($res,true);
		echo $access_token['access_token'];
	}
	public function createMenu(){
		 $json = ' {
                         "button":[
                          {
                                   "name":"报名参赛",
                                   "sub_button":[
                                   {    
                                           "type":"click",
                                           "name":"篮球比赛",
                                           "key" :"basketball_0001"
                                        },
                                        {
                                           "type":"click",
                                           "name":"足球比赛",
                                           "key" :"soccer_0001"
                                        },
                                        {
                                           "type":"click",
                                           "name":"羽毛球比赛",
                                           "key":"tennis_0001"
                                        },
                                        {
                                           "type":"click",
                                           "name":"其他比赛",
                                           "key":"other_0001"
                                        }]
                           },
                          {      
                                  "type":"click",
                                  "name":"已报名",
                                  "key":"V1001_TODAY_MUSIC"
                          },
                          {
                                   "type":"click",
                                   "name":"个人信息",
                                   "key":"V1001_TODAY_SINGER"
                          }]
                 }';	
 		$Appid = "wxb4ecfc883f6b1b86";
 		$secret = "4651fac61de959b47cfd622549f33cb6";
 		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$Appid."&secret=".$secret;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$res = curl_exec($ch);
		curl_close($ch);
		$access_token = json_decode($res,true);
		$access = $access_token['access_token'];
		$url =  "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access;
		echo $url;
		$ch = curl_init(); 
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_POST,1); 
        curl_setopt($ch,CURLOPT_POSTFIELDS,$json); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
	    $out = curl_exec($ch); 
        curl_close($ch); 
        return $out;
	}

	public function basketballClick(){
    	$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
    	$postObj = simplexml_load_string($postArr);
 		if(strtolower($postObj->MsgType)=="event"){
 			if(strtolower($postObj->Event) == "click" && $postObj->EventKey == "soccer_0001"){
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[足球报名]]></Title>
							<Description><![CDATA[快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							</Articles>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'news';
				$pic = IMG_URL.'soccer.png';
				$url = "http://www.10rain.site/weixin/index.php/Home/Report/soccer";
				echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $pic , $url);}	
 		}		
 		if(strtolower($postObj->MsgType)=="event"){
 			if(strtolower($postObj->Event) == "click" && $postObj->EventKey == "basketball_0001"){
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[报名项目]]></Title>
							<Description><![CDATA[快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							</Articles>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'news';
				$pic = IMG_URL.'basketball.png';
				$url = "http://www.10rain.site/weixin/index.php/Home/Report/basketball";
				echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $pic , $url);}	
 		}		
 		if(strtolower($postObj->MsgType)=="event"){
 			if(strtolower($postObj->Event) == "click" && $postObj->EventKey == "tennis_0001"){
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[羽毛球报名]]></Title>
							<Description><![CDATA[快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							</Articles>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'news';
				$pic = IMG_URL.'tennis.png';
				$url = "http://www.10rain.site/weixin/index.php/Home/Report/tennis";
				echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $pic , $url);}	
 		}		

 		if(strtolower($postObj->MsgType)=="event"){
 			if(strtolower($postObj->Event) == "click" && $postObj->EventKey == "other_0001")
 			{
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>4</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[篮球比赛]]></Title>
							<Description><![CDATA[篮球赛,快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							<item>
							<Title><![CDATA[足球比赛报名]]></Title>
							<Description><![CDATA[足球赛,快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>							
							<item>
							<Title><![CDATA[羽毛球比赛报名]]></Title>
							<Description><![CDATA[足球赛,快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>							
							<item>
							<Title><![CDATA[网球比赛报名]]></Title>
							<Description><![CDATA[足球赛,快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>							

							</Articles>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'news';
				$bpic = IMG_URL.'basketball.png';
				$burl = "http://www.10rain.site/weixin/index.php/Home/Report/basketball";
				$spic = IMG_URL.'soccer.png';
				$surl = "http://www.10rain.site/weixin/index.php/Home/Report/soccer";
				$tpic = IMG_URL.'tennis.png';
				$turl = "http://www.10rain.site/weixin/index.php/Home/Report/tennis";

				echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $bpic , $burl, $spic , $surl, $tpic , $turl, $spic , $surl); 				
 			}
 		}		
	}
    public function responseMsg(){
    	$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
    	$postObj = simplexml_load_string($postArr);
    	echo $postObj;
    	if(strtolower($postObj->MsgType) == 'event'){
    		if(strtolower($postObj->Event) == 'subscribe'){
				$toUser   = $postObj->FromUserName;
				$fromUser = $postObj->ToUserName;
				$time     = time();
				$msgType  =  'text';
    			$content = "欢迎关注我们的微信账号.";
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
				$info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
 				echo $info;
 			}
 		}
 		if(strtolower($postObj->MsgType) == 'text'){
 			if($postObj->Content == 'access_token'){
 				$Appid = "wx4082d7a9ddfeed68";
 				$secret = "2288ee8a3f428988f12f374869c02951";
 				$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$Appid&secret=$secret";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$res = curl_exec($ch);
					$access_token = json_decode($res,true);
					$content = $access_token['access_token'];
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'text';
				echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $content);

 			}
 		}
 		if(strtolower($postObj->MsgType)=="text"){
 			if(strtolower($postObj->Content) == "报名")
 			{
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[报名项目]]></Title>
							<Description><![CDATA[快来加入吧！！！]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							</Articles>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'news';
				$pic = IMG_URL.'basketball.png';
				$url = "http://www.10rain.site/weixin/index.php/Home/Report/basketball";
				echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $pic , $url); 				
 			}
 		}
 		if(strtolower($postObj->MsgType) == "text"){
 			switch (trim($postObj->Content)) {
 				case '篮球':
 					$content = "<a href='http://www.10rain.site/weixin/index.php/Home/Report/basketball' >篮球比赛报名</a>";
 					break;
 				case '姓名':
 					$content = "开发者姓名:罗肖";
 					break;
				case '年龄':
					$content = "年龄:20";
					break;
				case '手机':
					$content = "手机:18811409281";
					break;
				case '毕设':
					$content = "毕设好难啊！！！！";		 				
					break;
 			}
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
				$fromUser = $postObj->ToUserName;
				$toUser = $postObj->FromUserName;
				$time = time();
				$msgType = 'text';
				if ($content)
					echo sprintf($template , $toUser ,$fromUser , $time , $msgType , $content);
 		}					
    }
}
