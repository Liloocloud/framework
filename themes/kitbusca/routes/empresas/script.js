
function b64EncodeUnicode(str) {
    let Str = btoa(encodeURIComponent(str))
    return Str.replace('=','')
}
  
// function UnicodeDecodeB64(str) {
// return decodeURIComponent(atob(str));
// }


/**************************************************
 * Click Opening Hours específico para coletar 
 * informações de clique no horário de funcionamento
 */
function clickListviewHours(id, account) {
    $('.opening-' + id + ' .list').html('<div uk-spinner></div>')
    setTimeout(function () {
        let hours = document.querySelector('.opening-' + id + ' ul li')
        if (hours.classList.contains("uk-open")) {
            lilooV3.Event({
                path: 'themes/kitbusca/ajax/listview',
                action: 'listview/actions',
                data: JSON.stringify({ 
                    repo_ads_id: id,
                    repo_account_id: account,
                    repo_key: 'click_ads_view_hours_operation' 
                }),
                success: function (res) {
                    let hours = JSON.parse(res.output.ads.ads_opening_hours)
                    let tpl = ``
                    let css = ``
                    for (const key in hours) {
                        if (hours.hasOwnProperty(key)) {
                            if (hours[key] == 'fechado') { css = `closed` } else { css = `` }
                            tpl += `<p><span class="item">${key}:</span> <span class="info ${css}">${hours[key]}</span></p>`
                        }
                    }
                    $('.opening-' + id + ' .list').html(tpl)
                    $('[liloo-loader]').hide()
                }
            })
        }
    }, 10)
    $('[liloo-loader]').hide()
    return false
}

/**************************************************
 * Ações dentro da modal gerada
 * Clicks após abrir modal
 */
function clickModalListview(id, account, action) {
    lilooV3.Event({
        path: 'themes/kitbusca/ajax/listview',
        action: 'listview/actions',
        data: JSON.stringify({ 
            repo_ads_id: id,
            repo_account_id: account,
            repo_key: action,
        }),
        success: function (res) {
            console.log(res)
            window.location.href = `tel:+55${res.output.ads.ads_phone}`
            $('[liloo-loader]').hide()
        }
    })
    $('[liloo-loader]').hide()
}

/**************************************************
 * Envio de formulário por parametros passados
 * coletando os campos hidden para obter mais parametros
 */
function sendFormWhatsapp(element){    
    $(element + ' .msg-alert').html('')
    let phone = $(element + ' input[name="repo_whatsapp"]').val()
    if(!lilooCheck.Phone(phone)){
        lilooUi.Alert({
            element: element + ' .msg-alert',
            message: `Número de telefone inválido`,
            type: 'error'
        })
        return false
    }
    lilooV3.Form({
        form: document.querySelector(element),
        success: function (res) {                 
            console.log(res) 
            if(res.bool){            
                let phone = res.output.ads.ads_whatsapp.replace(/[^0-9]/g,'')
                let text = $(element + ' textarea[name="repo_message"]').val()
                let url = `https://web.whatsapp.com/send?phone=+55${phone}&text=${text}`
                window.open(url, '_blank')
                return false
            }
            $('[liloo-loader]').hide()
        }
    })
    $('[liloo-loader]').hide()
    return false
}

/**************************************************
 * Envio do formulário de contato via E-mail
 */
function sendFormContact(element){
    $(element + ' .msg-alert').html('')
    $(element + ' [uk-spinner]').show()
    let email = $(element + ' input[name="repo_email"]')
    let phone = $(element + ' input[name="repo_phone"]')
    email.removeClass('uk-form-danger')
    phone.removeClass('uk-form-danger')
    if(!lilooCheck.Email(email.val())){
        lilooUi.Alert({
            element: element + ' .msg-alert',
            message: `E-mail inválido`,
            type: 'error'
        })
        email.addClass('uk-form-danger')
        email.focus()
        return false
    }
    if(!lilooCheck.Phone(phone.val())){
        lilooUi.Alert({
            element: element + ' .msg-alert',
            message: `Número de telefone inválido`,
            type: 'error'
        })
        phone.addClass('uk-form-danger')
        phone.focus()
        return false
    }
    lilooV3.Form({
        form: document.querySelector(element),
        success: function (res) {                 
            console.log(res) 
            if(res.bool){
                document.querySelector(element).reset()
                lilooUi.Notify({
                    message: 'Seu contato foi enviado',
                    type: 'success'
                })
                UIkit.modal('#modal-contact').hide()
            }
            $('[liloo-loader]').hide()
            $(element + ' [uk-spinner]').hide()
        }
    })
    $('[liloo-loader]').hide()
    return false  
}

/**************************************************
 * Contabiliza a ações "como chegar"
 */
