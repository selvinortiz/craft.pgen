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
		$generatedHash = craft()->userSession->getFlash('generatedHash');

		return craft()->templates->render('pgen/pgen.html', compact('generatedHash'));
	}
}
