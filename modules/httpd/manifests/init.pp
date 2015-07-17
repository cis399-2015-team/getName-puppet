class httpd{

	package{ "sendmail": ensure => installed;}
	package{ "appache2": ensure => installed;}
	service{ "sendmail":
                  enable  => true,
                  ensure  => running,
                  require => Package["sendmail"],
        }   	

	service{ "sendmail":
                  enable  => true,
                  ensure  => running,
                  require => Package["sendmail"],
        } 
}







