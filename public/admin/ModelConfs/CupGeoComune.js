var ModelCupGeoComune = {
    search : {
        modelName : 'comune',
        fields : ['descrizione','provincia_id'],
        fieldsConfig : {
            'descrizione' : {

            },
            'provincia_id' : 'w-select',
            //codice : 'w-hidden'
        }
    },
    list: {
        actions : [
            'action-insert',
            'action-edit',
            'action-delete',
            'action-delete-selected',
        ],

        fields: [
            'id',
			'T_COMUNE_ISTAT',
			'T_COMUNE_DESC',
            'T_COMUNE_CATASTALE',
			'T_COMUNE_CAPOLPRO',
			'provincia',
            'provinciasigla',

        ],
        fieldsConfig: {
			'T_COMUNE_CAPOLPRO' : {
                type : 'w-swap-smarty',
                modelName : 'comune',
			},
			'provincia' : {
                type : "w-belongsto",
                labelFields : [
                    'T_PROVINCIA_DESC',
                ],
			},
            'provinciasigla' : {
                type : "w-custom",
                mounted : function() {
                    var that = this;
                    if (that.modelData)
                        that.value = that.modelData.provincia.T_PROVINCIA_SIGLA;
                    // setTimeout(function () {
                    //     console.log('modelData',that.modelData);
                    //     that.value = that.modelData.provincia.T_PROVINCIA_SIGLA;
                    // },400)

                }
            },

        },
        orderFields : {
			'T_COMUNE_DESC' : 'T_COMUNE_DESC',
			'T_COMUNE_ISTAT' : 'T_COMUNE_ISTAT',
            'T_COMUNE_CATASTALE' : 'T_COMUNE_CATASTALE',
        }

    },
    edit: {
        fields: [
			'T_COMUNE_DESC',
			'T_COMUNE_CAPOLPRO',
			'T_COMUNE_ISTAT',
            'T_COMUNE_CATASTALE',
			'T_PROVINCIA_ID',

        ],
        fieldsConfig: {

			'T_COMUNE_CAPOLPRO' : {
                type : "w-radio",
			},

			'T_PROVINCIA_ID' : {
                type : "w-select",
			},

        }

    },
}
