<?php
/**
 * Created by PhpStorm.
 * User: 1543
 * Date: 16/9/15
 * Time: 上午10:00
 */

namespace Common\Base;

use Think\Model;

class BaseModel extends Model 
{

    /**
     * 插入单条数据,并触发自动完成
     * @param $temp_data
     * @return mixed 返回成功ID
     */
    public function addOne($temp_data)
    {
        if (empty($temp_data)) {
            E('插入数据不能为空!');
        }
        $data = $this->create($temp_data, self::MODEL_INSERT);
        return $this->add($data);
    }

    /**
     * 删除数据
     * @param $where
     * @return mixed 返回删除的记录数
     */
    public function del($where)
    {
        if (empty($where)) {
            E('删除条件不能为空!');
        }
        $this->where($where);
        return $this->delete();
    }

    /**
     * 按条件更新,并触发自动完成
     * @param array $temp_data
     * @param $where
     * @return bool 返回更新的记录数
     */
    public function update($temp_data, $where)
    {
        if (empty($temp_data) || empty($where)) {
            E('更新数据 or 更新条件不能为空!');
        }
        $this->where($where);
        $this->create($temp_data, self::MODEL_UPDATE);
        return $this->save();
    }
    
    /**
     * 查询单条
     * @param $where
     * @param string $order
     * @param string $field
     * @return mixed 返回单条数据
     */
    public function getOne($where, $order = '', $field = '*')
    {
        if (empty($where)) {
            E('查询条件不能为空!');
        }
        $this->where($where);
        if (!empty($order)) {
            $this->order($order);
        }
        if (!empty($field)) {
            $this->field($field);
        }
        return $this->find();
    }

    /**
     * 查询多条数据
     * @param $where
     * @param int $page_size
     * @param int $page
     * @param string $order
     * @param string $field
     * @param bool $is_count
     * @return mixed
     */
    public function getList($where = '', $page = 1, $page_size = 10, $order = '', $field = '', $is_count = true)
    {
        if (!empty($where)) {
            $this->where($where);
        }
        if (!empty($order)) {
            $this->order($order);
        }
        $list = $page_size > 0 ? $this->page($page)->limit($page_size)->field($field)->select() : $this->field($field)->select();
        $res['list'] = $list;
        if ($is_count) { //统计条数
            $count = empty($where) ? $this->count() : $this->where($where)->count();
            $res['count'] = $count;
        }
        return $res;
    }

    /**
     * 根据条件统计总数量
     *
     * @param string $field 统计字段
     * @param array  $where 筛选条件
     *
     * @return void
     */
    public function getCount($field='*', $where=array())
    {
        try {
            if ($where) {
                $this->where($where);
            }
            $total = $this->count($field);
            !$total && $total = 0;
            return $total;
        } catch(\Think\Exception $e) {
            E($e->getMessage());   
        }
    }

    /**
     * 根据条件计算求和某个字段
     *
     * @param string $field 求和字段
     * @param array  $where 筛选条件
     *
     * @return void
     */
    public function getSum($field, $where=array())
    {
        try {
            if ($where) {
                $this->where($where);
            }
            $total = $this->sum($field);
            !$total && $total = 0;
            return $total;
        } catch(\Think\Exception $e) {
            E($e->getMessage());   
        }
    }


}
