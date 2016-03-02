<?php
 $json = ' {
                         "button":[
                         {      
                                  "type":"click",
                                  "name":"今日歌曲",
                                  "key":"V1001_TODAY_MUSIC"
                          },
                          {
                                   "type":"click",
                                   "name":"歌手简介",
                                   "key":"V1001_TODAY_SINGER"
                          },
                          {
                                   "name":"菜单",
                                   "sub_button":[
                                   {    
                                           "type":"view",
                                           "name":"搜索",
                                           "url":"http://www.soso.com/"
                                        },
                                        {
                                           "type":"view",
                                           "name":"视频",
                                           "url":"http://v.qq.com/"
                                        },
                                        {
                                           "type":"click",
                                           "name":"赞一下我们",
                                           "key":"V1001_GOOD"
                                        }]
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
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch,CURLOPT_POST,1); 
        curl_setopt($ch,CURLOPT_POSTFIELDS,$json); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
	    $out = curl_exec($ch); 
        curl_close($ch); 
        return $out;
?>