<?php

return array(

	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'runsimple',
			'username'  => $_ENV['DATABASE_USER'],
			'password'  => $_ENV['DATABASE_PASSWORD'],
		),

	),

);