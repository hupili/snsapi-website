#!/bin/bash
# auto update the website

DIR=`dirname $0`
FN=`basename $0`
cd $DIR
PWD=`pwd`

#echo $PWD

git pull

exit 0
