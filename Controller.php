<?php
namespace Piwik\Plugins\UsersManagerMatrix;

use Piwik\Piwik;
use Piwik\NoAccessException;
use Piwik\Common;
use Piwik\View;
use Piwik\Plugins\SitesManager\API as APISitesManager;
use Piwik\Plugins\UsersManager\API as APIUsersManager;

class Controller extends \Piwik\Plugin\ControllerAdmin
{

    /**
     * The "Manage Users and Permissions" Admin UI screen
     */
    public function index()
    {
        // makes only sense for admin users
        if (Piwik::isUserHasSomeAdminAccess() === false) {
            // @todo right message
            throw new NoAccessException(Piwik::translate('General_YouMustBeLoggedIn'));
        }
        
        $view = new View('@UsersManagerMatrix/userMatrix');
        
        $sitesIdAvailable = APISitesManager::getInstance()->getSitesIdWithAdminAccess();
        $siteIdSelected = Common::getRequestVar('idSite', $sitesIdAvailable[0]);
        
        $sites = APISitesManager::getInstance()->getAllSites();
        $users = APIUsersManager::getInstance()->getUsers();
        
        $sitesAccess = [];
        foreach ($sitesIdAvailable as $siteId) {
            $sitesAccess[$siteId] = APIUsersManager::getInstance()->getUsersAccessFromSite($siteId);
        }
        
        $view->sites = $sites;
        $view->sitesIdAvailable = $sitesIdAvailable;
        $view->siteIdSelected = $siteIdSelected;
        $view->users = $users;
        $view->sitesAccess = $sitesAccess;
        $this->setBasicVariablesView($view);
        
        return $view->render();
    }
}
