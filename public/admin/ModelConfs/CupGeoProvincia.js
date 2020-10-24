var ModelCupGeoProvincia = {
    search: {
        modelName : 'provincia',
        //langContext : 'user',
        fields : ['regione_id','descrizione'],
        fieldsConfig: {
            'regione_id' : {
                type: 'w-select'

            }
        }
        },
    // view : {
    //     modelName : 'provincia',
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
        modelName : 'provincia',
        fields : ['sigla','regione'],
        actions : ['action-edit','action-delete','action-insert','action-view'],
        orderFields : {
            'sigla':'sigla'
        },
        fieldsConfig: {
            regione : {
                type : 'w-belongsto',
                labelFields : ['codice','descrizione'],
			},
        }

    },
    edit: {
        modelName : 'provincia',
        actions : ['action-save','action-back'],
        fields : ['codice','descrizione','sigla','regione_id',
            //'comuni'
        ],

        fieldsConfig: {
            regione_id : 'w-select',
            //roles : 'w-select',
            comuni : {
                type : 'w-hasmany',
                // limit : 1,
                hasmanyConf : {
                    langContext : 'comune',
                    fields : ['id','codice','descrizione','codice_catastale','cap','prefisso_telefonico'],
                    fieldsConfig : {
                        // codice_catastale :  {
                        //     type : 'w-select'
                        // }
                    }
                },
                template : 'tpl-no',
            },
        },
    },
    view : {
        modelName : 'provincia',
        //actions : ['action-save','action-back'],
        fields : ['codice','descrizione','sigla','regione',
            'comuni'
        ],
        fieldsConfig: {
            regione : {
                type: 'w-belongsto-view',
                labelFields:
                    [
                        'descrizione',
                    ],
			},
            //roles : 'w-select',
            comuni : {
                type : 'w-custom',
                // limit : 1,

                mounted: function () {
                    var that = this;
                    that.value = '<div class="table-responsive w-100">'+
                        '<table class="table table-sm">'+
                        '<thead>'+
                        '<tr>'+
                        '<th colspan="2">Comuni</th>'+
                        '</tr>'+
                        '</thead>'+

                        '<tbody>';




                    var j = 0;
                    for (var i in that.modelData['comuni']) {
                        var comune = that.modelData['comuni'][i];
                        if (j % 2 == 0) {
                            that.value += '<tr>';
        }

                        that.value += '<td>'+comune.descrizione+'</td>';

                        if (j % 2 != 0) {
                            that.value += '</tr>';
                        }
                        j++;
                    }
                    if (j % 2 == 0) {
                        that.value += '<td>&nbsp;</td></tr>';
                    }
                    that.value +=
                        '</tbody>'+
                        '</table>'+
                        '</div>';
    },

                // hasmanyConf : {
                //     langContext : 'comune',
                //     fields : ['id','codice','descrizione','codice_catastale','cap','prefisso_telefonico'],
                //     fieldsConfig : {
                //         // codice_catastale :  {
                //         //     type : 'w-select'
                //         // }
                //     }
                // },
                template : 'tpl-full-no',
            },
        },
    },
    // view : {
    //     //actions: ['action-save', 'action-back', 'action-test'],
    //     fields: ['name','email', 'password', 'password_confirmation', 'banned', 'mainrole', 'fotos', 'attachments'],
    //     fieldsConfig :  {
    //         mainrole :  {
    //             type : 'w-belongsto',
    //             fields : ['name']
    //         }
    //     }
    // },
}

