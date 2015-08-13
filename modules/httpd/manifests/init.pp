class httpd{
	file { "/var/www/html/index.php":
		source	=> ["puppet:///modules/httpd/$hostname/index.php",
			    	"puppet:///modules/httpd/index.php",],
		mode	=> 444,
		owner	=> root,
		group 	=> root,
	}
	file { "/var/www/html/deny.jpg":
		source	=> ["puppet:///modules/httpd/$hostname/deny.jpg",
				    "puppet:///modules/httpd/deny.jpg",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
	}
	file { "/var/www/login.php":
		source	=> ["puppet:///modules/httpd/$hostname/login.php",
			    	"puppet:///modules/httpd/login.php",],
		mode 	=> 444,
		owner	=> root,
		group	=> root,
	}
	file { "/var/www/html/start.php":
		source	=> ["puppet:///modules/httpd/$hostname/start.php",
					"puppet:///modules/httpd/start.php",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
	}
	file { "/var/www/html/stop.php":
		source	=> ["puppet:///modules/httpd/$hostname/stop.php",
					"puppet:///modules/httpd/stop.php",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
	}
	file { "/var/www/html/restart.php":
		source	=> ["puppet:///modules/httpd/$hostname/restart.php",
					"puppet:///modules/httpd/restart.php",],
		mode	=> 444,
		owner	=> root, 
		group	=> root,
	}
}
