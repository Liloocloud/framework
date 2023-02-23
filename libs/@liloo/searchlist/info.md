# Componente sendo busca com listagem e edição

Esse componente inclui um mini buscador por termo 
de pesquisa, que ao ser realizada a pesquisa lista logo 
abaixo as opções. Cadas item desse lista conterá uma 
modal lateral que ao ser clicado apresentará o conteúdo do item.

Algumas opções serão implementadas, e são elas:
- Buscador no topo do componentes - ok
- Botão limpar busca - ok
- Requisição Ajax direto no componente - ok
- Envio de dados pelo requisição - ok

- Listagem com limite de paginação
- Botão para recarregar a lista
- Botão excluir (Exigi uma função para essa resposta)
- Botão editar (Exigi uma função para essa resposta)

Próximas atualizações. Uma da ideias é permitir
o uso de API direto como parametro, sendo assim, não
será mais necessário passar case e path, mas sim token, url, endpoint e data.
Tornando o componente ainda mais versátil

## Implementação
### Método "Terms" 

```js
import { lilooSearch } from "../../../../libs/@liloo/searchlist/searchlist";
lilooSearch.Terms({
    element: '#search-clients',
    path: 'modules/clients/routes/manager/ajax',
    reload: true,

    init: {
        action: 'get/clients',
        term: '',
        fields: ['client_name','client_email','client_whatsapp'],
        success: function (res) {
            res = res.output
            if(res != null){
                $('#search-clients ul').html('')
                res.forEach((props) => {
                    /**
                     * Important incluir "<li id="${props.client_id}">" para ser utilizado como item
                     * do recurso da modalfull
                    */
                    $('#search-clients ul').prepend(`
                        <li id="${props.client_id}"> 
                            <div class="uk-child-width-1-3@m uk-grid-collapse" uk-grid>
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
```