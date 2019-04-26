<?php
namespace Yuunie;

class WeChatAuth
{
    public static function init()
    {

    }

    /**
     * 获得获取微信CODE的URL
     * 该URL需要在微信中打开
     *
     * @name getCodeUrl
     * @param string $appid APPID
     * @param string $redirectUrl 跳转的链接,CODE将以GET方式传入该跳转链接
     * @return string
     */
    public static function getCodeUrl($appid = '', $redirectUrl = '')
    {
        $redirectUrl = urlencode($redirectUrl);
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . $redirectUrl . "&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
        return $url;
    }

    /**
     * 获得用户access_token expires_in refresh_token openid scoped信息
     * 获取失败返回空数组
     * 
     * @name getData
     * @param string $appid APPID
     * @param string $secret APP Secret
     * @param string $code 通过getCodeUrl获取URL后微信访问URL并跳转到redirectUrl链接所带的GET参数code
     * @return array
     */
    public static function getData($appid = '', $secret = '', $code = '')
    {
        /*
        {
            "access_token": "20_EW6VkUpUWMyq6G72_vNyunOFDHo3bsMsyKOBCKD5-0tfoEnCilNtqO4CpVQumExXiadPSBLhPkuG9Py3L890v71wYtbvWexQSIEGstHXhUU",
            "expires_in": 7200,
            "refresh_token": "20_DPvettM1FcLlddorRszPVFtV1yo6pf_XpqKKDlWmgZEq6PCw7za2C9F_CtAsgMLXKYgbIHXC-4TMtKzy89fTrRuwDkKKIpuwbSJ8zgVlCR4",
            "openid": "oXJDd540UvylKNyap9NZwRJ2dKeE",
            "scope": "snsapi_base"
        }
        */
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appid . "&secret=" .$secret . "&grant_type=authorization_code&code=" . $code;
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if (isset($data['errcode'])) {
            return [];
        }
        return $data;

    }
}
