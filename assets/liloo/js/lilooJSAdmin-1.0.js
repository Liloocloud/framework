/*!
  * Liloo JS Admin v1.0
  * Copyright Felipe Oliveira Lourenço - 04.07.2022
  * @version 1.0.0
  */
const Root = $('body').attr('root');
const lilooDash = {
    /**
     * Redirecionamento das notificações
     * @param {URL que será redirecionada ao clicar na notificação} URL 
     */
    NoticeURL: function (URL) {
        window.location.href = URL
     }

}


/**
 * Manipula o DarkMode
 */
function lilooMode(){
    let mode = $('[liloo-mode]').attr('liloo-mode')
    if(mode == 'dark'){
        $('[liloo-mode]').attr('liloo-mode', 'light')
        $('#liloo-mode-btn').html(`<i class="moon icon"></i>`)
        localStorage.setItem("lilooMode", "light");
    }else{
        $('[liloo-mode]').attr('liloo-mode', 'dark')
        $('#liloo-mode-btn').html(`<i class="sun icon"></i>`)
        localStorage.setItem("lilooMode", "dark");
    }
}
if(localStorage.getItem("lilooMode") == 'dark'){
    $('#liloo-mode-btn').html(`<i class="sun icon"></i>`)
}else{
    $('#liloo-mode-btn').html(`<i class="moon icon"></i>`)
}
$('[liloo-mode]').attr('liloo-mode', localStorage.getItem("lilooMode"))


/**
 * Esconde o loader
 */
function lilooLoader(){
	$('[liloo-loader]').hide()
}