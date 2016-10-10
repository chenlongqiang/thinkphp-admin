<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 16/9/12
 * Time: 下午06:22
 */
namespace Admin\Controller;

use Admin\Model\MenuModel;

class SystemController extends BaseController {
    
    public function menuList()
    {
        //配置
        $config = array(
            'page_size' => 10,
            'status' => array(
                '1' => '显示',
                '2' => '隐藏',
            )
        );

        //过滤条件
        $filter = I('post.filter');
        
        //判断是否重置过滤条件
        $reset = I('post.reset');
        if (!empty($reset)) {
            $filter = array();
        }
        $where = $this->buildWhereToMenuList($filter);
        
        //获取列表
        $result = D('Menu')->getList($where, I('get.p'), $config['page_size'], 'sort asc,id asc');

        $this->assign('page', get_page($result['count'], $config['page_size']));
        $this->assign('list', $result['list']);
        $this->assign('filter', $filter);
        $this->assign('config', $config);
        $this->assign('title', '菜单管理');
        $this->display('menu_list');
    }
    
    private function buildWhereToMenuList($filter)
    {
        $where = array();
        if (!empty($filter['status'])) {
            $where['status'] = array('eq', $filter['status']);
        }
        if (!empty($filter['keyword'])) {
            $where[$filter['option']] = array('eq', $filter['keyword']);
        }
        if (!empty($filter['pid'])) {
            $where['pid'] = array('eq', $filter['pid']);
        }
        
        //默认条件
        if (empty($where)) {
            $where = array(
                'level' => MenuModel::LEVEL_FIRST,
            );
        }
        return $where;
    }
 
    public function menuDelete()
    {
        $data = I('');
        $result = D('Menu')->del(array('id' => $data['id']));
        if ($result) {
            $this->success('操作成功!', U('System/menuList'));
        } else {
            $this->error('操作失败');
        }
    }
    
    public function menuEdit()
    {
        $data = I('');
        $id = array_pull($data, 'val.id');
        if (!empty($id)) {
            //更新
            D('Menu')->update($data['val'], array('id' => $id));
        } else {
            //添加
            D('Menu')->addOne($data['val']);
        }
        $this->success('操作成功!', U('System/menuList'));
    }
    
    public function roleList()
    {
        //配置
        $config = array(
            'page_size' => 10,
        );

        //过滤条件
        $filter = I('post.filter');

        //判断是否重置过滤条件
        $reset = I('post.reset');
        if (!empty($reset)) {
            $filter = array();
        }
        $where = $this->buildWhereToRoleList($filter);

        //获取列表
        $result = D('Role')->getList($where, I('get.p'), $config['page_size']);

        $this->assign('page', get_page($result['count'], $config['page_size']));
        $this->assign('list', $result['list']);
        $this->assign('filter', $filter);
        $this->assign('config', $config);
        $this->assign('title', '角色管理');
        $this->display('role_list');
    }

    private function buildWhereToRoleList($filter)
    {
        $where = array();
        if (!empty($filter['keyword'])) {
            $where[$filter['option']] = array('eq', $filter['keyword']);
        }
        return $where;
    }

    public function roleDelete()
    {
        $data = I('');
        $result = D('Role')->del(array('id' => $data['id']));
        if ($result) {
            $this->success('操作成功!', U('System/roleList'));
        } else {
            $this->error('操作失败');
        }
    }

    public function roleEdit()
    {
        $data = I('');
        $id = array_pull($data, 'val.id');
        if (!empty($id)) {
            //更新
            D('Role')->update($data['val'], array('id' => $id));
        } else {
            //添加
            D('Role')->addOne($data['val']);
        }
        $this->success('操作成功!', U('System/roleList'));
    }

    public function roleMenuList()
    {
        $data = I('');
        
        //获取菜单的后需要组装数据,技巧:先从最末层往上层拼数据
        $all_menus = D('Menu')->getList(array(), 1, -1, 'level desc,sort asc,id asc', 'id,name,pid', false);
        $lists = MenuModel::organizeMenu($all_menus['list']);

        $role_menus = D('RoleMenu')->getList(array('role_id' => $data['role_id']), 1, -1, '', 'menu_id', false);
        $menu_ids = array_column($role_menus['list'], 'menu_id');

        $this->assign('menu_list', $lists);
        $this->assign('menu_ids', $menu_ids);
        $this->assign('input_data', $data);
        $this->display('role_menu_list');
    }

