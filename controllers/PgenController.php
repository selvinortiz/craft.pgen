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

		$password = craft()->request->getPost('password', false);

		if ($password)
		{
			try
			{
				$this->returnJson(array('status' => 'OK', 'result' => craft()->security->hashPassword($password)));
			}
			catch (Exception $e) {}
		}

		$this->returnJson(array('status' => 'ERROR', 'result' => 'The hash could not be created'));
	}
}
