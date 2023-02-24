<!-- Localização -->
<li id="form-location" class="uk-card uk-card-default uk-padding-small">
    <div class="uk-accordion-title">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h5>Endereço</h5>
            <button class="upgrade ui yellow icon button"><i class="star icon"></i> Upgrade</button>
        </div>
    </div>
    <div class="uk-accordion-content">
        <div class="callback-message"></div>
        <div class="ui active callback-dimmer">
            <div class="ui text loader">Carregando</div>
        </div>
        <form>
            <input type="hidden" name="action" value="portal/userpage/location">
            <input type="hidden" name="path" value="modules/portal/routes/userpage/ajax">
            <div class="uk-grid-small" uk-grid>  
                <div class="uk-width-1-3@m">
                    <div class="ui fluid large icon input">
                        <i class="search icon"></i>
                        <input type="text" name="page_address_zipcode" value="#page_address_zipcode#" placeholder="CEP" liloo-mask-zipcode>
                      </div>
                </div>
                <div class="uk-width-expand@m">
                    <div class="ui fluid large icon input">
                        <i class="map marker alternate icon"></i>
                        <input type="text" name="page_address" value="#page_address#" placeholder="Endereço">
                    </div>
                </div>
            </div>

            <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>  
                <div>
                    <div class="ui fluid large icon input">
                        <i class="sort numeric up icon"></i>
                        <input type="text" name="page_address_number" value="#page_address_number#" placeholder="Numero">
                    </div>
                </div>
                <div>
                    <div class="ui fluid large icon input">
                        <i class="info circle icon"></i>
                        <input type="text" name="page_address_complement" value="#page_address_complement#" placeholder="Complemento">
                    </div>
                </div>
                <div>
                    <div class="ui fluid large icon input">
                        <i class="map signs icon"></i>
                        <input type="text" name="page_address_district" value="#page_address_district#" placeholder="Bairro">
                    </div>
                </div>
            </div>

            <div class="uk-child-width-1-3@m uk-grid-small" uk-grid>  
                <div>
                    <div class="ui fluid large icon input">
                        <i class="sort numeric up icon"></i>
                        <input type="text" name="page_address_city" value="#page_address_city#" placeholder="Cidade">
                    </div>
                </div>
                <div>
                    <div class="ui fluid large icon input">
                        <i class="info circle icon"></i>
                        <input type="text" name="page_address_uf" value="#page_address_uf#" placeholder="Estado">
                    </div>
                </div>
                
            </div>

            <div class="uk-margin-top">
                <button class="ui mini icon yellow button">Atualizar</button>
            </div>
        </form>
    </div>
</li>