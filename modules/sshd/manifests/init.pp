class sshd {
	package {
		"openssh-server": ensure => installed;
	}
	file { "/etc/ssh/sshd_config":
		source	=> ["puppet:///modules/sshd/$hostname/sshd_config",
			    "puppet:///modules/sshd/sshd_config",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
		require => Package["openssh-server"],
	}
	
	service { "sshd":
		enable		=> true,
		ensure		=> running,
		require		=> [ Package["openssh-server"],
				     File["/etc/ssh/sshd_config"],],
		subscribe	=> File["/etc/ssh/sshd_config"],
	}
}
