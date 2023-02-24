<h1 class="uk-margin-bottom">Configurações do sistema de contas</h1>
<div id="config-cards" class="uk-child-width-1-1@m uk-grid-small" uk-grid>
    <div id="time_validation_account">
        <div class="uk-card uk-card-default uk-padding-small">
            <h3>Validação de Conta</h3>
            <p>Limite de tempo total para validação de conta por e-mail <em>(em minutos)</em></p>
            <form liloo-data-form>
                <input type="hidden" name="action" value="accounts/configs/update">
                <input type="hidden" name="path" value="modules/accounts/routes/configs/ajax">
                <input type="hidden" name="opt_meta" class="opt_meta">
                <input type="number" name="opt_values" id="limit-time-validate-email" class="uk-input uk-form-small uk-form-width-small opt_values">
                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-margin-small">Atualizar</button>
            </form>
        </div>
    </div>

    <div id="time_validation_password_redefine">
        <div class="uk-card uk-card-default uk-padding-small">
            <h3>Redefinição de Senha</h3>
            <p>Limite de tempo total para redefinição de senha de usuário <em>(em minutos)</em></p>
            <form liloo-data-form>
                <input type="hidden" name="action" value="accounts/configs/update">
                <input type="hidden" name="path" value="modules/accounts/routes/configs/ajax">
                <input type="hidden" name="opt_meta" class="opt_meta">
                <input type="number" name="opt_values" id="limit-time-validate-email" class="uk-input uk-form-small uk-form-width-small opt_values">
                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-margin-small">Atualizar</button>
            </form>
        </div>
    </div>

    <div id="time_validation_pin">
        <div class="uk-card uk-card-default uk-padding-small">
            <h3>Validação PIN</h3>
            <p>Limite de tempo total para validação do PIN SMS <em>(em minutos)</em></p>
            <form liloo-data-form>
                <input type="hidden" name="action" value="accounts/configs/update">
                <input type="hidden" name="path" value="modules/accounts/routes/configs/ajax">
                <input type="hidden" name="opt_meta" class="opt_meta">
                <input type="number" name="opt_values" id="limit-time-validate-email" class="uk-input uk-form-small uk-form-width-small opt_values">
                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-margin-small">Atualizar</button>
            </form>
        </div>
    </div>


    <div id="level_user_account">
        <div class="uk-card uk-card-default uk-padding-small">
            <h3>Nível Padrão de Conta</h3>
            <p>Define o level padrão de novos usuário não SUPERADMIN</p>
            <form liloo-data-form>
                <input type="hidden" name="action" value="accounts/configs/update">
                <input type="hidden" name="path" value="modules/accounts/routes/configs/ajax">
                <input type="hidden" name="opt_meta" class="opt_meta">
                <input type="number" name="opt_values" id="limit-time-validate-email" class="uk-input uk-form-small uk-form-width-small opt_values">
                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-margin-small">Atualizar</button>
            </form>
        </div>
    </div>
    
</div>