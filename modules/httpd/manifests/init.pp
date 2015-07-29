class httpd{
	file { "/var/www/html/index.html":
		source	=> ["puppet:///modules/httpd/$hostname/index.html",
			    "puppet:///modules/httpd/index.html",],
		mode	=> 444,
		owner	=> root,
		group 	=> root,
		require => Package["apache2"],
	}
}
