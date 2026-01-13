<?php
/**
*
* Pages extension for the phpBB Forum Software package.
*
* @copyright (c) 2025 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace phpbb\pages\tests\routing;

use ReflectionMethod;
use Symfony\Component\Config\Loader\LoaderInterface;

class page_loader_version_detection_test extends \phpbb_test_case
{
	protected static function setup_extensions()
	{
		return array('phpbb/pages');
	}

	public function test_page_loader_class_exists()
	{
		self::assertTrue(class_exists(\phpbb\pages\routing\page_loader::class));
	}

	public function test_page_loader_extends_correct_adapter()
	{
		$method = new ReflectionMethod(LoaderInterface::class, 'load');

		if ($method->hasReturnType())
		{
			self::assertInstanceOf(\phpbb\pages\routing\page_loader_phpbb4::class,
				new \phpbb\pages\routing\page_loader($this->createMock(\phpbb\db\driver\driver_interface::class), 'test_table'),
				'page_loader should extend page_loader_phpbb4 when LoaderInterface::load() has return type (Symfony 7/phpBB4)'
			);
		}
		else
		{
			self::assertInstanceOf(\phpbb\pages\routing\page_loader_phpbb3::class,
				new \phpbb\pages\routing\page_loader($this->createMock(\phpbb\db\driver\driver_interface::class), 'test_table'),
				'page_loader should extend page_loader_phpbb3 when LoaderInterface::load() has no return type (Symfony 3-6/phpBB3)'
			);
		}
	}

	public function test_version_detection_logic()
	{
		$method = new ReflectionMethod(LoaderInterface::class, 'load');
		$hasReturnType = $method->hasReturnType();

		$reflection = new \ReflectionClass(\phpbb\pages\routing\page_loader::class);
		$parent = $reflection->getParentClass();

		if ($hasReturnType)
		{
			self::assertSame(\phpbb\pages\routing\page_loader_phpbb4::class, $parent->getName(),
				'Symfony 7+ detected: page_loader must extend page_loader_phpbb4'
			);
		}
		else
		{
			self::assertSame(\phpbb\pages\routing\page_loader_phpbb3::class, $parent->getName(),
				'Symfony 3-6 detected: page_loader must extend page_loader_phpbb3'
			);
		}
	}
}
