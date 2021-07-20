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
   $this->getLogger()->info("§f[§aEnabled§f] JoinUI");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
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

    $form->setTitle($this->cfg->get("title"));
    $form->setContent($this->cfg-get->("content");
    $form->addButton($this->cfg->get("button"));
    $form->sendToPlayer($player);
    return $form;
  }
}
