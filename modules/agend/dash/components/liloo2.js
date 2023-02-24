/*!
  * Liloo JS v1.4.2 (https://cdn.liloo.com.br/)
  * Copyright 07.10.2018 Felipe Oliveira Lourenço
  * 
  * URL *
  * Metodo *
  * body/data
  * module
  * action
  * 
  */
export class lilooRequest {   

    constructor(obj) {
        
        let user = 'develop@developer.com.br';
        let pass = 'FortE10#';
        let auth = btoa(user+':'+pass)
       
        let headers = new Headers()
        headers.append('Content-Type', 'application/json')
        headers.append('Authorization', 'Basic '+auth)
        // Authorization: Basic YWxhZGRpbjpvcGVuc2VzYW1l

        let init = {
            headers: headers,
            cache: 'default',
            method: obj.method,
            mode: 'cors',
            body: '{"foo":"bar"}'
        }
        return fetch(new Request(obj.url, init))
            .then((res) => {
                if (res.status === 200) {
                    return res.json()
                } else {
                    throw new Error('Erro no servidor')
                }
            })
            .then((data) => {
                // console.log(data)
                return data.json
            })
            .catch((error) => {
                console.error(error)
            })
    }

}


// const response = await teste.request()
// console.log(teste)
// console.log(response)
// console.log(response)
// console.error('Ops')
// console.warn('Ops')
// document.querySelector('app').innerHTML = Accounts.List(response[0])