<div class="uk-grid-small" uk-grid>
	<div class="uk-width-expand@m">

		<!-- Form buscador -->
		<div id="form-search" class="uk-margin-small-bottom">
			<form data-custom autocomplete="off">	
				<input type="hidden" name="action" value="search_account_dash">
				<input type="hidden" name="custom-url" value="_Modules/accounts/Ajax/AdminAccounts">
				<div class="uk-grid-collapse" uk-grid>
					<div class="uk-width-expand@s">
						<input class="uk-input uk-form" name="term" type="text" placeholder="Busque por email, nome ou id do usuário" required autofocus>
					</div>
					<div class="uk-width-1-4@s">
						<button type="submit" class="uk-button uk-button-primary uk-button uk-width-1-1">Buscar usuário</button>
					</div>
				</div>
			</form>
		</div>

		<!-- LIstagem com paginação -->
		<div class="uk-card uk-card-default uk-card-body">
			<div class="uk-margin-bottom" uk-grid>
				<h3 class="uk-width-expand@m uk-card-title">Lista de usuários</h3>
				<a class="uk-width-1-4@m uk-button uk-button-primary uk-button-small" href="#modal-overflow" uk-toggle>Novo usuário</a>
			</div>
			<div class="uk-overflow-auto" style="overflow: auto; height: 420px">
				<table class="uk-table uk-table-divider">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Moedas</th>
							<th>Regitrado</th>
						</tr>
					</thead>
					<tbody id="list_table">
						#list_table#
					</tbody>
				</table>
			</div>
			<div id="pagination">#pagination#</div>
		</div>

	</div>
	<div class="uk-width-1-3@m">
		
		<!-- Atualização de informações de conta -->
		<div class="uk-card uk-card-default uk-card-body uk-margin-small">
			<h3 class="uk-card-title">Detalhes da Conta <span class="account_id_text"></span></h3>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="update_account_dash">
				<input type="hidden" name="custom-url" value="_Modules/accounts/Ajax/AdminAccounts">
				<input type="hidden" name="account_id" id="account_id">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>					
					<div>
						<label style="margin: 5px 0 0 0">Nível de permissão</label>
						<input class="uk-input uk-form-small" id="account_level" name="account_level" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Nome de usuário</label>
						<input class="uk-input uk-form-small" id="account_name" name="account_name" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">E-mail da conta</label>
						<input class="uk-input uk-form-small" id="account_email" name="account_email" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Total de moedas da conta</label>
						<input class="uk-input uk-form-small" id="account_coin" name="account_coin" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Status do usuário</label>
						<input class="uk-input uk-form-small" id="account_status" name="account_status" type="text">
					</div>					
					<div style="margin: 5px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Conta</button>
					</div>
				</div>
			</form>
		</div>

		<!-- Form de atualização de senha do usuário -->
		<div class="uk-card uk-card-default uk-card-body">
			<h3 class="uk-card-title">Atualizar senha do usuário <span class="account_id_text"></span></h3>
			<p><em>Atenção! Ao criar uma nova senha a antiga não terá mais validade. Certifique se o usuário está correto!</em></p>
			<div id="callback-alert-password"></div>
			<form data-custom autocomplete="off">		
				<input type="hidden" name="action" value="change_password_account_dash">
				<input type="hidden" name="custom-url" value="_Modules/accounts/Ajax/AdminAccounts">
				
				<input type="hidden" name="account_id" id="account_id_pass">
				<input type="hidden" name="account_email" id="account_email_pass">
				<input type="hidden" name="account_name" id="account_name_pass">

				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>					
					<div>
						<label style="margin: 5px 0 0 0">Nova senha de usuário</label>
						<input class="uk-input uk-form-small" name="account_password" type="text">
					</div>				
					<div style="margin: 5px 0 0 0">
						<button type="submit" class="uk-button uk-button-primary uk-button-small">Atualizar Senha</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>


<!-- Modal para criar novas usuários -->
<div id="modal-overflow" uk-modal>
	<div class="uk-modal-dialog">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="uk-modal-header">
			<h3 class="uk-modal-title">Novo usuário</h3>
			<div class="callback-alert"></div>
		</div>
		<form data-custom autocomplete="off">
			<div class="uk-modal-body" uk-overflow-auto>
				<input type="hidden" name="action" value="create_account_dash">
				<input type="hidden" name="custom-url" value="_Modules/accounts/Ajax/AdminAccounts">
				<div class="uk-grid-collapse uk-child-width-1-1@m" uk-grid>
					<div>
						<label style="margin: 5px 0 0 0">Nome de usuário</label>
						<input class="uk-input uk-form-small" name="account_name" type="text" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Sobre Nome do usuário</label>
						<input class="uk-input uk-form-small" name="account_lastname" type="text">
					</div>
					<div>
						<label style="margin: 5px 0 0 0">E-mail</label>
						<input class="uk-input uk-form-small" name="account_email" type="email" placeholder="Melhor E-mail" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Moedas</label>
						<input class="uk-input uk-form-small" name="account_coin" type="number" placeholder="O padrão é 1200 moedas" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Status do usuário</label>
						<input class="uk-input uk-form-small" name="account_status" type="number" placeholder="Ativo 1 e Inativo 0" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Nível de permissão</label>
						<input class="uk-input uk-form-small" name="account_level" type="number" placeholder="O padrão é 8" required>
					</div>
				</div>
			</div>
			<div class="uk-modal-footer uk-text-right">
				<button class="uk-button uk-button-default uk-modal-close" type="button">Fechar</button>
				<button class="uk-button uk-button-primary" type="submit">Criar Conta</button>
			</div>
		</form>
	</div>
</div>







<div class="callback"></div>
<script>
	function item(item){
		console.log('Clicou em '+item)
		Flex.RequestServer(
			'select_account_dash',
			'_Modules/accounts/Ajax/AdminAccounts',
			item,
			true
			)
	}
</script>