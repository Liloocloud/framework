/**
 * CARREGANDO A TPL
 */
function refreshCategs(){
    $('[liloo-loader]').show()
    lilooV3.Event({
        action: 'categories/refresh',
        path: 'modules/portal/dash/routes/categories/ajax',
        data: 'portal',
        success: function(res){
            if(res.bool == false){
                lilooUi.Alert({
                    type: 'info',
                    text: res.message,
                    element: '.alert-list-categ' 
                })
                $('#list-categ').html('')
                return false
            }
            if(res.bool == true){            
                var view = '';
                res.output.forEach((val)=>{                       
                    view +=`
                    <div>
                        <div class="uk-card uk-card-default">
                  
                            <div class="uk-card-header uk-flex uk-flex-between uk-flex-middle uk-padding-small">
                                <h4>${val.tax_name}</h4>
                                <div>
                                    <a href="#" onclick="LevelTwo.clearDrop()" class="uk-icon-button uk-button-primary" uk-icon="plus"></a>   
                                    <div style="z-index: 9999" id="drop-subcateg-${val.tax_id}" uk-drop="pos: bottom-right; mode: click; animation: uk-animation-slide-bottom-small; duration: 400;">
                                    <div class="uk-card uk-card-body uk-card-default uk-card-small">
                                        <span class="msg-create-subcateg"></span>
                                            <p style="font-size: 12px">Incluir nova subcategoria?</p>
                                            <input id="input-subcateg-${val.tax_id}" name="tax_name" type="text" class="uk-input uk-margin-small-bottom input-create-subcateg" autofocus autocomplete="off">
                                            <button onclick="LevelTwo.createSubcateg('${val.tax_id}')" type="button" id="add-subcateg" data-id="${val.tax_id}" class="uk-button uk-button-primary uk-button-small uk-text-capitalize">Adicionar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body uk-padding-small" style="max-height: 220px; overflow-y: auto;">
                                <ul class="uk-list uk-list-divider" id="list-subcateg-${val.tax_id}">`
                                val.tax_sub.forEach((sub)=>{
                                view +=`<li class="uk-flex uk-flex-between uk-flex-middle">
                                    <div>${sub.tax_name}</div>
                                    <div>
                                        <a href="#" onclick="upClear('${sub.tax_id}','${sub.tax_name}')" class="uk-icon-button uk-button-default" uk-icon="pencil"></a>
                                        <a href="#" class="uk-icon-button uk-button-default" uk-icon="close"></a>
                                    </div>
                                </li>`
                                })
                                view+=`</ul>
                            </div>
                        </div>
                    </div>`
                })
                $('#list-categ').html(view)
            }
        }
    })
    $('[liloo-loader]').hide()  
    return false
}
setTimeout(function(){
    refreshCategs()
},400)


/**
 * CATEGORIA LEVEL 1
 */
const LevelOne = {
    clearDrop: function(){
        $('#msg-create-categ').html(``)
        $('#input-create-categ').val('')
        return false
    },
    closeDrop: function(){
        $('#msg-create-categ').html(``)
        $('#input-create-categ').val('')
        UIkit.drop('#drop-create-categ').hide(false);
        return false
    },
    createCateg: function(){
        $('#msg-create-categ').html(``)
        let input = $('#input-create-categ').val()
        if(input == ''){
            lilooUi.Alert({
                element: '#msg-create-categ',
                type: 'alert',
                text: 'Digite o nome da categoria'
            })
            $('#input-create-categ').focus()
            return false
        }
        lilooV3.Event({
            action: 'categories/create',
            path: 'modules/portal/dash/routes/categories/ajax',
            data: JSON.stringify({data: input, type: 'ads'}),
            success: function(res){
                if(res.bool == false){
                    lilooUi.Alert({
                        element: '#msg-create-categ',
                        type: 'error',
                        text: res.message
                    })
                    return false
                }
                if(res.bool == true){
                    lilooUi.Notify({
                        type: 'success',
                        message: res.message
                    })
                    UIkit.drop('#drop-create-categ').hide(false);
                    refreshCategs()
                }
            }
        })
        $('[liloo-loader]').hide()  
        return false
    }
}

/**
 * CATEGORIA LEVEL 2
 */
const LevelTwo = {
    clearDrop: function(){
        $('.msg-create-subcateg').html(``)
        $('.input-create-subcateg').val('')
        return false
    },
    closeDrop: function(id){
        $('.msg-create-subcateg').html(``)
        $('.input-create-subcateg').val('')
        UIkit.drop('#drop-subcateg-'+id).hide(false)
        return false
    },
    createSubcateg: function(id){
        let input = $('#input-subcateg-'+id).val()
        if(input == ''){
            lilooUi.Notify({
                type: 'error',
                message: 'Digite a subcategoria'
            })
            return false
        }
        lilooV3.Event({
            action: 'categories/create/subcat',
            path: 'modules/portal/dash/routes/categories/ajax',
            data: JSON.stringify({data: input, id: id, type: "ads"}),
            success: function(res){

                console.log(res)

                if(res.bool == false){
                    lilooUi.Alert({
                        element: '.msg-create-subcateg',
                        type: 'alert',
                        text: res.message
                    })
                    return false
                }else{
                    $('.msg-create-subcateg').html(``)
                    $('#list-subcateg-'+id).append(`
                        <li class="uk-flex uk-flex-between uk-flex-middle">
                            <div>${input}</div>
                            <div>
                                <a href="#" onclick="upClear('${id}','${input}')" class="uk-icon-button uk-button-default" uk-icon="pencil"></a>
                                <a href="#" class="uk-icon-button uk-button-default" uk-icon="close"></a>
                            </div>
                        </li>
                    `)
                    LevelTwo.closeDrop(id)
                    lilooUi.Notify({
                        type: 'success',
                        message: res.message
                    })
                }
            }
        })
        $('[liloo-loader]').hide()
        return false
    }
}

$('#btn-new-category').on('click', function(){
    LevelOne.clearDrop()
    return false
})

$('#add-categ').on('click', function(){
    LevelOne.createCateg()
    return false
})





















function addClear(id){
    $('#msg-cat-'+id).html(``)
    $('#cat-'+id).val('')
    return false
}
function closeDrop(id){
    UIkit.drop('#drop-close-'+id).hide(false);
    return false
}

/* UPDATE */
function upSubCat(id){
    let value = $('#subcat-'+id).val()
    if(value != ''){
        lilooJS.Event({
            action: 'update_taxonomy_subcat',
            path: 'admin/modules/items/ItemsManager',
            data: id+','+value
        })
        UIkit.drop('#drop-edit-'+id).hide(false);
    }else{
        $('#msg-up-subcat-'+id).html(`Digite a subcategoria`)
        $('#subcat-'+id).focus()
    }
    return false
}
function upClear(id, name){
    $('#msg-up-subcat-'+id).html(``)
    $('#subcat-'+id).val(name)
    return false
}
function closeUpDrop(id, name){
    UIkit.drop('#drop-edit-'+id).hide(false);
    $('#msg-up-subcat-'+id).html(``)
    $('#subcat-'+id).val(name)
    return false
}

/* Excluir */
function delSubCat(id){
    lilooJS.Event({
        action: 'delete_taxonomy_subcat',
        path: 'admin/modules/items/ItemsManager',
        data: id
    })
    UIkit.drop('#drop-close-'+id).hide();
    return false
}


