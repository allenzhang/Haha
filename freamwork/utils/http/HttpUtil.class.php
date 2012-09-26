<?php

/**
 * @class http分析与跳转的一些操作
 * 包括分析url、ip，获取$_GET、$_POST、$_REQUEST数据，页面跳转等
 */
class HttpUtil {

    /**
     * 取得http头信息
     */
    public static function header($header)
    {
        if (empty($header)) {
            return null;
        }

        // Try to get it from the $_SERVER array first
        $temp = 'HTTP_' . strtoupper(str_replace('-', '_', $header));
        if (!empty($_SERVER[$temp])) {
            return $_SERVER[$temp];
        }

        // This seems to be the only way to get the Authorization header on
        // Apache
        if (function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            if (!empty($headers[$header])) {
                return $headers[$header];
            }
        }
        return false;
    }
    
    /**
     *  判断是否是ajax操作的数据
     */
    public static function isAjax()
    {
        return ('XMLHttpRequest' == self::header('X_REQUESTED_WITH'));
    }
    
    /**
     * 判断页面是否是数据post过来
     * @return boolean
     */
    public static function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    private static function _gpcStripSlashes(& $arr) {
        if (is_array ($arr)) {
            foreach ($arr as &$v) {
                self::_gpcStripSlashes ($v);
            }
        } else
            $arr = stripslashes ($arr);
    }

    public static function gpcStripSlashes() {
        if (get_magic_quotes_gpc ()) {
            self::_gpcStripSlashes ($_GET);
            self::_gpcStripSlashes ($_POST);
            self::_gpcStripSlashes ($_COOKIE);
            self::_gpcStripSlashes ($_REQUEST);
        }
        set_magic_quotes_runtime (0);
    }

    /// 除去url尾部的#号
    /// @param[in] string $url 要修改的url
    /// @return string 返回修改后的url
    private static function makeSafeUrlForRedirect($url) {
        if (preg_match ('/#$/', $url)) {
            $url = str_replace ('#', '', $url);
        }
        return $url;
    }

