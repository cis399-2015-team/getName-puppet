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
	service{ "postfix":
                  enable  => true,
                  ensure  => running,
                  require => Package["postfix"],
        }   	
	service{ "apache2":
                  enable  => true,
                  ensure  => running,
                  require => [ Package["apache2"],
			       File["/var/www/html/index.html"],],
		  subscribe => File["/var/www/html/index.html"],
        } 
}







