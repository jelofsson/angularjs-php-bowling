# 10 Pin Bowling

## Installation

1. Download and install [NodeJS](http://nodejs.org/download/)

If you're using the homebrew package manager, you can install node with one command: `brew install node`

2. Install required packages.
in the terminal, cd to project folder and run command: `npm install`
    
3. Compile client version
in the terminal, cd to project folder and run command: `gulp`

## Usage - server

To run in the terminal, cd to project `/server` folder and run command:

    php -S 127.0.0.1:8888
    
## Usage - client

First make sure that you have compiled the client files. Then cd to project and open `/client/index.html`
    
## Unit Testing

Install [phpunit](https://phpunit.de/getting-started.html) globally on your system.

    phpunit --bootstrap server/test.php server/classes/test/bowlingTest.php 

## Author

Jimmi Elofsson, contact@jimmi.eu