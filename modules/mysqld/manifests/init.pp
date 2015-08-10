class mysqld {
	package{ "mysql-server": ensure => installed;}
        package{ "libapache2-mod-auth-mysql": ensure => installed;}
        package{ "php5-mysql": ensure => installed;}

	service{ "mysql-server":
                  enable  => true,
                  ensure  => running,
                  require => Package["mysql-server"],
        }
        service{ "libapache2-mod-auth-mysql":
                  enable  => true,
                  ensure  => running,
                  require => Package["libapache2-mod-auth-mysql"],
        }
        service{ "php5-mysql":
                  enable  => true,
                  ensure  => running,
                  require => Package["php5-mysql"],
        }
 
}
