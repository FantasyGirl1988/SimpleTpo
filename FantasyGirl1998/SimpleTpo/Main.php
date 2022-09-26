<?php

namespace FantasyGirl1988\SimpleTpo;

use pocketmine\player\Player;

use pocketmine\Server;

use pocketmine\command\CommandSender;

use pocketmine\command\Command;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

  

  public function onEnable(): void{

    $this->getLogger()->info("Geladen!");

  }

  

  public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{

    

    switch($cmd->getName()){

      

      case "tpo":

        if(!$sender instanceof Player){

          $sender->sendMessage("Benutze das Ingame!");

          return false;

        }

        if(!isset($args[0])){

          $sender->sendMessage("§cBenutze: /tpo <spieler>");

          return false;

        }

        if(isset($args[0])){

          $player = $this->getServer()->getPlayerExact($args[0]);

          if(!$player){

            $sender->sendMessage("§cDer Spieler ist nicht Online oder Existiert nicht!");

            return false;

          }

          $sender->teleport($player->getPosition());

          $sender->sendMessage("§aDu wurdest zu §e" . $player->getName() . " §aTeleportiert!");

        }

        break;

      case "tpohere":

        if(!$sender instanceof Player){

          $sender->sendMessage("Benutze das Ingame!");

          return false;

        }

        if(!isset($args[0])){

          $sender->sendMessage("§cBenutze: /tpohere <spieler>");

          return false;

        }

        if(isset($args[0])){

          $player = $this->getServer()->getPlayerExact($args[0]);

          if(!$player){

            $sender->sendMessage("§cDieser Spieler ist nicht Online oder Existiert nicht!");

            return false;

          }

          $player->teleport($sender->getPosition());

          $sender->sendMessage("§aDu hast §e" . $player->getName() . " §azu dir Teleportiert!");

        }

        break;

    }

    return true;

  }

}
