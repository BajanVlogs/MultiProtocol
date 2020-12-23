# MultiProtocol
MultiProtocol is a plugin where you can have people join on your server (PMMP API 3) with your latest
Minecraft Bedrock

Instructions:
1. Find the Protocol Version of Latest Minecraft Bedrock:
- Go to Settings>Profile and scroll down until you see the "Protocol Version",
remember the Protocol Version Number!

2. Put Protocol Number
- on your server go to plugins_data folder, then MultiProtocol folder and
find protocol.yml

Here on this file you can put Protocol Versions

it should look like this:

```
accept-protocol:
```

- There you need to add another row below accept-protocol and add protocol number like this:

```
accept-protocol:
- 407 <!-- This is a Protocol Number (1.16.0-1.16.10) -->
- 408 <!-- This is a Protocol Number (1.16.20) -->
```


Save the file and restart your server, then done!


NOTE : This plugin is modified and make more instruction-friendly and support latest PMMP API (3)

Another NOTE: This Plugin works only on MCBE only, and the accepted range protocol in MP is below to the latest release not on legacy release.
That means if your server is 1.16.20, it works only on 1.16.20 and 1.16.0 -  ".10

# If Confused the following protocol will work only on MP (As you can see 2 protocols only accepted, which is latest and the last previous release):
- 419 (1.16.100 - 1.16.101)
- 422 (1.16.200 - 1.16.201)


Original : https://github.com/BajanVlogs/MultiProtocol



2020 by princepines and BajanVlogs

discord: princepines#5041
