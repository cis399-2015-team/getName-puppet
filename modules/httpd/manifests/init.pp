class httpd{

	package{ "postfix": ensure => installed;}
	package{ "apache2": ensure => installed;}
	file { "/var/www/html/index.html":
		source	=> ["puppet:///modules/httpd/$hostname/index.html",
			    "puppet:///modules/httpd/index.html",],
		mode	=> 444,
		owner	=> root,
		group 	=> root,
		require => Package["apache2"],
	}
	file { "/etc/apache2/apache2.conf":
		source	=> ["puppet:///modules/httpd/$hostname/apache2.conf",
			    "puppet:///modules/httpd/apache2.conf",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
		require	=> Package["apache2"],
	}
	service{ "postfix":
                  enable  => true,
                  ensure  => running,
                  require => Package["postfix"],
        }   	
	service{ "apache2":
                  enable  => true,
                  ensure  => running,
                  require => [ Package["apache2"],
			       File["/var/www/html/index.html"],
			       File["/etc/apache2/apache2.conf"],],
		  subscribe => [ File["/var/www/html/index.html"],
				 File["/etc/apache2/apache2.conf"],],
        } 
}







