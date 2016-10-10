<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 16/9/19
 * Time: 下午03:10
 */

namespace Admin\Model;

use Common\Base\BaseModel;

class AdminRoleModel extends BaseModel
{
    
    protected $_auto = array(
        array('c_time', 'gmt_time', self::MODEL_INSERT, 'function'),
    );
    
}