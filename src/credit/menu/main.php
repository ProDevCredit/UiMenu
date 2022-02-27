<?php
namespace credit\vip;

use pocketmine\Server;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
  public function onEnable(){
        $this->getLogger()->info("§aBenticraft Vip menu Activado");
  }

  public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args): bool {
    switch($cmd->getName()){
      case "vip":
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
                     $this->getServer()->dispatchCommand($player, "mw tp minavip");
                     break;
                                                                           
                     case 1:
                     $this->getServer()->dispatchCommand($player, "mw tp tiendavip");
                     break;
                            case 2:
                     $this->getServer()->dispatchCommand($player, "mw tp parcelasvip");
                     break;
                       }
                    });
                        $form->setTitle("§l§6Benti§fCraft §eVIP Menu");
                        $form->addButton("§g§oMina Vip \n§fClick Para Ir", 0, "textures/items/diamond_pickaxe");
                        $form->addButton("§g§oTienda Vip \n§fClick Para Ir", 0, "textures/items/gold_ingot");
                        $form->addButton("§g§oParcelas Vip\n§fClick Para Ir", 0, "textures/items/iron_shovel");
                        $form->sendToPlayer($player);
                        return $form;
            }
}
