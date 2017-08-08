#!/usr/bin/env php

import os
import json
import datetime
import pymysql
import simplejson as json

mysql_host = os.environ.get('MYSQL_HOST', '127.0.0.1')
mysql_port = int(os.environ.get('MYSQL_PORT', 3306))
mysql_username = os.environ.get('MYSQL_USERNAME', 'root')
mysql_password = os.environ.get('MYSQL_PASSWORD', 'root')
mysql_database = os.environ.get('MYSQL_DATABASE', 'zapi-locations')

connection = pymysql.connect(host=mysql_host,
                                 user=mysql_username,
                                 password=mysql_password,
                                 db=mysql_database,
                                 cursorclass=pymysql.cursors.DictCursor) 
schema = open('schema.sql').read(1000)