
/**
 * 
 */

class lilooProps {
    
    constructor(Obj) {
        this.props = Obj.props
        this.element = Obj.element  
    }

    render(){
        if (typeof this.props != 'undefined') {                  
            let startProps = this.props.map(function(item){
                return item = Object.entries(item)  
            })
            let fill = startProps.find(element => {
                return element[1][1] == 'client_code'
            })
            console.log(fill)

            res.map(function (objMap) {
                let item = Object.entries(objMap)
                tpl = `<li><div class="uk-child-width-1-${column}@m uk-grid-collapse" uk-grid>`
                let i = 0, or = []
                item.forEach((props) => {         
                    startProps.forEach(element => {
                        if (props[0] == element.field) {
                            
                             // console.log(props[0])
                            // console.log(element.label + ': ' + props[1])
                            // tpl += `<p>${element.label} ${props[1]}</p>`

                            or.push(element.field)[i]
                            // or[i][element.field] = `<p>${element.label} ${props[1]}</p>`

                        }
                    })
                    i++
                })
                tpl += `</div></li>`
                $(this.element + ' ul').prepend(tpl)
            })
        }
    }

}

export { lilooProps }