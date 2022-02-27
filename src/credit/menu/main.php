<?php
namespace credit\menu;

use pocketmine\Server;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
  public function onEnable(){
        $this->getLogger()->info("menu Activado");
  }

  public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args): bool {
    switch($cmd->getName()){
      case "menu":
      if($sender instanceof Player){
        $this->test($sender);
           } else {
                 $sender->sendMessage("Type in-game");
      }
    }
    return true;
  }
            public function test($player){
              $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){
                if($data === null){
                  return true;
                } 
                 switch($data){
                  case 0:
                     $this->getServer()->dispatchCommand($player, "say comando 1");
                     break;
                                                                           
                     case 1:
                     $this->getServer()->dispatchCommand($player, "say comando 2");
                     break;
                            case 2:
                     $this->getServer()->dispatchCommand($player, "say comando 3");
                     break;
                       }
                    });
                        $form->setTitle("§l§bMenu-UI");
                        $form->addButton("§l§bnombre\n§fClick", 0, "textures/ui/icon_random");
                        $form->addButton("§l§bnombre\n§fClick", 0, "textures/ui/icon_random");
                        $form->addButton("§l§bNombre\n§fClick", 0, "textures/items/icon_random");
                        $form->sendToPlayer($player);
                        return $form;
            }
}
