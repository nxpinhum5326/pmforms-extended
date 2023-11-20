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

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class FormActions{
	/** @var string */
	private $type;
	/** @var Config[] */
	private $actionConfig;

	/**
	 * @param string $type
	 * @param Config[] $actionConfig
	 */
	public function __construct(string $type, array $actionConfig){
		$this->type = $type;
		$this->actionConfig = $actionConfig;
	}

	/**
	 * @return string
	 */
	public function getType() : string{
		return $this->type;
	}

	/**
	 * @param Player $player
	 * @param int $id
	 * @return void
	 */
	public function actionMenuForm(Player $player, int $id) : void{
		if (isset($this->actionConfig[$id]["actions"])) {
			foreach ($this->actionConfig[$id]["actions"] as $actionConfig) {
				$this->sendAction($player, $actionConfig);
			}
		}

	}

	/**
	 * @param Player $player
	 * @param Config[] $actionConfig
	 * @return void
	 */
	private function sendAction(Player $player, array $actionConfig) : void{
		$actionType = $actionConfig["action"] ?? null;
		$message = $actionConfig["message"] ?? "hello world!";
		if (is_string($message)) {
			#for&in test
			switch ($actionType) {
				case "sendMessage":
					$player->sendMessage($message);
					break;
				case "sendTitle":
					$player->sendTitle($message);
					break;
				case null:
					Server::getInstance()->getLogger()->alert("[pmforms-extended] null data received");
					break;
			}
		}

	}

}