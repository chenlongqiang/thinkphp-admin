# 开发约定如下:

## 文件结构说明

* *1. 通用说明:*
* 分模块,各模块包含自己的一套 Controller,Model,View,Logic 等
* Common/Model 为公共模型
* 各模块如需要使用公共模型并且需要进行功能扩展,如:UserModel,请务必继承公共模型后再进行本模块关于该模型的功能扩展,误重复拷贝同一模型定义重复方法
* 模块中的特定的模型,如:Demo模块下的一个TestModel仅可能在本模块中使用,则直接写在本模块下,如TestModel可能被其它某块调用,则参考上一条

* *2. Admin,Common,EventApi,Api,Demo说明:*
* Admin 系统后台
* Common 包含公共函数/配置文件(包函模块配置)/公共模型/公共服务
* EventApi 事件Api
* Api 系统Api
* Demo 活动模板目录,新开项目可拷贝该目录并重命名,注意命名空间的修改

## 配置文件说明
* 由于跨模块调用,Thinkphp无法自动加载模块配置文件,所以系统中所有的配置文件将都在 Common/Conf 目录下,并在框架启动时引入所有配置信息
* 添加全局配置,请在 config.php 中直接添加
* 组件配置/模块配置,请在配置文件数组的 KEY 写上该模块或组件的名字,以避免配置重复,如 redis.php 打头的 KEY 为 REDIS
* 添加组件配置,请在 Common/Conf 目录下添加组件配置,并在 config.php 的 $common_config 添加上相应的,配置文件
* 添加模块配置,请在 Common/Conf 目录下添加模块配置,并在 config.php 的 $module_config 添加上相应的,配置文件

## 代码规范
* Common/Model/BaseModel.class.php 为公共 Model 基类,已添加最常用 addOne,del,update,getOne,getList. 后面添加的 Model 直接继承该 Model
* 禁止在Controller,Logic,甚至View中,直接用D()或者M()直接链式调用操作数据库,如在Controller:M('Menu')->select().涉及对数据库的curd操作请写在Model中,然后使用 D()->getXxx() or 实例化 Model 后调用.
* 规范的代码缩进
* 变量命名,使用驼峰式或小写字母加下划线
* 变量命名语意化,尽量使用英文命名,避免拼音和英文结合,禁止缩写变量名,如$user_account写成$ua,对系统熟悉的同学可能一看就懂,但新同学看到这个东西:!>@#%#$@#$&……
* 代码中的方法,能包装复用的尽量包装成函数,禁止在一个方法写几百行代码
* 代码中禁止出现 if ($type == 2), 务必在Model或者Controller中定义成常量: const TYPE_OK = 2; if ($type == self::TYPE_OK)
* 代码注释,尽量多写注释,这在之后的维护中,潜移默化的会降低很多维护成本
* 其它规范参考 http://document.thinkphp.cn/manual_3_2.html#develop_standard

## author
* 新建文件的同学写好文件顶部的author,后面添加方法的同学,在方法上添加author

## 组件添加
* 本系统支持TP及Composer的方式添加组件,推荐使用Composer来进行组件添加
* vender目录即为Composer组件文件目录,Composer的使用方式请自行google

## 关于代码提交
* 代码提交说明不能放空,务必填写本次提交简要内容
