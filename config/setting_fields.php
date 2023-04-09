<?php

return [
    'app' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'menu-icon tf-icons bx bx-cog',

        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_name', // unique name for field
                'label' => 'Name', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => config('app.name') // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_description', // unique name for field
                'label' => 'Description', // you know what label it is
                'rules' => 'nullable|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => 'description' // default value if you want
            ]
        ]
    ],

    'media' => [

        'title' => 'Socail Media',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'facebook',
                'label' => 'Facebook',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'twitter',
                'label' => 'Twitter',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'instagram',
                'label' => 'Instagram',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'whatsapp',
                'label' => 'Whatsapp',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'youtube',
                'label' => 'Youtube',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => ''

            ],
        ]
    ],

    'contact' => [

        'title' => 'Contact Account',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'email',
                'label' => 'Email',
                'rules' => 'nullable|email',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'phone',
                'label' => 'Phone',
                'rules' => 'nullable|integer',
                'class' => '',
                'value' => ''

            ]
        ]
    ],

    'logo' => [

        'title' => 'Logo',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'file',
                'data' => 'file',
                'name' => 'logo',
                'label' => 'Logo',
                'rules' => 'nullable|image',
                'class' => '',
                'value' => ''

            ],
            [
                'type' => 'file',
                'data' => 'file',
                'name' => 'icon',
                'label' => 'Icon',
                'rules' => 'nullable|image',
                'class' => '',
                'value' => ''

            ]
        ]
    ],

    'about' => [

        'title' => 'About',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-id-card',

        'elements' => [
            [
                'type' => 'textarea',
                'data' => 'string',
                'name' => 'about',
                'label' => 'About',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => '',
                'parent_class' => 'col-12'
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'name' => 'about_status',
                'label' => 'Status',
                'rules' => 'nullable|integer|in:0,1',
                'class' => '',
                'value' => '',
                'parent_class' => 'col-12',
                'options' => [
                    0 => 'اخفاء',
                    1 => 'اظهار',
                ]

            ]
        ]
    ],

    'paypal' => [

        'title' => 'Paypal',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-id-card',

        'elements' => [
            [
                'type' => 'select',
                'data' => 'string',
                'name' => 'paypal_live_mode',
                'label' => 'Live mode?',
                'rules' => 'nullable|integer|in:0,1',
                'class' => '',
                'value' => '',
                'parent_class' => 'col-12',
                'options' => [
                    0 => 'لا',
                    1 => 'نعم',
                ]
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'paypal_client_id',
                'label' => 'Paypal Client ID',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => '',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'paypal_client_secret',
                'label' => 'Paypal Client Secret',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => '',
            ],
        ]
    ],

    'pagination' => [

        'title' => 'Pagination',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'pagination',
                'label' => 'Pagination',
                'rules' => 'nullable|integer',
                'class' => '',
                'value' => ''

            ]
        ]
    ],

    'footer' => [

        'title' => 'Footer',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-user-pin',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'footer',
                'label' => 'Footer',
                'rules' => 'nullable|string',
                'class' => '',
                'value' => 'footer'

            ]
        ]
    ],

    'platform' => [

        'title' => 'percentage',
        'desc' => '',
        'icon' => 'menu-icon tf-icons bx bx-money',

        'elements' => [
            [
                'type' => 'text',
                'data' => 'number',
                'name' => 'percentage',
                'label' => 'percentage',
                'rules' => 'nullable|integer|min:0',
                'parent_class' => 'col-12',
                'class' => '',
                'value' => 0,
            ],
        ]
    ],
];