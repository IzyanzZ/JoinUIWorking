<?php

namespace joinui\working;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onJoin(PlayerJoinEvent $ev){
    $player = $ev->getPlayer();
    
    $this->openTest($player);
  }
  
  public function openTest($player){
    $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){
        if($data == null){
          return true;
      }
      switch($data){
        case 0:
          $sender->sendMessage("Yea");
          break;
      }
    });

    $form->setTitle("Edit");
    $form->setContent("Edit");
    $form->addButton("Cancel", 0, "textures/ui/op");
    $form->sendToPlayer($player);
    return $form;
  }
}
