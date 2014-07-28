<?php
namespace Piwik\Plugins\UsersManagerMatrix;

use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

class Menu extends \Piwik\Plugin\Menu
{

    public function configureAdminMenu(MenuAdmin $menu)
    {
        $menu->add('CoreAdminHome_MenuManage', 'UsersManagerMatrix_MenuUsers', array(
            'module' => 'UsersManagerMatrix',
            'action' => 'index'
        ), Piwik::isUserHasSomeAdminAccess(), $order = 4);
    }
}
