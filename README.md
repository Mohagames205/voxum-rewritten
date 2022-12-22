# Voxum client (indev)

This project is **not done** and doesn't work yet! Wait until further notice!

## What is Voxum?
Voxum is a proximity voice chatting application for Minecraft Bedrock Edition. This plugin allows you to enhance your gameplay!

## Dependencies
Voxum has been built on some awesome existing software:
* Laravel framework
    * **[Laravel Breeze](https://github.com/laravel/breeze)** for authentication
    * **[Laravel Echo](https://github.com/laravel/echo)** for integration with **Laravel Websockets** 
* **[Laravel WebSockets](https://github.com/beyondcode/laravel-websockets)** for the communication between the backend and the frontend
* **[PeerJS](https://github.com/peers/peerjs)** simple wrapper for WebRTC
* **[Golileo](https://github.com/GalactixPE/Golileo) for saving player skins in a centralized system

## How will/does it work?

Voxum consists of a few parts:

| Name | Description | Link |
|-------------|------------| ----- |
| Voxum Client | The webclient that is used to voice chat with others. It's a bit like Discord where you join a channel and can talk to other people in your proximity. | https://github.com/Mohagames205/voxum-rewritten |
| Voxum plugin | The plugin allows communication between the Minecraft server and the Voxum Client. It sends all necessary data to the client | https://github.com/Mohagames205/voxum |
| Voxum Toolkit | This is a toolkit maintainers can use to easily test all features of Voxum | https://github.com/Mohagames205/voxum-toolkit |

![image](https://user-images.githubusercontent.com/40402787/208951578-66c9e1b7-68d6-45c9-9637-b68ce8b197a1.png)

## Development
> ⚠️ WARNING: the webapp is NOT YET FUNCTIONAL!

You can try this **non-functional** demo by cloning this repository:
```
git clone https://github.com/Mohagames205/voxum-rewritten.git 
```

Installing all the composer dependencies using

```
composer install
```

Serving the application using the included development webserver

```
php artisan serve
```

## Roadmap
There are a few things I want to achieve (sorted from high to low priority): 
- [ ] Making proximity voice chatting functional
- [ ] A verification system for Minecraft players so they don't have to authenticate with Xbox-live
- [ ] Create an administration panel to manage the Voxum instance
- [ ] Create a toolkit to make testing Voxum easier
- [ ] In-game indicator for if the player is using Voxum
- [ ] Making clear documentation

## Screenshots

> The Voxum instance has not been set-up yet
![image](https://user-images.githubusercontent.com/40402787/208948138-7f3a92b8-5c40-4715-a9c6-612451fe4999.png)

> Set-up page for a new instance
![image](https://user-images.githubusercontent.com/40402787/208948047-f7fc4579-aaa7-4cd6-b6f1-e13917d31fea.png)
![image](https://user-images.githubusercontent.com/40402787/208948096-fda63712-8db5-4c16-8052-6b597ef4cc38.png)


