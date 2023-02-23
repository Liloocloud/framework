<div class="uk-background-bottom-left uk-flex uk-flex-middle uk-background-cover uk-light" data-src="#uploads#fale-conosco.jpg" uk-img style="min-height: 500px;">
    <div class="uk-container uk-container-small uk-text-center">
        <div uk-grid>
            <div class="uk-width-expand@m">
                <h1 class="uk-margin-large-top">Estamos prontos para esclarecer suas dúvidas</h1>
                <p style="font-size: 22px" class="uk-margin-bottom">Preencha nosso formulário que retornaremos com muita satisfação</p>
            </div>
            <div class="uk-width-1-5@m"></div>
        </div>
    </div>
</div>


<div class="uk-background-bottom-right uk-background-norepeat" uk-parallax="bgy: -200" style="background-image: url(#uploads#patter_004.svg); min-height: 550px; background-size: 500px;">
    <div class="uk-container uk-container-small uk-padding-large uk-margin-large-bottom">

        <div uk-grid>
            <div class="uk-width-expand@m">
                <div class="uk-card uk-card-default uk-card-body" style="margin-top: -100px;">
                    <h2 class="uk-text-center">Preencha todas as informações</h2>

                    <form data-custom>
                        <input type="hidden" name="action" value="support_frontend">
                        <input type="hidden" name="custom-url" value="frontend/vamove/_php/Frontend">

                        <div class="uk-margin">
                            <div class="uk-form-label">Nome</div>
                            <input type="text" class="uk-input uk-form-medium" name="support_name" required>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-label">E-mail</div>
                            <input type="mail" class="uk-input uk-form-medium" name="support_email" required>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-label">Assunto</div>
                            <select name="support_subject" class="uk-select uk-form-medium" required>
                                <option value="">Selecione uma opção</option>
                                <option value="Sugestão">Sugestão</option>
                                <option value="Reportar problema">Reportar problema</option>
                                <option value="Dúvida sobre a utilização">Dúvida sobre a utilização</option>
                                <option value="Suporte Técnico">Suporte Técnico</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-form-label">Mensagem</div>
                            <textarea class="uk-textarea uk-form-medium" name="support_message" rows="3" required>Deixe sua mensagem aqui. Pedimos que seja o mais claro e específico(a) possível, assim poderemos te ajudar com maior rapidez!</textarea>
                        </div>

                        <button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-button-large">Enviar mensagem</button>
                    </form>

                </div>
            </div>
            <div class="uk-width-1-5@m"></div>
        </div>        

    </div>
</div>

<div class="callback"></div>
