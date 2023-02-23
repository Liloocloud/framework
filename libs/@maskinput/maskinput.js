/**
 * Componente para mascara de campo
 */
const SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
    spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

const lilooMask = function(){
    $("[liloo-mask-codevalidate]").mask("999999")
    $("[liloo-mask-cnpj]").mask("99.999.999/9999-99")
    $("[liloo-mask-cpf]").mask("999.999.999-99")
    $("[liloo-mask-date]").mask("99/99/9999")
    $("[liloo-mask-datetime]").mask("99/99/9999 99:99")
    $("[liloo-mask-zipcode]").mask("99999-999")
    $("[liloo-mask-zipcode-full]").mask("99999999")
    $("[liloo-mask-dolar]").mask('#,##0.00', { reverse: true })
    $("[liloo-mask-real]").mask('#.##0,00', { reverse: true })
    $("[liloo-mask-thousand]").mask('##0.##0', { reverse: true })
    $("[liloo-mask-phone-us]").mask('(000) 000-0000')
    $("[liloo-mask-phone]").mask(SPMaskBehavior, spOptions)
}
export { lilooMask }