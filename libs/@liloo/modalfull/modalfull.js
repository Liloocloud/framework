/**
 * Components que lista informações adicionais de uma lista de itens
 * @copyright Felipe Oliveira - 15.09.2022
 * @version 1.0.0
 */

const lilooModalFull = {

    /**
     * Para ser usado juntamento com o recurso "libs/@liloo/searchlist/"
     * onde os dados coletados do banco de dados serão individuais
     */
    ListItem: function(Obj){       
        let objElement = (typeof Obj.element == 'undefined')? 'liloo-modalfull' : Obj.element        
        let objAction = (typeof Obj.action == 'undefined')? null : Obj.action
        let objPath = (typeof Obj.path == 'undefined')? null : Obj.path
        let objID = (typeof Obj.data.id == 'undefined')? '' : `id="modal-${Obj.data.id}"`
        let Rand = Math.floor(Math.random() * 101)

        // Renderiza o HTML
        $(objElement + ' .liloo-item-modal-full').html(`
        <div ${objID} class="uk-modal-full" tabindex="0" uk-modal style="background: #0000004d;">
            <button class="uk-modal-close-full uk-close-large" type="button" uk-close style="position: fixed !important; top: 0; right: 0;"></button>
            <div class="uk-modal-dialog uk-animation-slide-right uk-padding liloo-h100" style="background: #EAEFF6">
                <div class="liloo-modal-full-content"></div>                            
            </div>
        </div>
        `)

        // Request Ajax ou API
        if(objPath && objAction){           
            lilooV3.Event({
                path: objPath,
                action: objAction,
                data: JSON.stringify(Obj.data),
                success: function (res) {
                    Obj.success(res)                   
                    // UIkit.modal(objElement + ' .liloo-item-modal-full .uk-modal-full').show()
                }
            })
        }

        
    }

}
export { lilooModalFull }