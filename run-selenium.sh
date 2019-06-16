#!/bin/bash

selenium=selenium-server-standalone-3.141.59.jar
driver=chromedriver-linux
browser=chrome

java -Dwebdriver.${browser}.driver=${driver} -jar ${selenium} -port 4444