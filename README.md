# My PHP Dev Box (Vagrant) 

## Vagrant Box

This vagrant configuration pulls in a custom vagrant box already made up of:

* Debian 7.6 - amd64
* VirtualBox - Guest Additions 4.3.14
* Git 1.9.1 (backports)
* Ruby 2.1.2p95 (bearstech)
* Gem 2.2.2 (bearstech)
* Node 0.10.26 (bearstech)
* npm 1.4.21
* pip 1.1
* Nginx 1.6.0 (dotdeb)
* PHP 5.5.14 (dotdeb)
    * php5-cli
    * php5-fpm
    * php5-intl
    * php5-gd
    * php5-xsl
    * php5-curl
    * php5-mcrypt
    * php5-xdebug

* Composer
* Mysql 5.6.19
* Capistrano v2.15.5
* Mailcatcher 0.5.12
* Foundation v1.0.4
* Compass 0.12.7
* Bower 1.3.8
* Grunt v0.1.13
* Gulp '3.8.6

and a bunch of other small utilities such as tmux, vim and tree.

From this base, you can add extra provisioning to make it into whatever you want.

# Configuration

Copy mydev.yml.dist to mydev.yml and adjust accordingly.

# Further Provisioning

The `provisioning` section allows you to add further provisioning by executing bash scripts.
