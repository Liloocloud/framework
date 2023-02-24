/**
 * 
 * @param {Se é user ou manager} profile 
 * @param {Elemento HTML que será renderizado} el 
 */


/**
 * Javascript Interface Route "Create"
 * @copy 15/12/2021 Felipe Oliveira Lourenço
 */

 const Agend = {

    /**
     * Checa se o Códido existe, se não salva e continua
     */
    Code: function(){
        let value = $('input[name="order_code"]').val()
        lilooJS.Event({
            action: 'check_order_code',
            path: 'modules/orders/ajax/OrderCreate',
            data: value
        })
    },

    /**
     * Checagem do clientes
     */
    Client: function(){
        let value = $('input[name="agend_client_id"]').val()
        lilooJS.Event({
            action: 'check_order_client',
            path: 'modules/orders/ajax/OrderCreate',
            data: value
        })
    },


}






// Inserir novo registro
function createEvent(){
    lilooJS.Event({
        path: 'modules/agend/ajax/manager',
        action: 'teste',
        data: ''
    })
}

function lilooCalendar(profile, el) {
    var element = document.querySelector(el)
    var calendar = new FullCalendar.Calendar(element, {
        
        // Modelo de visualização inicial
        initialView: 'listWeek',
        
        // Configuração da Header
        headerToolbar: {
            start: 'prev,next,today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
            // end: 'dayGridMonth, timeGridWeek, timeGridDay, listWeek, dayGridWeek'
        },

        // Topo da coluna de horários
        allDayText: 'Agenda',

        // Altera o idioma do Menu
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia',
            list: 'Listagem'
        },
       
        // Eventos
        events: 'http://localhost/liloocloud5/modules/agend/dash/routes/manager/php/getEvents.php',

        // Tradução
        locale: 'pt-br',

        // Dispara a função ao clicar na Data ou hora em qualquer tipo de tela
        dateClick: function(info){


            UIkit.modal('#modal-view-details').show()
            $('.output').html(`<pre>`+JSON.stringify(info,null,2)+'</pre>')

            // modalView()
            // console.log(info.dateStr)
            if(profile == 'manager'){
                alert('vai para manager')
            }else{
                calendar.changeView('timeGrid', info.dateStr)
            }
        },

        // Quando clique num evento 
        eventClick: function (info) {
            // alert('Event: ' + info.event.title);
            // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            // alert('View: ' + info.view.type);
            // alert(info)
            // $('.output').html(`<pre>`+JSON.stringify(info.event,null,2)+'</pre>')
            
            $('.init-modal').html(`
            <div id="modal-view-details" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h3>${info.event.title}</h3>
                    </div>
                    <div class="uk-modal-body">
                        <p>Horário: ${info.event.start}</p>
                        <p>Id: ${info.event.id}</p>
                        <form data-liloo method="post">
                            <input type="hidden" name="action" value="teste">
                            <input type="hidden" name="path" value="modules/agend/ajax/manager">
                            <input type="text"  name="name">
                            <button type="submit">ENviar</button>
                        </form>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button onclick="createEvent()" class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-primary" type="button">Save</button>
                    </div>
                </div>
            </div>
            `)
            UIkit.modal('#modal-view-details').show()
            // change the border color just for fun
            info.el.style.borderColor = 'red';
        }


        // eventDidMount: function (info) {
        //     if (info.event.extendedProps.status === 'done') {
        //         // Change background color of row
        //         info.el.style.backgroundColor = '#dedede';
        //         // Change color of dot marker
        //         var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
        //         if (dotEl) {
        //             dotEl.style.backgroundColor = 'white';
        //         }
        //     }
        // }

    });

    calendar.render()
}
lilooCalendar('user', '.liloo-calendar-manager');