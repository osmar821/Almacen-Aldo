<?php
define('CREDENCIALES', [    
    'username' => [        
        'rules' => 'required|max_length[50]',        
        'errors' => [            
            'required' => 'El campo usuario es requerido',            
            'max_length' => 'El campo usuario debe tener menos de 50 caracteres'        
            ]
    ],
    'password' => [        
        'rules' => 'required|max_length[50]',        
        'errors' => [            
            'required' => 'El campo contraseña es requerido',            
            'max_length' => 'El campo contraseña debe tener menos de 50 caracteres'        ]
    ]
]);
