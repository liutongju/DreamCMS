<?php

/*
 * +----------------------------------------------------------------------
 * | DreamCMS [ WE CAN  ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2014 DreamCMS All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: 孔雀翎 <284909375@qq.com>
 * +----------------------------------------------------------------------
 */

namespace Plugin\Controller;

class PluginController extends \Auth\Controller\AuthbaseController
{

    public function pluginlist()
    {
        $path = 'Plugin/';
        $files = \getfils($path, $path);
        $filter = array('Base', 'Common', 'Home');
        $plugin_arr = array();
        foreach ($files as $f)
        {
            if (!in_array($f, $filter))
            {
                $lang_file = 'Lang/Plugin/' . C('DEFAULT_LANG') . '/' . $f . '/' . strtolower($f) . '.php';
                if (file_exists($lang_file))
                {
                    L(include($lang_file));
                }
                $xml = simplexml_load_file('Plugin/' . $f . '/config.xml');
                $xml->plugin = $f;
                $plugin_arr[] = $xml;
            }
        }
        $this->assign('plugin_arr', $plugin_arr);
        $this->display();
    }

    /**
     * 安装插件
     * 后台需要插入权限和菜单
     */
    public function install()
    {
        /* 获取插件信息 */
        $plugin = I('get.plugin');
        $config_path = 'Plugin/' . $plugin . '/config.xml';
        $pluginfo = \simplexml_load_file($config_path);
        $name = (string) $pluginfo->name;
        $desc = (string) $pluginfo->desc;
        $plugin_data = array('name' => $name, 'desc' => $desc, 'filetitle' => $plugin);
        $pluginModel = DD('Plugin');
        $b = $pluginModel->add($plugin_data);
        if (!$b)
        {
            $this->error(L('OP_ERROR'));
        }
        $pluginid = $pluginModel->getLastInsID();
        $plugin_data_list = array();
        //判断后台菜单  插入数据库
        $k = 0;
        if (isset($pluginfo->admin->operation))
        {
            foreach ($pluginfo->admin->operation as $op)
            {
                $path = (string) $op->path;
                $group = $plugin;
                $path_arr = explode('/', $path);
                list($control, $action) = $path_arr;
                $menu_group = (string) $op->menu_group;
                $menu_module = (string) $op->menu_module;
                ctype_digit($menu_group) == true ? $menu_gid = ctype_digit($menu_group) : $menu_gid = 0;
                ctype_digit($menu_module) == true ? $menu_mid = ctype_digit($menu_module) : $menu_mid = 0;

                //添加新分组
                if ($menu_gid == 0)
                {
                    $AdminAuthGroup = DD('AdminAuthGroup');
                    $groupdata = array(
                        'title' => '', 'groupname' => $plugin, 'langconf' => $menu_group,
                    );
                    $b = $AdminAuthGroup->addgroup($groupdata);
                    if ($b)
                    {
                        $menu_gid = $AdminAuthGroup->getLastInsID();
                    }
                }

                //添加新Controller
                if ($menu_mid == 0)
                {
                    $control_data = array(
                        'title' => '', 'cname' => $control, 'gid' => $menu_gid, 'lanconf' => $menu_module, 'cls' => 'icon-resize-full',
                    );
                    $AdminAuthController = DD('AdminAuthController');
                    $b = $AdminAuthController->add($control_data);
                    if ($b)
                    {
                        $menu_mid = $AdminAuthController->getLastInsID();
                    }
                }

                //添加Action
                $action_data = array(
                    'title' => '', 'app' => 'plugin.php', 'gid' => $menu_gid, 'cid' => $menu_mid,
                    'group' => $plugin, 'controller' => $control, 'action' => $action,
                    'langconf' => (string) $op->name,
                );
                if (isset($op->ismenu))
                {
                    if ((string) $op->ismenu == 1)
                    {
                        //是菜单
                        $action_data['isshow'] = 1;
                    }
                }
                $AdminAuthAction = DD('AdminAuthAction');
                $AdminAuthAction->addAction($action_data);

                if ((string) $op->js != '' || (string) $op->css != '')
                {
                    $plugin_data_list[$k] = array(
                        'path' => $plugin . '/' . $path,
                        'js' => $op->js, 'css' => $op->css,
                        'acname' => (string) $op->name, 'pid' => $pluginid,
                    );
                    $k++;
                }
            }
        }

        //前台资源
        if (isset($pluginfo->site->operation))
        {
            foreach ($pluginfo->site->operation as $op)
            {
                if ((string) $op->js != '' || (string) $op->css != '')
                {
                    $plugin_data_list[$k] = array(
                        'path' => $plugin . '/' . $path,
                        'js' => $op->js, 'css' => $op->css,
                        'acname' => (string) $op->name, 'pid' => $pluginid,
                    );
                    $k++;
                }
            }
        }

        //写入插件资源 
        $PluginRes = DD('PluginRes');
        $b = $PluginRes->addlist();
        //写入钩子
        if (isset($pluginfo->vhook))//视图钩子
        {
            foreach ($pluginfo->vhook as $vhook)
            {
                //钩子信息插入数据库
            }
        }
        //获取插件SQL文件
    }

    /**
     * 卸载插件
     * 从数据库移除
     */
    public function uninstall()
    {
        
    }

    /**
     * 删除插件
     * 先从数据库移除 在删除
     */
    public function delete()
    {
        
    }

}
