<?php
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
?>		
