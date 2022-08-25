<?php
/**
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\UploadToogle;

use Piwik\Config;
use Piwik\Menu\MenuTop;
use Piwik\Piwik;

class Menu extends \Piwik\Plugin\Menu
{

    public function configureTopMenu(MenuTop $menu) {
        if (Piwik::hasUserSuperUserAccess()) {
			// à adapter
            $enabled = (bool)Config::getInstance()->General['enable_plugin_upload'];
            if ($enabled) {
                $iconName = "icon-upload";
                $tooltip = Piwik::translate("UploadToogle_Disable");
            } else {
                $iconName = "icon-locked";
                $tooltip = Piwik::translate("UploadToogle_Enable");
            }
            $additionalParams = ["returnModule" => Piwik::getModule(), "returnAction" => Piwik::getAction(), "uploadmode" => var_export(!$enabled, true)];
            $menu->registerMenuIcon(Piwik::translate("UploadToogle_Toggle"), $iconName);

            $menu->addItem(Piwik::translate("UploadToogle_Toggle"), null, $this->urlForDefaultAction($additionalParams), $orderId = 46, $tooltip);
        }
    }

}
