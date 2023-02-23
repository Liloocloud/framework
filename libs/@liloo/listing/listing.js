/**
 * Gerador de listas de dados utilizando o Uikit como framework padrão
 * @copyright Felipe Oliveira - 09.09.2022
 * @version 1.0.0
 */

const lilooList = function(Obj){

    $(Obj.element).html(`
        <ul class="uk-list uk-list-divider access">
        </ul>
    `)

    if(typeof Obj.data != 'undefined'){

        lilooV3.Event({
            action: Obj.action,
            path: Obj.path,
            data: Obj.data,
            success: function(res){
                if(res.bool == false){
                    lilooUi.Notify({
                        type: res.type,
                        message: res.message
                    })
                    return
                }
                Obj.list(res.output)               
                $('[liloo-loader]').hide()                
            }
        })
        
    }

}
export { lilooList }