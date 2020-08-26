<?php

namespace MultiProtocol;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\network\mcpe\protocol\ProtocolInfo;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LoginPacket;


class Main extends PluginBase implements Listener {
	
   public $acceptProtocol = [];

   public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("MultiProtocol Plugin Enable!");
	   	$this->getLogger()->info("Created by BajanVlogs, maintained for API 3 by princepines");
	   	$this->getLogger()->info("This plugin can be redistrubuted, modified, etc. based on the License.");
		
		@mkdir($this->getDataFolder());
		$this->acceptProtocol = (new Config($this->getDataFolder()."protocol.yml", Config::YAML))->get("accept-protocol");
		
		if ($this->acceptProtocol === false || empty($this->acceptProtocol)) {
			$this->acceptProtocol[] = ProtocolInfo::CURRENT_PROTOCOL;
			$config = new Config($this->getDataFolder()."protocol.yml", Config::YAML);
			$config->set("accept-protocol", [ProtocolInfo::CURRENT_PROTOCOL]);
			$config->save();
		}
    }
    
    public function onDataPacketRecieve (DataPacketReceiveEvent $ev) {
    	$pk = $ev->getPacket();
    	if ($pk instanceof LoginPacket) {
    		if (in_array($pk->protocol, $this->acceptProtocol)) {
    			$pk->protocol = ProtocolInfo::CURRENT_PROTOCOL;
    		}
    	}
    }
}
