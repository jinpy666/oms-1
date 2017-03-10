<?php

/**
 * 检查否需要检查同一用户订单
 *
 * @author hzjsq@msn.com
 * @version 0.1b
 */
class omeauto_auto_plugin_ordersingle extends omeauto_auto_plugin_abstract implements omeauto_auto_plugin_interface {

    /**
     * 是否支持批量审单 
     */
    protected $__SUP_REP_ROLE = false;
    /**
     * 状态码
     */
    protected $__STATE_CODE = omeauto_auto_const::__SINGLE_CODE;

    /**
     * 开始处理
     *
     * @param omeauto_auto_group_item $group 要处理的订单组
     * @return Array
     */
    public function process(& $group, &$confirmRoles) {

        $allow = true;

        $orders = $group->getOrders();
        if (count($orders) <= 1) {

            foreach ((array) $orders as $key => $order) {

                $group->setOrderStatus($order['order_id'], $this->getMsgFlag());
            }
        }
    }

    /**
     * 获取该插件名称
     *
     * @param Void
     * @return String
     */
    public function getTitle() {

        return '单个订单';
    }

    /**
     * 获取提示信息
     *
     * @param Array $order 订单内容
     * @return Array
     */
    public function getAlertMsg(& $order) {


        return array('color' => 'GREEN', 'flag' => '单', 'msg' => '单个订单，无可合并的相关订单');
    }

}
