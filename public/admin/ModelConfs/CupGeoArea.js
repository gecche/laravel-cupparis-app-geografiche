
var CupGeoArea = {
    search: {
        modelName : 'cup_geo_area',
        //langContext : 'user',
        fields : ['descrizione'],
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
        fields : ['codice','descrizione'],
        actions : ['action-edit','action-delete','action-insert'],
        orderFields : {
            'codice':'codice',
            'descrizione':'descrizione'
        },
    },
    edit: {
        modelName : 'cup_geo_area',
        actions : ['action-save','action-back'],
        fields : ['codice','descrizione',
            //'comuni'
        ],
    },

}
