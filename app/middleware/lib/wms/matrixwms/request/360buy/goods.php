<?php
/**
* 商品
*
* @copyright shopex.cn 2014.05.07
* @author sunjing<sunjing@shopex.cn>
*/
class middleware_wms_matrixwms_request_360buy_goods extends middleware_wms_matrixwms_request_goods{


    public function goods_add(&$sdf,$sync=false){

        
        foreach ($sdf as $good ) {
            $params = $this->__get_params($good,$product_ids);
            $adapter_callback = array(
                'class' => __CLASS__,
                'method' => 'goods_add_callback',
            );
            $writelog = array(
                'log_title' => '商品添加',
                'log_type' => 'store.trade.goods',
                'addon' => $product_ids,
            );
            $method = 'store.wms.item.add';
            
            $result = $this->request($method,$params,$writelog,$sync,$adapter_callback);
            
        }
        
    }
    /**
     *商品参数
     * @param  
     * @return  
     * @access  private
     * @author sunjing@shopex.cn
     */
    protected function __get_params( &$p,&$product_ids=array() )
    {
        $node_id = $this->node_id;
        $params = $items = array();
        
        $product_ids = array();
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
            'gross_weight' => $p['weight'] ? $p['weight'] : '',// 毛重,单位G
            'net_weight' => $p['weight'] ? $p['weight'] : '',// 商品净重,单位G
            'tare_weight' => '',// 商品皮重，单位G
            'is_friable' => '',// 是否易碎品
            'is_dangerous' => '',// 是否危险品

            'pricing_cat' => '',// 计价货类
            'package_material' => '',// 商品包装材料类型
            'price' => '',
            'support_batch' => '否',
            'support_expire_date' => '0',
            'expire_date' => date('Y-m-d'),
            'support_barcode' => '0',
            'barcode' => $p['barcode'] ? $p['barcode'] : '',
            'support_antifake' => '否',
            'unit' => $p['unit'] ? $p['unit'] : '',
            'package_spec' => '',// 商品包装规格
            'ename' => '',// 商品英文名称
            'brand' => '',
            'batch_no' => '',
            'goods_cat' => '1',// 商品分类
            'goods_cat_name'=>'分类',
            'color' => '',// 商品颜色
            'property' => $spec_info,//规格
            'length'=>'33',
            'width'=>'4',
            'height'=>'5',
            'volume'=>'6',
            'size_definition'=>'2',
        );

        $params['item_lists'] = json_encode(array('item'=>$items));
        $params['uniqid'] = self::uniqid();

        return $params;
    }

  
}