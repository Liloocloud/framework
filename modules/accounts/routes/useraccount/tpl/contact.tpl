<!-- Contato -->
<li id="form-contacts" class="uk-card uk-card-default uk-padding-small">
    <div class="uk-accordion-title">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h5>Dados de Contato</h5>
            <button class="upgrade ui yellow icon button"><i class="star icon"></i> Upgrade</button>
        </div>
    </div>
    <div class="uk-accordion-content">
        <div class="callback-message"></div>
        <div class="ui active callback-dimmer">
            <div class="ui text loader">Carregando</div>
        </div>               
        <form>
            <input type="hidden" name="action" value="portal/userpage/contacts">
            <input type="hidden" name="path" value="modules/portal/routes/userpage/ajax">
            <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>  
                <div>
                    <div class="ui fluid large icon input">
                        <i class="whatsapp icon"></i>
                        <input name="page_whatsapp" type="text" placeholder="whatsapp" value="#page_whatsapp#" liloo-mask-phone>
                    </div>
                </div>
                <div>
                    <div class="ui fluid large icon input">
                        <i class="phone icon"></i>
                        <input name="page_phone_1" type="text" placeholder="Telefone 1" value="#page_phone_1#" liloo-mask-phone>
                    </div>
                </div>
                <div>
                    <div class="ui fluid large icon input">
                        <i class="phone icon"></i>
                        <input name="page_phone_2" type="text" placeholder="Telefone 2" value="#page_phone_2#" liloo-mask-phone>
                    </div>
                </div>
            </div>
            <div class="uk-child-width-1-1@m uk-grid-small" uk-grid>  
                <div>
                    <div class="ui fluid large icon input">
                        <i class="mail icon"></i>
                        <input name="page_email" type="email" value="#page_email#" placeholder="E-mail">
                    </div>
                </div>
            </div>
            <div class="uk-margin-top">
                <button class="ui mini icon yellow button">Atualizar</button>
            </div>
        </form>
    </div>
</li>