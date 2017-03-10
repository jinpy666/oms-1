<?php
/**
 * 平台错误码
 *
 * @author chenping<chenping@shopex.cn>
 */

class inventorydepth_rpc_request_errorcode {

    public static $errorcode = array(
        # 系统级参数
        'e00001' => '其他',
        'e00010' => '格式错误',
        'e00030' => '超时',
        'e00040' => '请求次数限制',
        'e00050' => '矩阵内部报错',
        'e00051' => '业务服务器错误',
        'e00052' => '内部服务返回数据格式错误',
        'e00053' => '内部服务器，其他错误',
        'e00054' => '内部服务器超时，URL错误',
        'e00055' => '矩阵系统报错，rpc报错',
        'e00056' => '矩阵内部系统报错， http错误',
        'e00060' => '缺少系统参数',
        'e00070' => 'sign验证失败',
        'e00080' => '没有绑定',
        'e00090' => '第三方报错',
        'e00091' => 'URL错误',
        'e00092' => 'http错误',
        'e00093' => '第三方其他报错',
        'w01125' => '缺少时间戳参数',
        'w01126' => '缺少版本参数',
        'w01127' => '缺少必要的传入参数',
        'w01130' => '参数错误',
        'w01131' => '无效的SessionKey参数',
        'w01132' => '无效的AppKey参数',
        'w01133' => '非法的时间戳参数',
        'w01134' => '非法的版本参数',
        'w01135' => '不存在的方法名',
        'w01136' => '非法的参数',
        'w01140' => '权限问题',
        'w01141' => '开发者权限不足',
        'w01142' => '用户权限不足',
        'w01143' => '合作伙伴权限不足',
        'w01144' => '权限不够：非商城用户不可此操作',
        'w01150' => '根据用户昵称:****查询不到对应的用户信息',
        'w01160' => '运单号不符合规则；订单状态不对该物流订单已经发货或者已关闭，不能重复发货',
    );

    public static function getErrorInfo($code)
    {
        $error = self::$errorcode[$code];
        return $error ? $error : $code;
    }
}
