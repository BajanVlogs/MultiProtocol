<?php

namespace MultiProtocol;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\handler\LoginPacketHandler;

class Main extends PluginBase implements Listener {
    
    /** @var array */
    private $acceptProtocol;

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("MultiProtocol Plugin Enabled!");

        @mkdir($this->getDataFolder());
        $config = new Config($this->getDataFolder() . "accept.yml", Config::YAML);
        $this->acceptProtocol = $config->get("accept-protocol", []);
        if (empty($this->acceptProtocol)) {
            $this->acceptProtocol[] = $this->getServer()->getVersion()->getProtocol();
            $config->set("accept-protocol", $this->acceptProtocol);
            $config->save();
        }
    }

    public function onDataPacketReceive(DataPacketReceiveEvent $event): void {
        $packet = $event->getPacket();
        if ($packet instanceof LoginPacket) {
            $handler = new LoginPacketHandler($packet);
            if (!in_array($handler->protocol, $this->acceptProtocol)) {
                $handler->protocol = $this->getServer()->getVersion()->getProtocol();
                $event->setPacket($handler->getPacket());
            }
        }
    }
}
