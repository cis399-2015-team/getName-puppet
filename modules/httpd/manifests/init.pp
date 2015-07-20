class httpd{

	package{ "postfix": ensure => installed;}
	package{ "apache2": ensure => installed;}
	service{ "postfix":
                  enable  => true,
                  ensure  => running,
                  require => Package["postfix"],
        }   	

	service{ "apache2":
                  enable  => true,
                  ensure  => running,
                  require => Package["apache2"],
        } 
}







