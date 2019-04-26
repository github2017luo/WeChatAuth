# WeChatAuth
* Get WeChat OpenID &amp; access_token &amp; refresh_token


`namespace Yuunie;`

`class WeChatAuth`

`static function getCode($appid, $redirectUrl) :string`(URL需要在微信中打开)

微信打开URL
redirectUrl页面获取code
调用getData

`static function getData($appid, $secret, $code) :array`

```
"access_token"
"expires_in"
"refresh_token"
"openid"
"scope"
```

```
通过getCodeUrl并传入微信APPID和回调链接（回调链接需要在微信公众平台-接口权限-网页授权获取用户基本信息-修改-网页授权域名中添加）获取URL
通过微信访问获取的URL，获取成功后将会回调设置的回调链接并带上?code=xxxxxxx
通过回调链接的页面获得code
使用getData并传入APPID、APPSecret和获取到的code获取该APPID所对应的access_token,refresh_token,openid
数据只能获取一次
如需重新获取需要重新开始
```
END
