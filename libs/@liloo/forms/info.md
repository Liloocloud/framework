
## Uso 
Habilitar um script do type="module"
Importe os script para ser utilizado. Veja o exemplo abaixo:

```js
import { lilooFormCSS, lilooForms } from "../../../../libs/@liloo/forms/forms";

lilooFormCSS('lite')   
lilooForms({
    selector: '#primeiro',
    labelSubmit: 'Cadastrar Usuário',
    action: 'test',
    path: 'modules/templates/routes/newpage/ajax',
    data: 'modulo form',
    build: [
        {
            el: 'input',
            focus: true,
            name: 'account_name',
            placeholder: 'Seu nome',
            attr: 'required',
            // class: 'uk-padding-large',
            // parentClass: 'uk-width-1-2@m',
            // style: 'background: #dedede',
            // label: 'Nome',
            // type: 'text',
            // id: 'account_name_id',
            // attr: 'liloo-check required onclick="test()"'
        },
        {
            el: 'textarea',
            name: 'account_lastname',
            placeholder: 'Seu sobrenome'
        },
        
    ]
})

```