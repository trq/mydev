#!/usr/bin/env bash

apt-get update
apt-get upgrade -qq

debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"

apt-get install -qq tmux tree vim-nox mysql-server-5.6 libsqlite3-dev ruby2.1-dev php5-mysql

sed -i "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf

mysql=`which mysql`
sql="GRANT ALL ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION; FLUSH PRIVILEGES;"
$mysql -uroot -p$1 -e "$sql"
/etc/init.d/mysql restart

gem install capifony
gem install mailcatcher
gem install foundation
gem install compass

npm install -g bower
npm install -g grunt-cli
npm install -g gulp

cat /dev/null > /etc/motd
cat /dev/null > /etc/issue.net
