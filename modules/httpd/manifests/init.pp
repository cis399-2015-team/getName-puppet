class httpd{
	file { "/var/www/html/index.html":
		source	=> ["puppet:///modules/httpd/$hostname/index.php",
			    "puppet:///modules/httpd/index.php",],
		mode	=> 444,
		owner	=> root,
		group 	=> root,
		require => Package["php5"],
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
}
