import { lilooSearch } from "../../../../libs/@liloo/searchlist/searchlist";

lilooSearch.Terms({
    element: '#search-clients',
    path: 'modules/clients/routes/manager/ajax',

    init: {
        action: 'get/clients',
        term: '',
        fields: ['client_name','client_email','client_whatsapp'],
        props: [
            { label: 'Nome:', field: 'client_name' },
            { label: 'E-mail:', field: 'client_email' },
            { label: 'Código:', field: 'client_code' },
            { label: 'Whatsapp:', field: 'client_whatsapp' },
            { label: 'Endereço:', field: 'client_address' },
        ],
        column: 2,
        success: function (res) {
            res = res.output
            if(res != null){
                $('#search-clients ul').html('')
                res.forEach((props) => {
                    $('#search-clients ul').prepend(`
                        <li>
                            <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                                <div>
                                    <p>
                                        Código: ${props.client_code}<br>
                                        Nome: ${props.client_name}<br>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        Whatsapp: ${props.client_whatsapp}<br>
                                        E-mail: ${props.client_email}
                                    </p>
                                </div>
                            </div>
                        </li>
                    `)
                })
            }else{
                $('#search-clients ul').html('<li><p>Nenhum resultado</p></li>')
            }
        }
    },

    searchSubmit: {
        action: 'get/clients',
        fields: [
            'client_name',
            'client_email',
            'client_whatsapp',
            'client_address'
        ],
        success: function (res) {
            res = res.output
            if(res != null){
                $('#search-clients ul').html('')
                res.forEach((props) => {
                    $('#search-clients ul').prepend(`
                        <li>
                            <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                                <div>
                                    <p>
                                        Código: ${props.client_code}<br>
                                        Nome: ${props.client_name}<br>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        Whatsapp: ${props.client_whatsapp}<br>
                                        E-mail: ${props.client_email}
                                    </p>
                                </div>
                            </div>
                        </li>
                    `)
                })
            }else{
                $('#search-clients ul').html('<li><p>Nenhum resultado</p></li>')
            }
        }
    }
})

