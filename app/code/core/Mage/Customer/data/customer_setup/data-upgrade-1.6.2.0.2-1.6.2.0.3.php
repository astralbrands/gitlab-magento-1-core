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
 * @category    Mage
 * @package     Mage_Customer
 * @copyright Copyright (c) 2006-2018 Magento, Inc. (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

/** @var $installer Mage_Customer_Model_Entity_Setup */
$installer = $this;
$datetimeType = 'datetime';
// implementation new type for static date attributes
$installer->updateAttribute('customer', 'created_at', 'frontend_input', $datetimeType);

// implement new input filter for datetime type attribute
$attribute = $installer->getAttribute('customer', 'created_at');

$attributeBind = array(
    'input_filter' => $datetimeType,
);

$attributeWhere = $installer->getConnection()->quoteInto('attribute_id=?', $attribute['attribute_id']);
$installer->getConnection()->update($installer->getTable('customer/eav_attribute'), $attributeBind, $attributeWhere);
