# TravisIntegrationTest
[![Build Status](https://travis-ci.org/SanderKnape/TravisIntegrationTest.svg?branch=master)](https://travis-ci.org/SanderKnape/TravisIntegrationTest)

A simple application including integration tests linked to Travis CI.

## Testing the application locally
1. Use [Vagrant](https://www.vagrantup.com) to bring up the VM with `vagrant up`
2. Prepare the MySQL database by running `/vagrant/tests/setup_mysql.php`
3. Run the integration tests with `/vagrant/tests/integration_test.php`

You should now see the message "All numbers OK".
