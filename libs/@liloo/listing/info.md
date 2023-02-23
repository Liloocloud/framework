# Lib de listagem de dados

## Próximas atualizações
- Criar modelos de listas prontos, permitindo apenas a setagem do modelo
- Incluir paginação de resultados 
- Incluir scroll infinito
- Incluir botões de editar e excluir resultado por ID
- Permitir criar modelo personalizado no estilo TPL
- Abrir modal full ao clicar no item e apresentar todos os dados do "output"

## Implementação

```js
import { lilooList } from "../../../../libs/@liloo/listing/listing";
lilooList({
    element: 'liloo-listing',
    action: 'get/clients',
    path: 'modules/clients/routes/create/ajax',
    data: 'all show',
    // datasheet: [],
    list: function(res){
        res.forEach((props) => {
            $('liloo-listing ul').prepend(`
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
    },
})
```