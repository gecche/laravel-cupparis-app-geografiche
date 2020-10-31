
var ModelCupGeoArea = {
    search: {
        modelName : 'cup_geo_area',
        //langContext : 'user',
        fields : ['nome_it'],
    },
    // view : {
    //     modelName : 'cup_geo_area',
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
        modelName : 'cup_geo_area',
        fields : ['codice','nome_it','attivo'],
        actions : ['action-edit','action-delete','action-insert',
            'action-export-csv'
        ],
        orderFields : {
            'codice':'codice',
            'nome_it':'nome_it'
        },
        fieldsConfig : {
            'attivo' : {
                type : 'w-swap-smarty',
                modelName : 'cup_geo_area'
            }
        },
        customActions : {
            'action-export-csv' : {
                text: 'Csv',
            }
        }
    },
    edit: {
        modelName : 'cup_geo_area',
        actions : ['action-save','action-back'],
        fields : ['codice','nome_it',
            //'comuni'
        ],
    },

}
