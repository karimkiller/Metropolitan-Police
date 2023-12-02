## DiscordPHP [![Build Status](https://travis-ci.org/teamreflex/DiscordPHP.svg?branch=master)](https://travis-ci.org/teamreflex/DiscordPHP)

An API to interact with the popular text and voice service Discord.

### Special Thanks

- [Chris Boden](https://github.com/cboden) for the WebSocket client that is based off [RatchetPHP/Pawl](https://github.com/ratchetphp/Pawl)

### Todo

Todo list is available in the [`TODO.md`](TODO.md) file.

### Basic WebSocket client

```php
<?php

include 'vendor/autoload.php';

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;

$discord = new Discord(':email', ':password');
$websocket = new WebSocket($discord);

$websocket->on(Event::MESSAGE_CREATE, function ($message, $discord, $new) {
	echo "New message from {$message->author->username}: {$message->content}".PHP_EOL;
});

$websocket->run();
```

### Documentation

Documentation can be found [here](https://teamreflex.github.io/DiscordPHP/), however it is very basic at the moment. If you need more help please ask as it says below.

### Help

If you need any help feel free to join the [DiscordAPI Server](https://discord.gg/0SBTUU1wZTY56U7l) and ask in the `#php_discordphp` channel. Tag `@Uniquoooo` if you need any help specific to the API.

### Other Libraries

Here is a list of the other libraries that are being worked on and their Discord usernames!

#### .NET

- [Discord.Net](https://github.com/RogueException/Discord.Net) - @Voltana
- [DiscordSharp](https://github.com/Luigifan/DiscordSharp) - @Axiom

#### Go

- [go-discord](https://github.com/gdraynz/go-discord) - @steelou
- [discordgo](https://github.com/bwmarrin/discordgo) - @Skippy (siacn)

#### Java

- [Discord4J](https://github.com/nerd/Discord4J) - Dead
- [JDiscord](https://github.com/NotGGhost/jDiscord) - @Ghost

#### Node.js

- [discord.io](https://github.com/izy521/discord.io) - @izy521
- [discord.js](https://github.com/discord-js/discord.js) - @hydrabolt
- [discordie](https://github.com/qeled/discordie) - @#q

#### PHP

- [discord-hypertext](https://github.com/Cleanse/discord-php) - @Cleanse

#### Python

- [discord.py](https://github.com/Rapptz/discord.py) - @Danny

#### Ruby

- [discordrb](https://github.com/meew0/discordrb) - @meew0

#### Scala

- [discord-akka](https://github.com/eaceaser/discord-akka) - @ceezy

### Contributing

We are open to anyone contributing as long as you follow our code standards. We use PSR-4 for our autoloading standard and PSR-2 for our code formatting standard. Please, if you send in pull requests follow these standards.