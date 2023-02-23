/**
 * Checagem de Dados para Evitar Requisições Desnecessárias
 */
const lilooCheck = {
    Email: function (email) {
        let res = /\S+@\S+\.\S+/
        return res.test(email)
    },
    Phone: function (phone) {
        let res = /^(?:\()[0-9]{2}(?:\))\s?[0-9]{4,5}(?:-)[0-9]{4}$/
        return res.test(phone)
    },
    /**
     * 
     * @param {string} str input ou campo a ser verificado
     * @param {string} force padrão exigido, sendo 'low - medium - high' por padrão high
     * @param {string} min número minimo de caracteres. Por padrão 8
     * @returns 
     */
    StrongPassword: function (str, min = 8, force = 'high') {
        if (force == 'low' || force == 'medium' || force == 'high') {
            if (str.length < min) {
                return {
                    bool: false,
                    message: 'A senha deve conter no mínimo 8 caracteres'
                };
            }
        }
        if (force == 'medium' || force == 'high') {
            if (!/[A-Z]/.test(str)) {
                return {
                    bool: false,
                    message: 'A senha deve conter letra maiúscula'
                };
            }
            if (!/[a-z]/.test(str)) {
                return {
                    bool: false,
                    message: 'A senha deve conter letra minúscula'
                };
            }
            if (!/[0-9]/.test(str)) {
                return {
                    bool: false,
                    message: 'A senha deve conter números'
                };
            }
        }
        if (force == 'high') {
            if (!/[!|@|#|$|%|^|&|*|(|)|-|_]/.test(str)) {
                return {
                    bool: false,
                    message: 'A senha deve conter pelo menos 1 caracter especial como: \!\@\#\$\%\^\&\*\(\)\-\_'
                };
            }
        }
        return {
            bool: true,
            message: 'Senha forte'
        };
    }
}

export { lilooCheck }