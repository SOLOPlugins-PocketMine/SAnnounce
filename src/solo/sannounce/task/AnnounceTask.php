<?php

namespace solo\sannounce\task;

use pocketmine\scheduler\Task;
use solo\sannounce\SAnnounce;

class AnnounceTask extends Task{

  private $owner;

  public function __construct(SAnnounce $owner){
    $this->owner = $owner;
  }

  public function onRun(int $currentTick){
    $announce = $this->owner->getNextAnnounce();
    if($announce !== null){
      $prefix = $this->owner->getAnnouncePrefix();
      if($prefix !== "" && substr($prefix, -1) !== " "){
        $prefix .= " ";
      }
      $this->owner->getServer()->broadcastMessage($prefix . $announce);
    }
  }
}
