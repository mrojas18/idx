<?php

return [
	'api' => [
		'user'=>env("API_USER"), 
		'password'=>env("API_PASSWORD"),
		'url'=>env("API_URL", "https://api.invertironline.com"),
		'expires'=> env("API_EXPIRES", 1200)
	]
];
