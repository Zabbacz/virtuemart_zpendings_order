<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_virtuemart_zpendingorders
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\ZPendingOrders\Site\Helper;
use Joomla\CMS\Factory;

// No direct access to this file
defined('_JEXEC') or die;

/**
 * Helper for mod_zpendingorders
 *
 * @since  4.0
 */
class ZPendingOrdersHelper
{

	/**
	 * Retrieve foo test
	 *
	 * @param   Registry        $params  The module parameters
	 * @param   CMSApplication  $app     The application
	 *
	 * @return  array
	 */
	

	public static function getOrders()
	{
		$db = Factory::getDBO();
		$user = Factory::getUser();
		$q = $db->getQuery(true);
		$q
			->select ($db->quoteName (array('t2.order_number', 't1.order_item_sku','t1.order_item_name','t1.product_quantity','t1.product_item_price')))
			->from($db->quoteName('#__virtuemart_order_items','t1'))
			->join('INNER',$db->quoteName('#__virtuemart_orders','t2'). ' ON ' . $db->quoteName('t1.virtuemart_order_id') . ' = ' . $db->quoteName('t2.virtuemart_order_id'))
			->where($db->quoteName('t1.order_status'). ' = '.'"U"')
			->where($db->quoteName('t2.virtuemart_user_id'). ' = '.($user->id));
		$db->setQuery ($q);
		$q = $db->loadObjectList(); 

	return $q;  
	}
}