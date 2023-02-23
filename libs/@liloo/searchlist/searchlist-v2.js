

// const lilooSearchV2 = {


// }

// https://www.youtube.com/watch?v=iohhj-k9L6s
// import '../../../assets/liloo/js/lilooJS-3.0'

class lilooSearchV2 {

    constructor(Obj) {    
        this.name = Obj;
    }

    test() {
        return this.name
    }

    event(){
        lilooV3.Event({
            action: 'trash/status/page',
            path: 'modules/templates/routes/pages/ajax',
            data: 33,
            success: function(res){
                if(res.bool == true){
                    Swal.fire({
                        title: 'show! ' + this.test(),
                        text: res.message,
                        icon: res.type,
                        confirmButtonColor: '#1E87F0'
                    })
                }else{
                    Swal.fire({
                        title: 'Ops! ' + this.test(),
                        text: res.message,
                        icon: res.type,
                        confirmButtonColor: '#1E87F0',
                    })
                }
            }
        })
    }

}

export { lilooSearchV2 }