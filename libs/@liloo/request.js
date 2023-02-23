/**
 * Requisição via fetch API
 * @copyright Felipe Oliveira 02.06.2022
 * @version 1.0
 */
const lilooRequest = {

    /**
     * Realiza as requisições Ajax via fetch pela metodo GET
     * @param string {obj.url} Url da requisição
     * @param string {obj.endpoint} Endpoint completo exemplo ?name=valor&phone=valor
     * @param function {obj.success} Callback function sucesso da requisição (opicional)
     * @param headers {obj.headers} Cabeçalho da requisição (opicional)
     */
    Get: (obj)=>{
        
        let myHeaders = new Headers();
        myHeaders.append("Authorization", "Basic ZmVsaXBlLmdhbWUuc3R1ZGlvQGdtYWlsLmNvbTpGb3J0RTEwIw==")
        myHeaders.append("Content-type", "application/json; charset=utf-8")
        myHeaders.append("Cookie", "PHPSESSID=a75bf43aebaa433ec395275a63ec67d6");

        let Options = {
            method: 'GET',
            // headers: myHeaders,
            // redirect: 'follow'
        }

        fetch(obj.url + obj.endpoint, Options)
        .then(response => response.json())
        .then(result => {
            obj.success(result)
        })
        .catch(error => console.log('error', error));
    }

}

export default lilooRequest