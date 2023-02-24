import { lilooForms } from "../../../../libs/@liloo/forms/forms.js";

const AjaxPath = 'modules/marketing/routes/crm/ajax'

lilooV3.Event({
    action: 'load/pipelines',
    path: AjaxPath,
    data: 'form',
    success: function(res){     
        let leads = res.output
        if(leads.pipelines){
              leads.pipelines.forEach(val => {
                $('.lists').append(`
                <div class="list">
                    <header>${val.pipe_title}</header>
                    <ul id="pipeline-${val.pipe_id}" class="list-card-matrix connectedSortable">            
                    </ul>
                    <footer>&nbsp;</footer>
                </div>
                `)              
                leads.matrix.forEach(mat => {
                    let method = (mat.lead_method)? mat.lead_method : null
                    switch(method){

                        case 'click_ads_called_phone': 
                            method = `
                            <!-- <h3>${mat.lead_name}</h3> -->
                            <!--  <p>E-mail: ${mat.lead_email}</p> -->
                            <h3>Telefone: ${mat.lead_phone_1}</h3>
                            <p>Canal: Ligação telefônica</p>
                            `
                        break

                        case 'click_ads_init_talk_whatsapp': 
                            method = `
                            <!-- <h3>${mat.lead_name}</h3> -->									
                            <!-- <p>Mensagem: ${mat.lead_message}</p>  -->
                            <h3>Whatsapp: ${mat.lead_whatsapp}</h3>
                            <p>Canal: Conversa no Whatsapp</p>
                            `
                        break
                    }
                    
                    if(mat.matrix_pipeline == val.pipe_id){
                        $('#pipeline-'+mat.matrix_pipeline).append(`
                        <li id="${mat.matrix_code}" class="card-action-click">			
                            ${method}
                        </li>
                        `)
                    }



                })
            });
        }
        
        /**
         * Drag and Drop dos Cartões, enviando os dados via Ajax 
         * para Atualização das ordens no banco de dados. Feito
         * com a biblioteca do JQuery
         */
        $(".connectedSortable").sortable({
            connectWith: ".connectedSortable",
            update: function () {
                let Pipeline = $(this).attr("id");
                let MatrixOrder = [];
                $(this).children('li').each(function (idx, elm) {
                   MatrixOrder.push(elm.id)
                });
                lilooV3.Event({
                    action: 'alter/pipelines',
                    path: AjaxPath,
                    data: JSON.stringify({MatrixOrder,Pipeline}),
                    success: function(res){
                        console.log(res)
                    }
                })
                
                $('[liloo-loader]').hide();
            }
        }).disableSelection();


        /**
         * Ao clicar no card abre a modal lateral ou 
         * Redirecina o usuário para a rota correspondente
         */
        $('.card-action-click').on('click', function(){
            let CodeMatrix = $(this).attr('id')
            let Pipe = $(this.parentNode).attr('id')
                Pipe = Pipe.split('-')[1] 
            if(CodeMatrix && Pipe){
                window.location = lilooV3.Root()+'admin/marketing/pipe/'+Pipe+'/'+CodeMatrix+'/'
            }
        })

        // Data
        $('[liloo-datetime-alter]').daterangepicker({
            drops: 'auto',
            buttonClasses: 'uk-button',
            applyButtonClasses: 'uk-button-primary uk-button-small',
            cancelButtonClasses: 'uk-button-default uk-button-small uk-margin-small-right',
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 15,
            timePickerSeconds: false,
            singleDatePicker: true,
            // autoApply: true,
            startDate: moment(),
            minDate: moment(),
            locale: { 
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                format: "DD/MM/YYYY HH:mm",
                separator: " - ",
                daysOfWeek: ["Dom","Seg","Ter","Qua","Qui","Sex","Sáb"],
                monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            }
        },
        function (startDate) {
            var id = $(this).attr('id')
            lilooJS.Event({
                action: 'followup_update_datetime_pipeline',
                path: 'modules/agency/dash/routes/followup/ajax',
                data: {
                    datetime: startDate.format('DD/MM/YYYY HH:mm'),
                    matrix: id
                }
            })
        })


    }
})