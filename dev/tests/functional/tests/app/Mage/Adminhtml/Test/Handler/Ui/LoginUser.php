<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition End User License Agreement
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magento.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Tests
 * @package     Tests_Functional
 * @copyright Copyright (c) 2006-2018 Magento, Inc. (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

namespace Mage\Adminhtml\Test\Handler\Ui;

use Mage\Adminhtml\Test\Page\Adminhtml\Dashboard;
use Magento\Mtf\Fixture\FixtureInterface;
use Magento\Mtf\Handler\Ui;
use Mage\Adminhtml\Test\Page\AdminAuthLogin;

/**
 * Handler for ui backend user login.
 */
class LoginUser extends Ui
{
    /**
     * Admin auth login page.
     *
     * @var AdminAuthLogin
     */
    protected $adminAuthLogin;

    /**
     * Dashboard page.
     *
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * @constructor
     * @param AdminAuthLogin $adminAuthLogin
     * @param Dashboard $dashboard
     */
    public function __construct(AdminAuthLogin $adminAuthLogin, Dashboard $dashboard)
    {
        $this->adminAuthLogin = $adminAuthLogin;
        $this->dashboard = $dashboard;
    }

    /**
     * Login admin user.
     *
     * @param FixtureInterface $fixture [optional]
     * @return mixed|string
     */
    public function persist(FixtureInterface $fixture = null)
    {
        $this->adminAuthLogin->open();
        $loginBlock = $this->adminAuthLogin->getLoginBlock();
        if ($loginBlock->isVisible()) {
            $loginBlock->fill($fixture);
            $loginBlock->submit();
            $this->dashboard->getAdminPanelHeader()->waitVisible();
        }
    }
}
