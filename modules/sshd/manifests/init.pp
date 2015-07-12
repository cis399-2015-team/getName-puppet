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
	file { "/home/ubuntu/.ssh/authorized_keys":
		mode    => 600,
		owner   => "root",
		group   => "root",
		source  => ["puppet:///modules/sshd/$hostname/authorized_keys",
			    "puppet:///modules/sshd/authorized_keys",],
	}
	service { "ssh":
		enable		=> true,
		ensure		=> running,
		require		=> [ Package["openssh-server"],
				     File["/etc/ssh/sshd_config"],
				     File["/home/ubuntu/.ssh/authorized_keys"],],
		subscribe	=> [ File["/etc/ssh/sshd_config"],
				     File["/home/ubuntu/.ssh/authorized_keys"],],
	}
}
