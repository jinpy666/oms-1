<?php
class wms_mdl_delivery_log extends dbeav_model{
    public function getDeliveryIdByLogiNO($logiNO){
        $sql = 'SELECT delivery_id FROM sdb_wms_delivery_log WHERE logi_no=\'' . addslashes($logiNO) .
            '\' GROUP BY delivery_id';
        $rows = $this->db->select($sql);
        return $rows;
    }
}