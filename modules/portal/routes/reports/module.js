
lilooV3.Event({
    action: 'list/leads',
    path: 'modules/marketing/routes/reports/ajax',
    data: 'whatsapp',
    success: function(res){
        let leads = res.output
        if(leads){
            leads.forEach(val => {
                console.log(val)
                $('#list-leads-whatsapp .uk-card-body').append(`
                    <div>
                        <div class="list-item">
                            <span class="uk-flex uk-flex-between uk-flex-middle">
                                <h3>${val.contact_whastapp}</h3>
                                <h4>${val.contact_registered}</h4>
                            </span>                  
                            <p>${val.contact_message}</p>
                            <span class="uk-flex uk-flex-between uk-margin-top">
                                <p>${val.contact_ip}</p>
                                <p>ID: ${val.contact_id}</p>
                            </span>
                        </div>
                    </div>
                `)
            });
        }else{
            $('#list-leads-whatsapp .uk-card-body').html(`
                <div><div class="list-item">Nenhum contato</div></div>
            `)
        }    
    }
})

lilooV3.Event({
    action: 'list/leads',
    path: 'modules/marketing/routes/reports/ajax',
    data: 'form',
    success: function(res){
        let leads = res.output
        if(leads){
            leads.forEach(val => {
                console.log(val)
                $('#list-leads-form .uk-card-body').append(`
                    <div>
                        <div class="list-item">
                            <span class="uk-flex uk-flex-between uk-flex-middle">
                                <h3>${val.contact_name}</h3>
                                <h4>${val.contact_registered}</h4>
                            </span>                  
                            <p>${val.contact_email}</p>
                            <p>${val.contact_message}</p>
                            <span class="uk-flex uk-flex-between uk-margin-top">
                                <p>${val.contact_ip}</p>
                                <p>ID: ${val.contact_id}</p>
                            </span>
                        </div>
                    </div>
                `)
            });
        }else{
            $('#list-leads-form .uk-card-body').html(`
                <div><div class="list-item">Nenhum contato</div></div>
            `)
        }    
    }
})
