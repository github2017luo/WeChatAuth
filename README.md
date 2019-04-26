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
