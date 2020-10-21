var CupGeoRegione = {
    search : {
        buttonsClass : 'bg-gradient-info overlay-dark overlay-opacity-4',
        fields: [
            'T_AREA_ID',
            'T_REGIONE_DESC',
        ],
        fieldsConfig : {
            'T_AREA_ID': {
                type: "w-select",
            },
        }
    },
    list: {
        modelName : 'regione',
        fields: [
            'id',
            'T_REGIONE_CODICE',
            'T_REGIONE_DESC',
            'area'

        ],
        actions : [
            'action-insert',
            'action-edit',
            'action-delete',
            'action-delete-selected',
        ],
        orderFields : {
            'T_REGIONE_CODICE':'T_REGIONE_CODICE',
            'T_REGIONE_DESC':'T_REGIONE_DESC'
        },
        fieldsConfig: {
			'T_REGIONE_DESC' : {
			},
            'T_REGIONE_CODICE' : {
            },
            area : {
                type : 'w-belongsto',
                labelFields : ['T_AREA_DESC']
            },

        },

        mounted : function () {

        }
    },
    listRidotta: {
        modelName : 'regione',
        fields: [
            'T_REGIONE_DESC',
        ],
        actions : [
            'action-insert',
            'action-edit',
            'action-delete',
        ],
        orderFields : {
            'T_REGIONE_CODICE':'T_REGIONE_CODICE',
            'T_REGIONE_DESC':'T_REGIONE_DESC'
        },
        fieldsConfig: {
            'T_REGIONE_DESC' : {
                type : 'w-custom',
                mounted : function () {
                    var that = this;
                    that.value = that.modelData['T_REGIONE_DESC'] + " - " + that.modelData.area['T_AREA_DESC']
                        + " (" + that.modelData['T_REGIONE_CODICE'] + ")";
                }
            },
            'T_REGIONE_CODICE' : {
            },
            area : {
                type : 'w-belongsto',
                labelFields : ['T_AREA_DESC']
            },

        },

        mounted : function () {

        }
    },
    edit: {
        modelName : 'regione',
        actions : ['action-save','action-back'],
        fields: [
            'T_REGIONE_CODICE',
			'T_REGIONE_DESC',
            'T_AREA_ID',
        ],
        fieldsConfig: {
			'T_AREA_ID' : {
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


