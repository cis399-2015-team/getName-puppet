class postfixd {
	package{ "postfix": ensure => installed;}
	file { "/etc/postfix/main.cf":
		source	=> ["puppet:///modules/postfixd/$hostname/main.cf",],
		mode 	=> 444,
		owner	=> root,
		group	=> root,
		require => Package["postfix"],
	}
	service{ "postfix":
                  enable  => true,
                  ensure  => running,
                  require => Package["postfix"],
        }  
}