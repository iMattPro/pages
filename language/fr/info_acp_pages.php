<?php
/**
*
* Pages extension for the phpBB Forum Software package.
* French translation by ForumsFaciles (www.forumsfaciles.fr) & Galixte (http://www.galixte.com)
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, [
	// ACP modules
	'ACP_PAGES'				=> 'Pages',
	'ACP_PAGES_MANAGE'		=> 'Gestion de Pages',

	// Logs
	'ACP_PAGES_ADDED_LOG'	=> '<strong>Page ajoutée</strong><br />» %s',
	'ACP_PAGES_EDITED_LOG'	=> '<strong>Page modifiée</strong><br />» %s',
	'ACP_PAGES_DELETED_LOG'	=> '<strong>Page supprimée</strong><br />» %s',
]);
