# MultiProtocol Plugin

A PocketMine-MP plugin for supporting multiple versions of Minecraft Bedrock Edition.

## Description

This PocketMine-MP plugin allows servers to support multiple versions of Minecraft Bedrock Edition by filtering out login attempts from unsupported client versions.

## Usage

1. Place the `MultiProtocol` folder inside the `plugins` folder of your PocketMine-MP server.
2. Start or restart your PocketMine-MP server.
3. The plugin will automatically filter out login attempts from unsupported client versions according to the specified accepted versions in the `accept.yml` file.

## Configuration

The `accept.yml` file located in the `plugins/MultiProtocol` folder contains the list of accepted Minecraft Bedrock Edition versions.

Example `accept.yml` content:
```yaml
accept-versions:
  - "1.19.0"
  - "1.20.0"