    /// 取得当前页面的url
    /// @return string 返回当前页面的url
    public static function getCurrentUrl() {
        $pageURL = 'http';
        if (! empty ($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["HTTP_HOST"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    /// 302跳转
    /// @param $url
    public static function redirect($url) {
        header ("HTTP/1.1 302 Moved Temporarily");
        header ('Location: ' . self::makeSafeUrlForRedirect ($url));
        exit ();
    }

    /// 301跳转
    /// @param $url
    public static function redirectPermently($url) {
        header ("HTTP/1.1 301 Moved Permanently");
        header ('Location: ' . self::makeSafeUrlForRedirect ($url));
        exit ();
    }

    /// 跳转到页面本身
    public static function redirectToSelf() {
        $url = $_SERVER['REQUEST_URI'];
        self::redirect ($url);
    }

    /// 获得query_string
    /// @return string
    public static function getQueryString() {
        return $_SERVER['QUERY_STRING'];
    }

    /**
     * 获取POST中的数据
     * @param $key				POST中的key
     * @param $default			如果数据不存在，默认返回的值。默认情况下为false
     * @param $enableHtml		返回的结果中是否允许html标签，默认为false
     * @return string
     */
    public static function getPOST($key, $default = false, $enableHtml = false) {
        if (isset ($_POST[$key])) {
            return !$enableHtml ? strip_tags($_POST[$key]) : $_POST[$key];
        }
        return $default;
    }

    /**
     * 获取GET中的数据
     * @param $key				GET中的key
     * @param $default			如果数据不存在，默认返回的值。默认情况下为false
     * @param $enableHtml		返回的结果中是否允许html标签，默认为false
     * @return string
     */
    public static function getGET($key, $default = false, $enableHtml = false) {
        if (isset ($_GET[$key])) {
            return !$enableHtml ? strip_tags($_GET[$key]) : $_GET[$key];
        }
        return $default;
    }

    /// 获取REQUEST中的数据
    /// @param $key				REQUEST中的key
    /// @param $default			如果数据不存在，默认返回的值。默认情况下为false
    /// @param $enableHtml		返回的结果中是否允许html标签，默认为false
    /// @return string
    public static function getREQUEST($key, $default = false, $enableHtml = false) {
        if (isset ($_REQUEST[$key])) {
            return !$enableHtml ? strip_tags($_REQUEST[$key]) : $_REQUEST[$key];
        }
        return $default;
    }

    /// 获得当前页面的前一个页面
    /// @param $default	如果没有前一个页面，返回的默认值
    /// @return string
    public static function getReferer($default = false) {
        if (isset ($_SERVER['HTTP_REFERER']))
            return $_SERVER['HTTP_REFERER'];
        else
            return $default;
    }

    /// 获取当前的域名
    public static function getHost() {
        return $_SERVER['HTTP_HOST'];
    }

    /// @param $url string 页面url
    /// @return string 二级域名
    public static function getCityDomain() {
    	$domain = '';
        $buf = explode ('.', $_SERVER['HTTP_HOST']);
        if (count ($buf) > 3) {
            $domain = $buf[1];
        } else {
            $domain =  $buf[0];
        }
        if ($domain == 'www') {
        	$domain = (!empty($_COOKIE['citydomain'])) ? $_COOKIE['citydomain'] : '';
        }
        return $domain;
    }

    /// 获取用户ip
    /// @param $useInt			是否将ip转为int型，默认为true
    /// @param $returnAll		如果有多个ip时，是否会部返回。默认情况下为false
    /// @return string|array|false
    public static function getIp($useInt = true, $returnAll=false) {
        $ip = getenv('HTTP_CLIENT_IP');
		if($ip && strcasecmp($ip, "unknown") && !preg_match("/192\.168\.\d+\.\d+/", $ip)) {
            return self::_returnIp($ip, $useInt, $returnAll);
		} 
        
        $ip = getenv('HTTP_X_FORWARDED_FOR');
        if($ip && strcasecmp($ip, "unknown")) {
            return self::_returnIp($ip, $useInt, $returnAll);
        }

        $ip = getenv('REMOTE_ADDR');
        if($ip && strcasecmp($ip, "unknown")) {
            return self::_returnIp($ip, $useInt, $returnAll);
        }

        if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
            if($ip && strcasecmp($ip, "unknown")) {
                return self::_returnIp($ip, $useInt, $returnAll);
            }
        }
        
		return false;
    }

    private static function _returnIp($ip, $useInt, $returnAll) {
        if (!$ip) return false;

        $ips = preg_split("/[，, _]+/", $ip);
        if (!$returnAll) {
            $ip = $ips[count($ips)-1];
            return $useInt ? self::ip2long($ip) : $ip;
        }

        $ret = array();
        foreach ($ips as $ip) {
            $ret[] = $useInt ? self::ip2long($ip) : $ip;
        }
        return $ret;
    }

    /// 对php原ip2long的封装，原函数在win系统下会出现负数
    /// @author zhoufan <zhoufan@staff.ganji.com>
    /// @param string $ip
    /// @return int
    public static function ip2long($ip) {
        return sprintf ('%u', ip2long ($ip));
    }

    /// 对php原long2ip的封装
    /// @author zhoufan <zhoufan@staff.ganji.com>
    /// @param int $long
    /// @return string
    public static function long2ip($long) {
        return long2ip ($long);
    }

    /**
     * ip地址转城市信息
     * @param string $ip
     * @return array
     *  - ip
     *  - ip_begin
     *  - ip_end
     *  - location
     *  - province_id
     *  - province_name
     *  - city_id
     *  - city_name
     *  - city_pinyin
     *  - district_id
     *  - district_name
     */
    public static function ip2City($ip) {
        if (!$ip)   return false;
        require_once GANJI_CONF . '/ServiceConfig.class.php';
        $service_url    = ServiceConfig::$SERVICE_HOST . '/fcgi/ip2city/query?act=ip2city&ip=' . $ip;
        $stream_setting    = stream_context_create(
            array(
                'http'  => array(
                    'timeout'   => 2,
                ),
            )
        );
        $ret    = @file_get_contents($service_url , 0 , $stream_setting);
        if (strtolower(substr($ret , 0 , 5)) == 'error') {
            return false;
        }
        $info   = explode("\t" , $ret);
        return array(
            'ip'            => $ip,
            'ip_begin'      => $info[0],
            'ip_end'        => $info[1],
            'location'      => $info[2],
            'province_id'   => $info[3],
            'province_name' => $info[4],
            'city_id'       => $info[5],
            'city_name'     => $info[6],
            'city_pinyin'   => $info[7],
            'district_id'   => $info[8],
            'district_name' => $info[9],
        );
    }

}
