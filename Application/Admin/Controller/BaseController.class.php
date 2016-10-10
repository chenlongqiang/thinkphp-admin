<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 16/9/13
 * Time: 上午11:42
 */
namespace Admin\Controller;

use Admin\Model\MenuModel;
use Think\Controller;

class BaseController extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        //登陆判断
        if(!PassportController::checkLogin()){
            $this->redirect('Passport/login');
        }
        
        //获取登陆用户的目录列表
        $admin_id = R('Passport/getAdminIdInSession');
        $sidebar_menu = MenuModel::getAuthMenu($admin_id);
        if ($sidebar_menu === false) {
            $this->error('用户类型不存在!');
        } else {
            $this->assign('__menu', $sidebar_menu);
        }
        
        $this->assign('__menu', $sidebar_menu);
    }

}