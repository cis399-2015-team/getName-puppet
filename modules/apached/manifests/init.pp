class apached {
	package{ "apache2": ensure => installed;}
	file { "/etc/apache2/apache2.conf":
		source	=> ["puppet:///modules/apached/files/$hostname/apache2.conf",
			    "puppet:///modules/apached/files/apache2.conf",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
		require	=> Package["apache2"],
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