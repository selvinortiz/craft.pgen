<?php
namespace Craft;

class PgenWidget extends BaseWidget
{
	public function getName()
	{
		return 'Pgen Widget';
	}

	public function getBodyHtml()
	{
		return craft()->templates->render('pgen/pgen.html');
	}
}
