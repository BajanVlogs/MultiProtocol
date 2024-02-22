# MultiProtocol Plugin

The MultiProtocol Plugin allows you to manage and modify incoming network protocols for players connecting to your PocketMine-MP server.

## Features

- Dynamically adjust incoming network protocols based on configurable settings.
- Ensure compatibility with multiple Minecraft: Bedrock Edition client versions.
- Lightweight and easy to configure.

## Installation

1. Download the plugin from [here](#).
2. Place the downloaded `MultiProtocol` folder into the `plugins` folder of your PocketMine-MP server.
3. Start or reload your server.

## Configuration

The plugin comes with a simple configuration file to manage accepted protocols. By default, it accepts the current protocol version.

To customize the accepted protocols:

1. Navigate to the `plugins/MultiProtocol` folder.
2. Open `accept.yml` in a text editor.
3. Add or remove protocol versions from the list as needed.
4. Save the file.

Example `accept.yml`:
```yaml
accept-protocol:
  - 419
  - 428

Usage
Once the plugin is installed and configured, it will automatically handle incoming connection protocols based on your configuration.

Commands
This plugin does not introduce any new commands.

Permissions
This plugin does not require any special permissions.

Contributing
Contributions are welcome! If you find a bug or have a feature request, feel free to open an issue or submit a pull request.

License
This plugin is open-source and available under the MIT License.
