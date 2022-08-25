<?php
/**
 * @license https://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\UploadToogle;

use Piwik\Common;
use Piwik\Config;
use Piwik\Piwik;

class Controller extends \Piwik\Plugin\Controller
{
    public function index() {
        Piwik::checkUserHasSuperUserAccess();
        $uploadmode = Common::getRequestVar("uploadmode") == "true";
        Config::getInstance()->General['enable_plugin_upload'] = $uploadmode;
        Config::getInstance()->forceSave();
        $returnModule = Common::getRequestVar("returnModule");
        $returnAction = Common::getRequestVar("returnAction");
        $this->redirectToIndex($returnModule, $returnAction);
    }
}