    public function roleMenuEdit()
    {
        $data = I('');

        //1.删除该role_id旧的所有关系数据
        D('RoleMenu')->del(array('role_id' => $data['val']['role_id']));

        //2.添加新的关系数据
        foreach ($data['val']['menu_id'] as $menu_id) {
            D('RoleMenu')->addOne(array(
                'role_id' => $data['val']['role_id'],
                'menu_id' => $menu_id
            ));
        }
        $this->success('操作成功!', U('System/roleList'));
    }

    public function adminList()
    {
        //配置
        $config = array(
            'page_size' => 10,
            'status' => array(
                '1' => '已启用',
                '2' => '已禁用',
            ),
            'is_manager' => array(
                '0' => '超级管理员',
                '1' => '管理员',
                '2' => '普通用户',
            ),
        );

        //过滤条件
        $filter = I('post.filter');

        //判断是否重置过滤条件
        $reset = I('post.reset');
        if (!empty($reset)) {
            $filter = array();
        }
        $where = $this->buildWhereToAdminList($filter);

        //获取列表
        $result = D('Admin')->getList($where, I('get.p'), $config['page_size']);

        $this->assign('page', get_page($result['count'], $config['page_size']));
        $this->assign('list', $result['list']);
        $this->assign('filter', $filter);
        $this->assign('config', $config);
        $this->assign('title', '用户管理');
        $this->display('admin_list');
    }

    private function buildWhereToAdminList($filter)
    {
        $where = array();
        if (!empty($filter['keyword'])) {
            $where[$filter['option']] = array('eq', $filter['keyword']);
        }
        return $where;
    }

    public function adminDelete()
    {
        $data = I('');
        if ($data['id'] == '1') {
            $this->error('禁止删除超级管理员!');
        }
        $result = D('Admin')->del(array('id' => $data['id']));
        if ($result) {
            $this->success('操作成功!', U('System/adminList'));
        } else {
            $this->error('操作失败');
        }
    }

    public function adminEdit()
    {
        $data = I('');
        $id = array_pull($data, 'val.id');
        if ($id == '1') {
            $this->error('禁止编辑超级管理员!');
        }
        if (!empty($id)) {
            //更新
            D('Admin')->update($data['val'], array('id' => $id));
        } else {
            //添加
            D('Admin')->addOne($data['val']);
        }
        $this->success('操作成功!', U('System/adminList'));
    }

    //用户名存在remote验证
    public function adminRemoteNameExists($name, $id = '')
    {
        $where = array(
            'name' => array('eq', $name)
        );
        if ($id) {
            $where['id'] = array('neq', $id);
        }
        $result = D('Admin')->getList($where, 1, -1, '', '', false);

        if (!empty($result['list'])) {
            $data = array(
                'error' => $name.' 用户名已存在!'
            );
        } else {
            $data = array(
                'ok' => '该用户名可以使用!'
            );
        }
        $this->ajaxReturn($data);
    }

    public function adminRoleList()
    {
        $data = I('');

        $all_roles = D('Role')->getList(array(), 1, -1, '', 'id,name', false);

        $admin_roles = D('AdminRole')->getList(array('admin_id' => $data['admin_id']), 1, -1, '', 'role_id', false);
        $role_ids = array_column($admin_roles['list'], 'role_id');

        $this->assign('role_list', $all_roles['list']);
        $this->assign('role_ids', $role_ids);
        $this->assign('input_data', $data);
        $this->display('admin_role_list');
    }

    public function adminRoleEdit()
    {
        $data = I('');

        //1.删除该admin_id旧的所有关系数据
        D('AdminRole')->del(array('admin_id' => $data['val']['admin_id']));

        //2.添加新的关系数据
        foreach ($data['val']['role_id'] as $role_id) {
            D('AdminRole')->addOne(array(
                'admin_id' => $data['val']['admin_id'],
                'role_id' => $role_id
            ));
        }
        $this->success('操作成功!', U('System/adminList'));
    }
    
}