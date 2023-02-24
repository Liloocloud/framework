
<div class="ll-breadcrumb">
	<h4>Controle de usuário</h4>
	<span>
		<a href="#new-user" uk-toggle class="uk-button uk-button-primary uk-button-xsmall">Adicionar usuário</a>
		<a href="#" class="uk-button uk-button-primary uk-button-xsmall">Gerar lista PDF</a>
	</span>
</div>

<div ll-grid>
	<div>
		<div ll-card>
			<div header>
				<h4>Busca e listagem de usuário</h4>
				<span>
					<a href="#" class="uk-button uk-button-primary uk-button-xsmall">Opções <i class="fas fa-sort-down"></i></a>
					<div uk-dropdown="mode: click; pos: bottom-right">
						<ul class="uk-nav uk-dropdown-nav">
							<li><a href="#" onclick="optionsList('default')">Padrão</a></li>
							<li><a href="#" onclick="optionsList('name:asc')">Nome Crescente</a></li>
							<li><a href="#" onclick="optionsList('name:desc')">Nome Decrescente</a></li>
							<li><a href="#" onclick="optionsList('id:asc')">ID Crescente</a></li>
							<li><a href="#" onclick="optionsList('id:desc')">ID Decrescente</a></li>
						</ul>
					</div>
				</span>
			</div>
			<div body>
				
				<form liloo-form-light data-liloo autocomplete="off" id="search_account_dash">
					<input type="hidden" name="path" value="modules/accounts/widgets/search">
					<input type="hidden" name="options">
					
					<div text>
						<input name="term" type="text" autofocus>
						<label>Busque por email, nome ou id do usuário</label>
					</div>
					<!-- <button class="ll-btn ll-btn-blue-100 ll-btn-md" type="submit"><i class="fas fa-search fa-sm"></i></button> -->
				</form>
				<hr>
				<div style="overflow: auto; height: 420px;">
					<table class="uk-table uk-table-striped uk-table-small uk-table-middle">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Moedas</th>
								<th>Registrado</th>
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


	</div>
	<div col-2>
		<div ll-card>
			<div header>
				<h4>Detalhes da Contas</h4>
				<span>
					<a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
					<a href="" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
					<a href="" class="uk-icon-button" uk-icon="menu"></a>
				</span>
			</div>
			<div body>
				<form liloo-form-light data-liloo autocomplete="off">
					<input type="hidden" name="path" value="modules/accounts/widgets/update">
					<input type="hidden" name="account_id" id="account_id">
					<div text>
						<input name="account_level" type="text">
						<label>Nível de permissão</label>
					</div>
					<div text>
						<input name="account_name" type="text">
						<label>Nome de usuário</label>
					</div>
					<div text>
						<input name="account_email" type="text">
						<label>E-mail da conta</label>
					</div>
					<div text>
						<input name="account_coin" type="text">
						<label>Total de moedas da conta</label>
					</div>
					<div text>
						<input name="account_status" type="text">
						<label>Status do usuário</label>
					</div>
					<button type="submit" class="uk-button uk-button-primary uk-button-xsmall">Atualizar conta</button>
				</form>
			</div>
		</div>

		<div ll-card>
			<div header><h4>Atualizar senha do usuário</h4></div>
			<div body>
				<p><em>Atenção! Ao criar uma nova senha a antiga não terá mais validade. Certifique se o usuário está
					correto!</em></p>
				<form liloo-form-light data-custom autocomplete="off">
					<input type="hidden" name="action" value="change_password_account_dash">
					<input type="hidden" name="custom-url" value="modules/accounts/ajax/AdminAccounts">
					<input type="hidden" name="account_id" id="account_id_pass">
					<input type="hidden" name="account_email" id="account_email_pass">
					<input type="hidden" name="account_name" id="account_name_pass">
					
					<div text>
						<input id="account_password" name="account_password" type="text">
						<label for="account_password">Digite a nova senha</label>
					</div>
					<button type="submit" class="ll-btn ll-btn-orange-100 ll-btn-sm">Atualizar senha</button>
				</form>
			</div>
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
		<form data-liloo autocomplete="off">
			<div class="uk-modal-body" uk-overflow-auto>
				<input type="hidden" name="path" value="modules/accounts/widgets/create">
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
						<input class="uk-input uk-form-small" name="account_email" type="email"
							placeholder="Melhor E-mail" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Moedas</label>
						<input class="uk-input uk-form-small" name="account_coin" type="number"
							placeholder="O padrão é 1200 moedas" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Status do usuário</label>
						<input class="uk-input uk-form-small" name="account_status" type="number"
							placeholder="Ativo 1 e Inativo 0" required>
					</div>
					<div>
						<label style="margin: 5px 0 0 0">Nível de permissão</label>
						<input class="uk-input uk-form-small" name="account_level" type="number"
							placeholder="O padrão é 8" required>
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

<!-- Modal para cadastrar novos usuários -->
<div id="new-user" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Cadastro de usuário</h2>
        </div>
        <div class="uk-modal-body">
            <form liloo-form-light data-liloo autocomplete="off">
				<input type="hidden" name="path" value="modules/accounts/widgets/create">
				<input type="hidden" name="account_id" id="account_id">
				<div text>
					<input name="account_level" type="text">
					<label>Nível de permissão</label>
				</div>
				<div text>
					<input name="account_name" type="text">
					<label>Nome de usuário</label>
				</div>
				<div text>
					<input name="account_email" type="text">
					<label>E-mail da conta</label>
				</div>
				<div text>
					<input name="account_coin" type="text">
					<label>Total de moedas da conta</label>
				</div>
				<div text>
					<input name="account_status" type="text">
					<label>Status do usuário</label>
				</div>
				<button type="submit" class="uk-button uk-button-primary uk-button-xsmall">Atualizar conta</button>
			</form>
        </div>
    </div>
</div>


<script>
	function item(item) {
		lilooJS.Event({
			action: 'click_btn_whatsapp',
			path: 'modules/accounts/widgets/details',
		})
	}
	function optionsList(list) {
		localStorage.setItem("orderlist", list)
		$('input[name=options]').val(list)
		$('#search_account_dash').submit()
		return false
	}
	var order = localStorage.getItem("orderlist")
	$('input[name=options]').val(order)
	$("a[class=dropdown-item]").on('click', function (e) {
		e.preventDefault()
	})

	function modalSet(userID) {
		lilooJS.Event({
			path: 'modules/accounts/widgets/getuser',
			data: userID
		})
		$('.callback').html(`
		<div id="user-${userID}" class="uk-modal-full" uk-modal>
			<div class="uk-modal-dialog">
				<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>  
				<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
					<div class="uk-background-cover" style="background-image: url('images/photo.jpg');" uk-height-viewport></div>
					<div class="uk-padding-large">
						<span class="get_user"></span>	
					</div>
				</div>

			</div>
		</div>
		`)
		UIkit.modal('#user-' + userID).show();
	}
	function editUser() {

	}
</script>