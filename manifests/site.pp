node ip-10-0-1-161 {
	cron { "puppet update":
		command	=> "cd /etc/puppet && git pull -q origin master",
		user	=> root,
		minute	=> "*/30",
	}
}
