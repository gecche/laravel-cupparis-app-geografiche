
var CupGeoArea = {
    // search : {
    //     fields: [
    //         'T_AREA_CODICE',
    //         'T_AREA_DESC',
    //
    //     ],
    // },
    // list: {
    //     modelName : 'area',
    //     fields: [
    //         'id',
    //         'T_AREA_CODICE',
    //         'T_AREA_DESC',
    //
    //     ],
    //     actions : [
    //         'action-insert',
    //         'action-edit',
    //         'action-delete',
    //         'action-delete-selected',
    //     ],
    //     orderFields : {
    //         'T_AREA_CODICE':'T_AREA_CODICE',
    //         'T_AREA_DESC':'T_AREA_DESC'
    //     },
    //     fieldsConfig: {
	// 		'T_AREA_DESC' : {
	// 		},
    //         'T_AREA_CODICE' : {
    //         },
    //
    //     },
    //
    // },
    edit: {
        modelName : 'area',
        actions : ['action-save','action-back'],
        fields: [
            'T_AREA_CODICE',
			'T_AREA_DESC',
        ],
        fieldsConfig: {
			// 'T_AREA_DESC' : {
            //     type : "input",
            //     htmlAttributes: {},
			// },

        }

    },
    listEdit : {
        modelName : 'area',
        actions : [
            'action-edit-mode',
            'action-save-row',
            'action-view-mode'
        ],
        fields: [
            'id',
            'T_AREA_CODICE',
            'T_AREA_DESC',
        ],
        fieldsConfigEditMode: {
           'id' : "w-text",

        }
    },
    list: {
        modelName : 'area',
        fields: [
            'T_AREA_DESC',
        ],
        actions : [
            'action-insert',
            'action-edit',
            'action-delete',
        ],
        orderFields : {
            'T_AREA_DESC':'T_AREA_DESC'
        },
        fieldsConfig: {
            'T_AREA_DESC' : {
                type : 'w-custom',
                mounted : function () {
                    var that = this;
                    that.value = that.modelData['T_AREA_DESC']
                        + " (" + that.modelData['T_AREA_CODICE'] + ")";
                }
            },

        },

    },
}

var manageArea = {
    manageHeaderClass : 'bg-success',
}
