<!-- Redes Sociais -->
<li id="form-socialmedia" class="uk-card uk-card-default uk-padding-small">
    <div class="uk-accordion-title">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h5>Redes Sociais</h5>
            <button class="upgrade ui yellow icon button"><i class="star icon"></i> Upgrade</button>
        </div>
    </div>
    <div class="uk-accordion-content">
        <div class="callback-message"></div>
        <div class="ui active callback-dimmer">
            <div class="ui text loader">Carregando</div>
        </div>
        <form>
            <input type="hidden" name="action" value="portal/userpage/socialmedia">
            <input type="hidden" name="path" value="modules/portal/routes/userpage/ajax">
            <div class="uk-child-width-1-2@m uk-grid-small" uk-grid>  
                <div>
                    <div class="ui fluid icon input">
                        <i class="instagram icon"></i>
                        <input name="page_instagram" type="text" value="#page_instagram#" placeholder="Instagram">
                      </div>
                </div>
                <div>
                    <div class="ui fluid icon input">
                        <i class="facebook icon"></i>
                        <input name="page_facebook" type="text" value="#page_facebook#" placeholder="Facebook">
                      </div>
                </div>
                <div>
                    <div class="ui fluid icon input">
                        <i class="youtube icon"></i>
                        <input name="page_youtube" type="text" value="#page_youtube#" placeholder="Youtube">
                      </div>
                </div>
                <div>
                    <div class="ui fluid icon input">
                        <i class="linkedin icon"></i>
                        <input name="page_linkedin" type="text" value="#page_linkedin#" placeholder="Linkedin">
                      </div>
                </div>
                <div>
                    <div class="ui fluid icon input">
                        <i class="tiktok uk-icon"></i>
                        <input name="page_tiktok" type="text" value="#page_tiktok#" placeholder="Tiktok">
                      </div>
                </div>              
            </div>
            <div class="uk-margin-top">
                <button class="ui mini icon yellow button">Atualizar</button>
            </div>
        </form>
    </div>
</li>