var CupGeoRegione = {
    search : {
        buttonsClass : 'bg-gradient-info overlay-dark overlay-opacity-4',
        fields: [
            'area_id',
            'descrizione',
        ],
        fieldsConfig : {
            'area_id': {
                type: "w-select",
            },
        }
    },
    list: {
        modelName : 'regione',
        fields: [
            'id',
            'codice',
            'descrizione',
            'area'

        ],
        actions : [
            'action-insert',
            'action-edit',
            'action-delete',
            'action-delete-selected',
        ],
        orderFields : {
            'codice':'codice',
            'descrizione':'descrizione'
        },
        fieldsConfig: {
			'descrizione' : {
			},
            'codice' : {
            },
            area : {
                type : 'w-belongsto',
                labelFields : ['descrizione']
            },

        },

        mounted : function () {

        }
    },
    listRidotta: {
        modelName : 'regione',
        fields: [
            'descrizione',
        ],
        actions : [
            'action-insert',
            'action-edit',
            'action-delete',
        ],
        orderFields : {
            'codice':'codice',
            'descrizione':'descrizione'
        },
        fieldsConfig: {
            'descrizione' : {
                type : 'w-custom',
                mounted : function () {
                    var that = this;
                    that.value = that.modelData['descrizione'] + " - " + that.modelData.area['descrizione']
                        + " (" + that.modelData['codice'] + ")";
                }
            },
            'codice' : {
            },
            area : {
                type : 'w-belongsto',
                labelFields : ['descrizione']
            },

        },

        mounted : function () {

        }
    },
    edit: {
        modelName : 'regione',
        actions : ['action-save','action-back'],
        fields: [
            'codice',
			'descrizione',
            'area_id',
        ],
        fieldsConfig: {
			'area_id' : {
                type : "w-select"
			},

        }

    },
}

var manageRegione = {
    listConf : CupGeoRegione.listRidotta,
    manageHeaderClass : 'bg-gradient-info overlay-dark overlay-opacity-4',
    manageHeaderTextClass : 'text-white',
}


