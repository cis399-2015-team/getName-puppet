class httpd{

	package{ "sendmail": ensure => installed;}
	package{ "apache2": ensure => installed;}
	service{ "sendmail":
                  enable  => true,
                  ensure  => running,
                  require => Package["sendmail"],
        }   	

	service{ "apache2":
                  enable  => true,
                  ensure  => running,
                  require => Package["apache2"],
        } 
}







