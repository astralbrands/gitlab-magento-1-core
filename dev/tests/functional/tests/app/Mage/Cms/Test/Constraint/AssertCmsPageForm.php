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

namespace Mage\Cms\Test\Constraint;

use Mage\Cms\Test\Fixture\CmsPage;
use Mage\Cms\Test\Page\Adminhtml\CmsPageEdit;
use Magento\Mtf\Constraint\AbstractAssertForm;
use Mage\Cms\Test\Page\Adminhtml\CmsPageIndex;
use Mage\Cms\Test\Page\Adminhtml\CmsPageNew;
use Mage\Adminhtml\Test\Block\Cms\Page\Edit\Tab\Content;

/**
 * Assert that displayed CMS page data on edit page equals passed from fixture.
 */
class AssertCmsPageForm extends AbstractAssertForm
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Skipped fields for verify data.
     *
     * @var array
     */
    protected $skippedFields = ['content', 'page_id'];

    /**
     * Assert that displayed CMS page data on edit page equals passed from fixture.
     *
     * @param CmsPage $cms
     * @param CmsPageIndex $cmsPageIndex
     * @param CmsPageNew $cmsPageNew
     * @return void
     */
    public function processAssert(CmsPage $cms, CmsPageIndex $cmsPageIndex, CmsPageNew $cmsPageNew)
    {
        $cmsPageIndex->open();
        $cmsPageIndex->getCmsPageGridBlock()->searchAndOpen(['title' => $cms->getTitle()]);
        $cmsFormData = $cmsPageNew->getPageForm()->getData($cms);
        $errors = $this->verifyData($cms->getData(), $cmsFormData);
        \PHPUnit_Framework_Assert::assertEmpty($errors, $errors);
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'CMS page data on edit page equals data from fixture.';
    }
}
