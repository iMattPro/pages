<?php
/**
 *
 * Pages extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015, 2025 phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */
// phpcs:disable PSR1.Files.SideEffects

namespace phpbb\pages\routing;

use ReflectionMethod;
use Symfony\Component\Config\Loader\LoaderInterface;

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
 * This code determines which page_loader class to use based on the phpBB version.
 * It checks if the Symfony LoaderInterface::load() method has a return type,
 * which indicates Symfony 7+ (phpBB4), otherwise falls back to phpBB3 compatibility.
 * The conditional is mandatory to ensure we only define the class if it does not
 * already exist in this request.
 *
 * @noinspection PhpMultipleClassDeclarationsInspection
 */
if (!class_exists(page_loader::class, false))
{
	$method = new ReflectionMethod(LoaderInterface::class, 'load');

	// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses
	if ($method->hasReturnType())
	{
		class page_loader extends page_loader_phpbb4 {}
	}
	else
	{
		class page_loader extends page_loader_phpbb3 {}
	}
	// phpcs:enable PSR1.Classes.ClassDeclaration.MultipleClasses
}
// phpcs:enable PSR1.Files.SideEffects
