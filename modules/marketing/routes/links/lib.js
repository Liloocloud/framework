
export default class Sort {

    constructor(Obj){
        this.name = Obj.name
        this.phone = Obj.phone
    }

    View(){
        return `Seu nome é ${this.name} e seu telefone é ${this.phone}`
    }

}