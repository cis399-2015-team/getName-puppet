class sshd {
	file { "/etc/ssh/sshd_config":
		source	=> ["puppet:///modules/sshd/sshd.config"],
		mode	=> 444,
		owner	=> root,
		group	=> root,
	}
	
	service { "sshd":
		require		=> File["/etc/ssh/sshd_config"],
		subscribe	=> File["/etc/ssh/sshd_config"],
	}
}
