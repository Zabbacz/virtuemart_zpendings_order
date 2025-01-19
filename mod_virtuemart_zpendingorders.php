<?php
/**
 * @package    ZPendingOrders
 *
 * @author     zabba
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       
 */

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\ZPendingOrders\Site\Helper\ZPendingOrdersHelper;


$orders  = ZPendingOrdersHelper::getOrders();

require ModuleHelper::getLayoutPath('mod_virtuemart_zpendingorders', $params->get('layout', 'default'));