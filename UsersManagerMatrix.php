<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\UsersManagerMatrix;

use Exception;

/**
 * Manage Piwik users
 */
class UsersManagerMatrix extends \Piwik\Plugin
{

    public function getListHooksRegistered()
    {
        return [
            'AssetManager.getJavaScriptFiles' => 'getJsFiles',
            'AssetManager.getStylesheetFiles' => 'getStylesheetFiles'
        ];
    }

    /**
     * Return list of plug-in specific JavaScript files to be imported by the asset manager
     *
     * @see Piwik\AssetManager
     */
    public function getJsFiles(&$jsFiles)
    {
        $jsFiles[] = 'plugins/UsersManagerMatrix/javascripts/usersManagerMatrix.js';
    }

    /**
     * Get CSS files
     */
    public function getStylesheetFiles(&$stylesheets)
    {
        $stylesheets[] = 'plugins/UsersManagerMatrix/stylesheets/usersManagerMatrix.less';
    }
}
