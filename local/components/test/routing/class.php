<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Web\Json,
		Bitrix\Main\Engine\Response\Component,
		Bitrix\Main\Engine\ActionFilter,
		Bitrix\Main\Engine\Contract\Controllerable;

class Routing extends CBitrixComponent implements Controllerable
{
	/* Получение параметров которые передали при инициализации компонента
	(нужно для того чтобы получить arParams когда обращаемся к action через ajax) */
	protected function listKeysSignedParameters() : array
	{
		return [
			'ROUTES'
		];
	}
	/*Настраиваем доступ к своим действиям*/
	public function configureActions(): array
	{
		/**Отключаем у наших экшенов требования к авторизации пользователя на сайте */
		return [
			'updateContent' => [
				'-prefilters' => [
						ActionFilter\Authentication::class,
				],
			], 
		];
	}

	/* Запуск компонента */
	public function executeComponent(): void
	{
		$this->setArResult();
		$this->includeComponentTemplate();
	}
	/* Получение arResult компонента */
	public function setArResult(): void
	{
		$this->arResult['ROUTES'] = $this->arParams['ROUTES'];
		$this->arResult['SIGNED'] = Json::encode($this->getSignedParameters());
	}

	/* Возвращаем компонент на страницу */
	public function updateContentAction(string $routeKey): Component
	{
		$this->setArResult();

		$route = $this->arResult['ROUTES'][$routeKey];
		
		return new Component(
			$route['COMPONENT']['NAME'],
			$route['COMPONENT']['TEMPLATE'],
			$route['COMPONENT']['PARAMS'],
		);
		
	}
}