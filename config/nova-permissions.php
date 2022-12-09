<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\Models\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Other',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',

        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [
        // heaters
        'view heaters' => [
            'display_name' => 'View heaters',
            'description'  => 'Can view heaters',
            'group'        => 'Heater',
        ],
        'list heaters' => [
            'display_name' => 'List heaters',
            'description'  => 'Can view heaters',
            'group'        => 'Heater',
        ],
        'create heaters' => [
            'display_name' => 'Create heaters',
            'description'  => 'Can create heaters',
            'group'        => 'Heater',
        ],
        'edit heaters' => [
            'display_name' => 'Edit heaters',
            'description'  => 'Can edit heaters',
            'group'        => 'Heater',
        ],
        'delete heaters' => [
            'display_name' => 'Delete heaters',
            'description'  => 'Can delete heaters',
            'group'        => 'Heater',
        ],

        // parts
        'view parts' => [
            'display_name' => 'View parts',
            'description'  => 'Can view parts',
            'group'        => 'Part',
        ],
        'list parts' => [
            'display_name' => 'List parts',
            'description'  => 'Can view parts',
            'group'        => 'Part',
        ],
        'create parts' => [
            'display_name' => 'Create parts',
            'description'  => 'Can create parts',
            'group'        => 'Part',
        ],
        'edit parts' => [
            'display_name' => 'Edit parts',
            'description'  => 'Can edit parts',
            'group'        => 'Part',
        ],
        'delete parts' => [
            'display_name' => 'Delete parts',
            'description'  => 'Can delete parts',
            'group'        => 'Part',
        ],

        // heater download files
        'temper_range_l1' => [
            'display_name' => 'temper_range_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'freeze_protection_rating_outdoor_temp_l1' => [
            'display_name' => 'freeze_protection_rating_outdoor_temp_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'recirculation_l1' => [
            'display_name' => 'recirculation_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'current_draw_l1' => [
            'display_name' => 'current_draw_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'gas_supply_pressure_range_l1' => [
            'display_name' => 'gas_supply_pressure_range_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'min_gas_line_size_l1' => [
            'display_name' => 'min_gas_line_size_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'compatible_remote_controller_part_num_l1' => [
            'display_name' => 'compatible_remote_controller_part_num_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'isolator_valve_part_num_l1' => [
            'display_name' => 'isolator_valve_part_num_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'freeze_protection_kit_accessory_l1' => [
            'display_name' => 'freeze_protection_kit_accessory_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'outdoor_vent_cap_part_num_l1' => [
            'display_name' => 'outdoor_vent_cap_part_num_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'pipe_cover_part_num_l1' => [
            'display_name' => 'pipe_cover_part_num_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'recess_box_part_num_l1' => [
            'display_name' => 'recess_box_part_num_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'high_elevation_adjustment_l1' => [
            'display_name' => 'high_elevation_adjustment_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'system_controller_part_num_l1' => [
            'display_name' => 'system_controller_part_num_l1',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ],
        'quickconnect_l2' => [
            'display_name' => 'quickconnect_l2',
            'description'  => 'Can download file',
            'group'        => 'Heater Download File',
        ]
    ]

];
