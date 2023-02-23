/**
 * Helper para uso geral no javascript
 */
 const lilooUi = {

    /**
     * Notificação Uikit
     * @param {Object: [message, pos, time, type]} Obj 
     * @returns 
     */
    Notify: (Obj) => {
        let message = Obj.message
        let pos = !Obj.pos ? 'top-center' : Obj.pos
        let time = !Obj.time ? 3000 : Obj.time
        let type = !Obj.type ? 'info' : Obj.type
        let pre = null
        switch (Obj.type) {
            case 'success': type = 'success'; pre = '<b>Ok!</b> '; break;
            case 'info': type = 'primary'; pre = '<b>Info!</b> '; break;
            case 'alert': type = 'warning'; pre = '<b>Atenção!</b> '; break;
            case 'error': type = 'danger'; pre = '<b>Erro!</b> '; break;
        }
        UIkit.notification({
            message: pre + message,
            status: type,
            pos: pos,
            timeout: time
        });
        return false
    },

    /**
     * Alert
     */
    Alert: (Obj) => {
        let el = !Obj.element ? '[liloo-alerts]' : Obj.element
        switch (Obj.type) {
            case 'error': type = 'uk-alert-danger'; break;
            case 'success': type = 'uk-alert-success'; break;
            case 'info': type = 'uk-alert-primary'; break;
            case 'alert': type = 'uk-alert-warning'; break;
        }
        $(el).html(`
        <div class="${type}" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>${Obj.message}</p>
        </div>
        `).show()
        // Callback function
        if (Obj.done) {
            Obj.done()
        }
    },

    /**
     * Redireciona após acontagem regressiva
     */
    RedirectCountDonw: (Obj) => {
        Obj.url
        Obj.element = 'liloo-countdown'
        Obj.seconds = 5
        setInterval(function () {
            if (Obj.seconds <= 0) {
                window.location.href = Obj.url
                return
            }
            $('.'+Obj.element).html('em ' + Obj.seconds + '...');
            console.log(Obj.seconds--)
        }, 1000)
    }

}

export { lilooUi }