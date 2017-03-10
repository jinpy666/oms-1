<?php
/**
* 商品
*
* @copyright shopex.cn 2015.05.07
* @author sunjing<sunjing@shopex.cn>
*/
class middleware_wms_matrixwms_request_arvato_goods extends middleware_wms_matrixwms_request_goods{


    /**
     * 商品同步参数
     * @param  array sdf
     * @return  array
     * @access  protected
     * @author sunjing@shopex.cn
     */
    protected function __get_params(&$sdf,&$product_ids=array()){
        $node_id = $this->node_id;
        $params = $items = array();
        if (is_array($sdf) && $sdf){
            $product_ids = array();
            foreach ($sdf as $p){
                if (!is_array($p)) continue;
                $product_ids[] = $p['product_id'];
                $spec_info = preg_replace(array('/：/','/、/'),array(':',';'),$p['property']);
                $items[] = array(
                    'name' => $p['name'],
                    'title' => $p['name'],// 商品标题
                    'item_code' => $p['bn'],
                    'remark' => '',//商品备注
                    'type' => 'NORMAL',
                    'is_sku' => '1',
                    'gross_weight' => $p['weight'] ? $p['weight'] : '0.00',// 毛重,单位G
                    'net_weight' => $p['weight'] ? $p['weight'] : '0.00',// 商品净重,单位G
                    'tare_weight' => '0.00',// 商品皮重，单位G
                    'is_friable' => '否',// 是否易碎品
                    'is_dangerous' => '否',// 是否危险品
                    //'weight' => $p['weight'] ? $p['weight'] : '0',
                    //'length' => '0.00',// 商品长度，单位厘米
                    //'width' => '0.00',// 商品宽度，单位厘米
                    //'height'=> '0.00',// 商品高度，单位厘米
                    //'volume'=> '0.00',// 商品体积，单位立方厘米
                    'pricing_cat' => '',// 计价货类
                    'package_material' => '',// 商品包装材料类型
                    'price' => '0.00',
                    'support_batch' => '否',
                    'support_expire_date' => '0',
                    'expire_date' => date('Y-m-d'),
                    'support_barcode' => '00',
                    'barcode' => $p['barcode'] ? $p['barcode'] : '',
                    'support_antifake' => '0',
                    'unit' => $p['unit'] ? $p['unit'] : '',
                    'package_spec' => '',// 商品包装规格
                    'ename' => '',// 商品英文名称
                    'brand' => '',
                    'batch_no' => '',
                    'goods_cat' => '0',// 商品分类
                    'color' => '',// 商品颜色
                    'property' => $spec_info,//规格
                );
            }
        }
        $params['item_lists'] = json_encode(array('item'=>$items));
        $params['uniqid'] = self::uniqid();
        return $params;
    }
  
}