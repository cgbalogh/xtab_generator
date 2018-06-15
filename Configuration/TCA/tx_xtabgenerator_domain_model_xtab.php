<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'enablecolumns' => [
        ],
        'searchFields' => 'title,description,aggregate_object,detail_object,template,rowheader,colheader',
        'iconfile' => 'EXT:xtab_generator/Resources/Public/Icons/tx_xtabgenerator_domain_model_xtab.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'title, description, aggregate_object, detail_object, template, rowheader, colheader',
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, aggregate_object, detail_object, template, rowheader, colheader'],
    ],
    'columns' => [

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'aggregate_object' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.aggregate_object',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'detail_object' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.detail_object',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'template' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.template',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'rowheader' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.rowheader',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'colheader' => [
            'exclude' => true,
            'label' => 'LLL:EXT:xtab_generator/Resources/Private/Language/locallang_db.xlf:tx_xtabgenerator_domain_model_xtab.colheader',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
    
    ],
];
