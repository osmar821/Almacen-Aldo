<?php
define ("PRODUCTO",[
   'nombre'=> [
        'rules'=>'required|max_length[50]',
        'errors'=>[
            'required'=>'El campo nombre es requerido',
            'max_length'=>'El texto es muy largo'
        ]

        ],
    'existencias'=>[
        'rules'=>'required|numeric',
        'errors'=>[
            'required'=>'El campo existencias es requerido',
            'numeric'=>'El campo existencias debe de ser numerico',

        ]
     ],
     'marca'=>[
        'rules'=>'required|numeric',
        'errors'=>[
            'required'=>'El campo marca es requerido',
            'numeric'=>'El campo marca debe de ser numerico',

        ]
    ],
    'categoria'=>[
        'rules'=>'required|numeric',
        'errors'=>[
            'required'=>'El campo categoria es requerido',
            'numeric'=>'El campo categoria debe de ser numerico',

        ]
    ]

]);