function modalRouteMap(id, account){
    lilooV3.Event({
        path: 'themes/kitbusca/ajax/listview',
        action: 'listview/actions',
        data: JSON.stringify({ 
            repo_ads_id: id, 
            repo_account_id: account,
            repo_key: 'click_ads_how_togo'
        }),
        success: function (res) {
            // console.log(res)
            let origin = 
                res.output.ads.ads_address + ', ' +
                res.output.ads.ads_address_number + ', ' +
                res.output.ads.ads_address_district + '-' +
                res.output.ads.ads_address_city + '-' +
                res.output.ads.ads_address_uf
            origin = origin.replaceAll(/[ ]/g, '+')
            window.open(`https://www.google.com/maps/dir/${origin}//`, '_blank');
            // https://www.google.com/maps/dir/origem/destino/
            $('[liloo-loader]').hide()
        }
    })
    $('[liloo-loader]').hide()
    return false
}

/**************************************************
 * Coleta os cliques dos botões do anuncio (listview)
 * e Mostra a modal correspondente ao tipo de dado
 */
function clickListview(id, account, action, url = null) {
    lilooV3.Event({
        path: 'themes/kitbusca/ajax/listview',
        action: 'listview/actions',
        data: JSON.stringify({ 
            repo_ads_id: id,
            repo_account_id: account,
            repo_key: action
        }),
        success: function (res) {
            console.log(res, action)
            if (res.bool == true && url != null) {
                window.location.href = lilooV3.Root() + `e/${url}/${b64EncodeUnicode(account)}/`
                return
            }
            // Cada comportamento é diferente por isso switch
            switch (action) {
                
                // Ver telefone
                case 'click_ads_view_phone':
                    $('#modal-phone .content').html(`
                        <p>${res.output.ads.ads_phone}</p>
                        <button onclick="clickModalListview('${id}','${res.output.ads.ads_account_id}','click_ads_called_phone')" class="uk-button uk-button-primary uk-modal-close">Ligar agora</button>
                    `)
                    UIkit.modal('#modal-phone').show()
                break

                // Whatsapp
                case 'click_ads_button_whatsapp':
                    $('#modal-whatsapp form input[name="repo_ads_id"]').val(id)
                    $('#modal-whatsapp form input[name="repo_key"]').val('click_ads_init_talk_whatsapp')
                    $('#modal-whatsapp form input[name="repo_whatsapp"]').val('')
                    $('#modal-whatsapp form input[name="repo_account_id"]').val(res.output.ads.ads_account_id)
                    UIkit.modal('#modal-whatsapp').show()
                break

                // Site
                case 'click_ads_link_site':
                    let site = (res.output.ads.ads_site)? res.output.ads.ads_site : null
                    if(site){
                        if(!site.includes('https://') || site.includes('http://')){
                            site = '//'+site
                        }
                        window.open(site, '_blank');
                    }
                break

                // Compartilhamento
                case 'click_ads_smm':
                    let smm = {
                        facebook : (res.output.ads.ads_facebook)? res.output.ads.ads_facebook : null,
                        linkedin : (res.output.ads.ads_linkedin)? res.output.ads.ads_linkedin : null,
                        instagram : (res.output.ads.ads_instagram)? res.output.ads.ads_instagram : null,
                        tiktok : (res.output.ads.ads_tiktok)? res.output.ads.ads_tiktok : null,
                        youtube : (res.output.ads.ads_youtube)? res.output.ads.ads_youtube : null,                     
                    }   
                    let content = ``               
                    for (const [key, value] of Object.entries(smm)) {
                        if(value != null){
                            content+= `<a href="${value}" class="uk-icon-button uk-margin-small-right" uk-icon="${key}" onclick="clickListview('${id}','${res.output.ads.ads_account_id}','click_ads_smm_${key}')" target="_blank"></a>`
                        }                   
                    }
                    $('#modal-smm .content').html(content)
                    UIkit.modal('#modal-smm').show()
                break
                
                // Redes Sociais
                case 'click_ads_smm_facebook':
                case 'click_ads_smm_instagram':
                case 'click_ads_smm_youtube':
                case 'click_ads_smm_linkedin':
                case 'click_ads_smm_tiktok':
                    UIkit.modal('#modal-smm').hide()
                break

                // Contato - modal-contact
                case 'click_ads_contact':
                    $('#modal-contact form input[name="repo_ads_id"]').val(id)
                    $('#modal-contact form input[name="repo_account_id"]').val(res.output.ads.ads_account_id)
                    $('#modal-contact form input[name="repo_name"]').focus()
                    UIkit.modal('#modal-contact').show()
                break

                // Como chegar
                // case 'click_ads_how_togo':
                //     $('#modal-howtogo .content').html(`
                //         <p>${res.output.ads.ads_phone}</p>
                //         <button onclick="modalRouteMap('${id}')" class="uk-button uk-button-primary">Ver no mapa</button>
                //     `)
                //     UIkit.modal('#modal-howtogo').show()
                // break

            }

            // UIkit.modal('#modal-sections').show()
            $('[liloo-loader]').hide()
        }
    })
    $('[liloo-loader]').hide()
    return false
}

// bloqueio do envio de qualquer form
$('form').on('submit', function(e){
    e.preventDefault()
    return false
})