

function b64EncodeUnicode(str) {
    let Str = btoa(encodeURIComponent(str))
    return Str.replace('=','')
}
  
function UnicodeDecodeB64(str) {
    return decodeURIComponent(atob(str));
}


var Pri = b64EncodeUnicode(245695)
var Sec = UnicodeDecodeB64(Pri)

console.log(
    Pri,
    Sec
)