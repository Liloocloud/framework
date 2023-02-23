/**
 * Renderização do HTML
 */
const Render = function (app, type = null) {
    let el = $('#app')
    switch (type) {
        case 'prepend':
            el.prepend(app)
            break;
        case 'append':
            el.append(app)
            break;
        default:
            el.html(app)
            break;
    }
}

const Loop = function(item, callback){
    item.forEach((val)=>{
        callback(val)
    })
}


export { Render, Loop }