node ip-10-0-1-226 {
	cron { "puppet update":
		command => "cd /etc/puppet && git pull -q origin master",
		user	=> "root",
		minute	=> "*/30",
	}
	include sshd
}
node ip-10-0-1-138 {
	include sshd
}
node ip-10-0-1-46 {
	include sshd
}
