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
 * @category    Enterprise
 * @package     Enterprise_Catalog
 * @copyright Copyright (c) 2006-2018 Magento, Inc. (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

/**
 * Category/Product indexer dummy
 *
 * @category    Enterprise
 * @package     Enterprise_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Enterprise_Catalog_Model_Index_Dummy_Product extends Enterprise_Index_Model_Indexer_Dummy
{
    /**
     * Retrieve Indexer name
     *
     * @return string
     */
    public function getName()
    {
        return Mage::helper('enterprise_catalog')->__('Product Flat Data');
    }

    /**
     * Retrieve Indexer description
     *
     * @return string
     */
    public function getDescription()
    {
        return Mage::helper('enterprise_catalog')->__('Reorganize EAV product structure to flat structure');
    }

    /**
     * Whether the indexer should be displayed on process/list page
     *
     * @return bool
     */
    public function isVisible()
    {
        /** @var $productFlatHelper Mage_Catalog_Helper_Product_Flat */
        $productFlatHelper = Mage::helper('catalog/product_flat');
        return $this->_isVisible && $productFlatHelper->isEnabled();
    }
}
