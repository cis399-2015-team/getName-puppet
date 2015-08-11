node ip-10-0-1-226 {
	cron { "puppet update":
		command => "cd /etc/puppet && git pull -q origin master",
		user	=> "root",
		minute	=> "*/30",
	}
	cron {"Instance update":
	     command => "sudo apt-get update && sudo apt-get upgrade",
	     user    => "root",
             minute  => "*/1440",
        }              
	include sshd
	include httpd
	include postfixd
	include apached
	include phpd
	include mysqld
}
node ip-10-0-1-138 {
	include sshd
	include httpd
	include postfixd
	include apached
	include phpd
	include mysqld
}
node ip-10-0-1-46 {
	include sshd
	include httpd
	include postfixd
	include apached
	include phpd
	include mysqld
}
