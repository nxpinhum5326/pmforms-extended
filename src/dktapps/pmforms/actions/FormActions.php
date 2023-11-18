<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

/**
 * added by scher470(a.k.a. nxpinhum5326)
 */
namespace dktapps\pmforms\actions;

use dktapps\pmforms\MenuForm;
use pocketmine\player\Player;

class FormActions{
	/** @var string */
	private $type;
	/** @var array */
	private $actionConfig;

	public function __construct(string $type, array $actionConfig){
		$this->type = $type;
		$this->actionConfig = $actionConfig;
	}

	#for now its simply useless func... :d
	public function getType() : string{
		return $this->type;
	}

	/**
	 * added by scher
	 * function's name is bad, ik.
	 */
	public function actionMenuForm(Player $player, int $id) : void{
		if (isset($this->actionConfig[$id]["actions"])) {
			foreach ($this->actionConfig[$id]["actions"] as $actionConfig) {
				$this->sendAction($player, $actionConfig);
			}
		}

	}

	private function sendAction(Player $player, array $actionConfig) : void{
		$actionType = $actionConfig["action"] ?? null;
		$message = $actionConfig["message"] ?? "hello world!";

		#for&in test
		switch ($actionType) {
			case "sendMessage":
				$player->sendMessage($message);
				break;
			case "sendTitle":
				$player->sendTitle($message);
				break;
			case null:
				//todo
				break;
		}
	}

}