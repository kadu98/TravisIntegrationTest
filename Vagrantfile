$script = <<SCRIPT
echo '[mysql56-community]
name=MySQL 5.6 Community Server
baseurl=http://repo.mysql.com/yum/mysql-5.6-community/el/7/$basearch/
enabled=1
gpgcheck=0' > /etc/yum.repos.d/mysql.repo

yum install -y https://centos7.iuscommunity.org/ius-release.rpm
yum install -y php70u-cli php70u-pdo php70u-mysqlnd mysql-community-server

systemctl start mysqld
systemctl enable mysqld
SCRIPT

Vagrant.configure("2") do |config|
  config.vm.box = "bento/centos-7.2"
  config.vm.provision "shell", inline: $script

  # at the time of writing there is a problem with replacing insecure keys, so disable this for now
  # see https://github.com/mitchellh/vagrant/pull/7611
  config.ssh.insert_key = false
end
