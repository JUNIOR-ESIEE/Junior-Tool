# Junior-Tool

Plateforme d'outils actuels et futurs de Junior ESIEE

Contient le site web 2015-2016 de la Junior ESIEE, créé par [Mininao][mininao] (voir [commercial-website][git]).

### Installation

Ce projet nécessite d'avoir [Node.js][nodejs] et [Bower][bower] installés sur votre machine.

Installation des dépendances
```sh
$ composer install
```
Installation des librairies
```sh
$ npm install bower
$ bower install
```
Compilation du SCSS et cache
```sh
$ php app/console assetic:dump
$ php app/console cache:clear --env=prod
```

   [git]: <https://github.com/JUNIOR-ESIEE/commercial-website>
   [mininao]: <https://github.com/mininao>
   [nodejs]: <https://nodejs.org>
   [bower]: <http://bower.io>