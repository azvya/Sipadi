#!/usr/bin/env sh

echo "______  _  _    _              "
echo "| ___ \(_)| |  (_)             "
echo "| |_/ / _ | |   _  _   _  _ __ "
echo "|  __/ | || |  | || | | || '__|"
echo "| |    | || |  | || |_| || |   "
echo "\_|    |_||_|  | | \__,_||_|   "
echo "              _/ |             "
echo "             |__/              "
echo "-------------------------------"
echo "Pilih Jurusan Web is Running!"

if [ ! -z "$UID" ]; then
  usermod -u $UID codeigniter
fi

if [ ! -d /.composer ]; then
  mkdir /.composer
fi

chmod -R ugo+rw /.composer

if [ $# -gt 0 ]; then
  exec gosu $UID "$@"
else
  exec php-fpm
fi
