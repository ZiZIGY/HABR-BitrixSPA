<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Engine\Contract\Controllerable;

class First extends CBitrixComponent implements Controllerable
{
	/* Получение параметров которые передали при инициализации компонента
	(нужно для того чтобы получить arParams когда обращаемся к action через ajax) */
	protected function listKeysSignedParameters() : array
	{
		return [
			'TITLE'
		];
	}
	/*Настраиваем доступ к своим действиям*/
	public function configureActions(): array
	{
		return [];
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
		$this->arResult = $this->arParams;
	}
}