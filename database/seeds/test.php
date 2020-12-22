DB::table('users')->insert([
            [
            'first_name' => 'admin',
            'sur_name' => 'admin',
            'email' => 'admin@mowt.ug',
            'password' => Hash::make(123admin),
            'role' => 'admin',
            'department' => 'procurement',
            'phone_number' => '0758567709'
            ], 
        	[
        	'first_name' => 'kaye',
        	'sur_name' => 'mubiru',
        	'email' => 'driver@mowt.ug',
        	'password' => Hash::make(123driver),
        	'role' => 'driver',
        	'department' => 'procurement',
        	'phone_number' => '0758567702'
        	],
        	[
        	'first_name' => 'isaac',
        	'sur_name' => 'kavuma',
        	'email' => 'transportofficerone@mowt.ug',
        	'password' => Hash::make(123transportofficerone),
        	'role' => 'to',
        	'department' => 'finance',
        	'phone_number' => '0758567703'
        	],
        	[
        	'first_name' => 'pato',
        	'sur_name' => 'mugisha',
        	'email' => 'driverone@mowt.ug',
        	'password' => Hash::make(123driverone),
        	'role' => 'driver',
        	'department' => 'accounts',
        	'phone_number' => '0758567704'
        	],
        	[
        	'first_name' => 'jose',
        	'sur_name' => 'mabirizi',
        	'email' => 'transportofficer@mowt.ug',
        	'password' => Hash::make(123transportofficer),
        	'role' => 'transportofficer',
        	'department' => 'accounts',
        	'phone_number' => '0758567705'
        	],
        ]);