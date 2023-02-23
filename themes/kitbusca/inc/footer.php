<!-- WHATSAPP + BACK TO TOP -->
<div>
    <a href="#" class="liloo-backtotop" uk-totop uk-scroll></a>
</div>

<!-- FOOTER -->
<footer>
    <div class="uk-container uk-padding-large">
        <div class="uk-grid-large uk-child-width-expand@m" uk-grid>
                                    
            <div>
                <h4>Para Empresas</h4>
                <ul class="uk-list uk-text-left">
                    <li><a href="<?= BASE ?>">Área do cliente</a></li>
                    <li><a href="<?= BASE ?>crm-integrado/">CRM integrado</a></li>
                    <li><a href="<?= BASE ?>">Gestão de Clientes</a></li>
                    <li><a href="<?= BASE ?>">Relatórios Completos</a></li>
                    <li><a href="<?= BASE ?>">Cadastre sua empresa</a></li>
                </ul>
            </div>
            
            <div>
                <h4>A kitbusca</h4>
                <ul class="uk-list uk-text-left">
                    <li><a href="<?= BASE ?>">Quem somos</a></li>
                    <li><a href="<?= BASE ?>">Categorias</a></li>
                    <li><a href="<?= BASE ?>">Informativos</a></li>
                    <li><a href="<?= BASE ?>">Busca por DDD</a></li>
                    <li><a href="<?= BASE ?>">Busca por CEP</a></li>
                    <li><a href="<?= BASE ?>">Fale consco</a></li>
                    <li><a href="<?= BASE ?>">Produtos e Serviços</a></li>
                    <li><a href="<?= BASE ?>">Empresas de A a Z</a></li>
                </ul>
            </div>

            <div>
                <h4>Institucional</h4>
                <ul class="uk-list uk-text-left">
                    <li><a href="<?= BASE ?>">Área do cliente</a></li>
                    <li><a href="<?= BASE ?>">Trabalhe conosco</a></li>
                    <li><a href="<?= BASE ?>">Dúvidas frequentes</a></li>
                    <li><a href="<?= BASE ?>">Termos de uso</a></li>
                    <li><a href="<?= BASE ?>">Política de privacidade</a></li>
                </ul>
            </div>

            <div>
                <h4>Redes Social</h4>
                <a href="#" target="_blank" class="uk-icon-button" uk-icon="instagram"></a>
                <a href="#" target="_blank" class="uk-icon-button" uk-icon="facebook"></a>
                <a href="#" target="_blank" class="uk-icon-button" uk-icon="youtube"></a>
                <div class="uk-margin-large-top">
                    <img src="<?= BASE_UPLOADS ?>footer/site-security.png" alt="" width="140px">
                </div>
            </div>

        </div>
    </div>
</footer>

<script>
$('.liloo-whatsapp').on('click', function() {
    $('#liloo-window-whatsapp').toggle()
    $('.icon-whatsapp').toggle()
    $('#icon-close').toggle()
    $('[name="contact_whastapp"]').focus()
    return false
})

$('.icon-whatsapp').on('click', function(){
    lilooJS.Event({
        action: 'click_btn_whatsapp',
        path: 'themes/<?= $__CONF__['theme'] ?>/ajax/ContactSystem',
        data: 'click'
    })    
})

$('.liloo-click-phone').on('click', function(){
    lilooJS.Event({
        action: 'click_btn_phone',
        path: 'themes/<?= $__CONF__['theme'] ?>/ajax/ContactSystem',
        data: 'phone'
    })    
})
</script>