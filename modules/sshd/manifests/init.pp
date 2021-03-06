class sshd {
	package {
		"openssh-server": ensure => installed;
	}
	ssh_authorized_key { "alindsey-Aeroponix":
	user	=> "ubuntu",
	key	=> "AAAAB3NzaC1yc2EAAAADAQABAAABAQDFP/RJsWcFJ4X04ZCLBxph2A1veyM8XDaBq6rfEG600U8cMesidfGFgvTVAgvnPDA0hlFWuqTl4ar5qKRsXwKyZXIGbdruhFlJYO0rhlqdgkQctEq80hbM2lexI+B57hbfwoAyaZYbjcEFhW6hIhjFhxWawQhEowMHplAGGqHYxk4B/HaI6VYheHkgq12bSIAnemglCwj5a1VDtX5DrJ5tdOUEgOGBE+jzbVg73jrg7e6lQejI5Zj9XyhfxAVSeDplOwByyrk2rCQQMthYmGV7pRgN1nkyI6zEaUtuXlz4egTfv/qa9Ol7NnWTzdmNljs5eRfJabue8tNPhMn65VQd",
	}
	ssh_authorized_key { "getName-cebert":
	user	=> "ubuntu",
	key	=> "AAAAB3NzaC1yc2EAAAADAQABAAABAQCA4i9KNwcY/8uEBCg82pNzRrQOND1k31l2u+9CIkYS+/1+g9BuDsSuKMwAtPnkwRN8g7BvjCVNblxLm55KKkOBPkzOsn1RaMSS7eBFGsqtRp2OhiTWcioT2C9M/9geUg3KZ2OMWqpypB+ojEUQKTReMMRWj5vvyGenGe9JBP4gl0nDGMdAIw/aQ8QdwDoQRXPm4KnqGNDapC1mh9xhh3TO/8Ke4+0JIKMLVUZxLrSneFb6sRHp1sLVJhX1x3E9CwIMdV9h99YQvEMufSCHQcueRZvTWPV0fqxq6XEF5DdoDwylEh9os8dTNoBQQkXKkLBoLutj+OAAjvkOsjPlGQ+j",
	}
	ssh_authorized_key { "carraway-key-pair":
	user	=> "ubuntu",
	key	=> "AAAAB3NzaC1yc2EAAAADAQABAAABAQCWKorntXMPYi8fgwNEjKxmOI4JnWnqaQoHQMWrZgsASdjJ1d4KAdWLoFQdo4WPT5mTTfEPYYubHUhFDOFpO1Vcx3mk5dub9bV5TfdUoovmO1sbNmWpwY28IH/Xy/gyeIls7dmVjJD6AkzPW9jT4vr6tfNaWjTOeeyG8ykKetuRFuiOYK9RIch5ovSwT60J1TY+alXZML6S7khGPYZXoMqNKMrLWtLhvG+/mQHS82AufTokb5MDydmCLcufs6F4NyCcUMSmfKrjjuU6pFqkzjwJ95gIzFAY7o4ifdAw0xb8e1rUaaEmaaZcvLhb3gq2jF419KiETKHXZbxyHRO6QiJH",
	}
	file { "/etc/ssh/sshd_config":
		source	=> ["puppet:///modules/sshd/$hostname/sshd_config",
			    "puppet:///modules/sshd/sshd_config",],
		mode	=> 444,
		owner	=> root,
		group	=> root,
		require => Package["openssh-server"],
	}
	service { "ssh":
		enable		=> true,
		ensure		=> running,
		require		=> [ Package["openssh-server"],
				     File["/etc/ssh/sshd_config"],],
		subscribe	=> File["/etc/ssh/sshd_config"],
	}
}

