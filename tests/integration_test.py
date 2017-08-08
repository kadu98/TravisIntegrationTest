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

def lambda_handler(event, context):
    data = {
        'output': 'Hello World',
        'timestamp': datetime.datetime.utcnow().isoformat()
    }

    method = event.get('httpMethod')
    pathParameters = event.get('pathParameters', {})
    location_id = pathParameters.get('location_id')


    if method == 'GET':
        #data, status = get_all_locations()
        data, status = get_location(3);
        #data, status = get_location_by_pet("cat")
        #data, status = test()
        return construct_response(status, data)
    elif method == ''

    # elif method == 'POST':
    #     request_body = event.get('body')
    #     location_details = json.loads(location_details)
    #     data = create_location(location_details)
    #     if no errors:
    #         status = 200
    #     else:
    #         status = ???
    #     return construct_response(status, data)


def construct_response(status, data):

    return {'statusCode': status,
            'body': json.dumps(data),
            'headers': {'Content-Type': 'application/json'}}

def get_location(location_id):
    connection = pymysql.connect(host=mysql_host,
                                 user=mysql_username,
                                 password=mysql_password,
                                 db=mysql_database,
                                 cursorclass=pymysql.cursors.DictCursor)

    try:
        with connection.cursor() as cursor:
            # Read a single record
            sql = "SELECT * FROM `location` WHERE `location_id` = %s"
            cursor.execute(sql, (location_id))
            result = cursor.fetchone()
            print(result)
            return result, 200
    except:
        return {"result" :"This did not work"}, 404
    finally:
        connection.close()
















