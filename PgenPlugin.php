<?php
namespace Craft;

class PgenPlugin extends BasePlugin
{
	public function getName()
	{
		return 'Pgen';
	}

	public function getVersion()
	{
		return '1.0.0';
	}

	public function getDeveloper()
	{
		return 'Selvin Ortiz';
	}

	public function getDeveloperUrl()
	{
		return 'http://selvinortiz.com';
	}

	public function registerCpRoutes()
	{
		return array(
			'pgen/generate' => array('action' => 'pgen/generate'),
		);
	}
}
