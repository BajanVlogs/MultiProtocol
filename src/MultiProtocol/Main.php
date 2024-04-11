<?php

namespace MultiProtocol;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\handler\LoginPacketHandler;
use pocketmine\player\Player;
use pocketmine\Server;

class Main extends PluginBase implements Listener {
    
    /** @var array */
    private $acceptVersions;

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("MultiProtocol Plugin Enabled!");

        @mkdir($this->getDataFolder());
        $config = new Config($this->getDataFolder() . "accept.yml", Config::YAML);
        $this->acceptVersions = $config->get("accept-versions", []);
        if (empty($this->acceptVersions)) {
            $this->acceptVersions = [ // Earliest supported Bedrock version is 1.19
                "1.19.0",
                "1.20.0", // Add more versions as needed
            ];
            $config->set("accept-versions", $this->acceptVersions);
            $config->save();
        }
    }

    public function onDataPacketReceive(DataPacketReceiveEvent $event): void {
        $packet = $event->getPacket();
        if ($packet instanceof \pocketmine\network\mcpe\protocol\LoginPacket) {
            if (!isset($packet->clientData["GameVersion"])) {
                return; // Invalid packet, ignore it
            }

            $clientVersion = $packet->clientData["GameVersion"];
            if (!in_array($clientVersion, $this->acceptVersions)) {
                // Cancel the login attempt for unsupported versions
                $event->cancel();
                
                // Optionally, you can kick the player or send a message explaining why they can't join.
                $player = $event->getOrigin()->getPlayer();
                if (!$player == null) {
                    $player->kick("Your version of Minecraft Bedrock is not supported by this server.");
                }
            }
        }
    }
}
