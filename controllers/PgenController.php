<?php
namespace Craft;

class PgenController extends BaseController
{
	/**
	 * @throws Exception
	 * @throws HttpException
	 */
	public function actionGenerate()
	{
		$this->requirePostRequest();

		$error            = null;
		$generatedHash    = null;
		$responseFormat   = craft()->request->getPost('responseFormat', 'json');
		$suppliedPassword = craft()->request->getPost('password', false);

		if ($this->isValidPassword($suppliedPassword))
		{
			try
			{
				$generatedHash = craft()->security->hashPassword($suppliedPassword);
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}
		}
		else
		{
			$error = Craft::t('Password provided is invalid.');
		}

		$this->deliverHash($generatedHash, $responseFormat, $error);
	}

	protected function isValidPassword($password)
	{
		return (bool) (is_string($password) && strlen($password) > 6);
	}

	protected function deliverHash($hash, $responseFormat, $error)
	{
		switch (strtolower($responseFormat))
		{
			case 'flash':
			{
				craft()->userSession->setFlash('generatedHash', $hash);

				$this->redirectToPostedUrl();
			}
			case 'json':
			default:
			{
				$this->returnJson(array('status' => $error ? 'ERROR' : 'OK', 'result' => $error ? $error : $hash));
			}
		}
	}
}
