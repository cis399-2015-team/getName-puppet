class phpd {
	package{ "php5": ensure => installed;}
        package{ "libapache2-mod-php5": ensure => installed;}
        package{ "php5-mycrypt": ensure => installed;}

	service{ "php5":
                  enable  => true,
                  ensure  => running,
                  require => Package["php5"],
        }
        service{ "libapache2-mod-php5":
                  enable  => true,
                  ensure  => running,
                  require => Package["libapache2-mod-php5"],
        }
        service{ "php5-mycrypt":
                  enable  => true,
                  ensure  => running,
                  require => Package["php5-mycrypt"],
        }
 
}
