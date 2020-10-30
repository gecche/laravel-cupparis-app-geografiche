var ModelCupGeoNazione = {
    search: {
        modelName: 'cup_geo_nazione',
        //langContext : 'user',
        fields: [
            'nome_it',
            'codice_istat',
            'continente_id'
        ],
        fieldsConfig : {
            'continente_id' : {
                type : 'w-select',
            }
        }
    },
    // view : {
    //     modelName : 'cup_geo_nazione',
    //     //fields : ['name','email','password','password_confirmation','banned','mainrole','fotos','attachments'],
    //     actions : [],
    //     fieldsConfig : {
    //         mainrole : {
    //             type : 'w-belongsto',
    //             fields : ['name']
    //         }
    //     }
    // },
    list: {
        modelName: 'cup_geo_nazione',
        fields: [
            'codice_istat',
            'nome_it',
            'nome_en',
            'codice_catastale',
            'codice_iso_2',
            'continente',
            'flag',
            'attivo'
        ],
        fieldsConfig : {
            'continente' : {
                type : 'w-belongsto',
                labelFields: [
                    'nome_it',
                ],
            }
        },
        actions: [
            'action-edit', 'action-delete', 'action-insert',
            'action-export-csv'
        ],
        orderFields: {
            'codice': 'codice',
            'nome_it': 'nome_it'
        },
        customActions: {
            'action-export-csv': {
                text: 'Csv',
            }
        }
    },
    edit: {
        modelName: 'cup_geo_nazione',
        actions: ['action-save', 'action-back'],
        fields: ['codice', 'nome_it',
            //'comuni'
        ],
    },
}
