#!/bin/bash

echo "Please provide your platform."
echo "  - linux"
echo "  - win"
echo "  - mac"
read os

case $os in
    linux )
        driver=chromedriver-linux
    ;;
    win )
        driver=chromedriver-win.exe
    ;;
    mac )
        driver=chromedriver-mac
    ;;
    * )
        echo Platform not recognized, try again!
        exit 1
    ;;
esac

browser=chrome
selenium=selenium-server-standalone-3.141.59.jar

java -Dwebdriver.${browser}.driver=${driver} -jar ${selenium} -port 4444
