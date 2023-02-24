```php
/**
 * 'CONF_CART'
 * Se 'true' Habilita o uso do carrinho incluindo item via Ajax
 * Se 'false' Desabilita o uso do carrinho redirecionando 
 * imediatamente para o checkout p/ finalizar a compra
 */

/**
 * 'CONF_RECURRING'
 * Se 'true' Habilita o recurso de pagamento recorrente, assim 
 * como formulários que possuem campos com informações de recorrencia
 * Se 'false' Desabilita a opção acima e utiliza o recuso 
 * de pagamento sem recorrencia
 */

/**
 * 'CONF_COINS'
 * Se 'true' após finalizar o pagamento e ser confirmada a transação
 * o sistema retorna o número de moedas para a coluna 'accout_coin'
 * da tabela nativa de usuários. Se 'false' o sistema apenas
 * envia uma mensagem de obrigado pela compra pedindo que
 * acompanhe as notificações no painel interno (dashboard)
 */

/**
 * 'CONF_DELIVERY'
 * Se 'true' o sistema entenderá que o produto/serviço
 * possui frete e é de carater tangível, liberando o setor de calcular frete
 * Se 'false' entenderá que o produto/serviço é de carater não tangível (Digital) 
 * desativando o setor de calculo de frete. Configuração recomendada penas para
 * lojas que possuem produtos tangíveis.
 */

/**
 * 'CONF_LOGGED'
 * Se 'false' permitir que o usuário realize pedido mesmo
 * pelo frontend sem estar logado. Se 'true' permite apenas
 * que o usuário faça pedido estando logado. Lembrando que 
 * para finalização da compra é obrigatório o login.
 */

/**
 * 'CONF_REDIRECTS'
 * Configurar as URLs de retorno de pagamento 
 * e também as URLs que redirecionam para a página de pagamento
 */

/** 
 * 'CONF_BUYERS'
 * Habilita a função de permitir o usuário que está comprando
 * escolher se quer usar os dados da conta existente ou cadastrar
 * novas informações do comprador. Selecionar usuário já existente ou 
 * cadastrar comprador em payment_buyers
 */

```

A Paste "exports" contém todos os recursos
necessários para exportar informações de pagamento 
para usar no frontend, assim como: tpls, funções javascript,
funcionalidades PHP, class PHP, funções PHP, CSS e HTML, assim
poderá usar os recursos da forma que desejar 
tornando o modulo genérico



Para ativar as funcionalidades do Módulo de pagamento 
é preciso entender alguns Detalhes.



Com a necessidade da portabilidade do projeto para várias linguagens. Existem algumas bibliotecas PHP que implementam a conversão de Markdown em HTML. Nesse artigo vamos falar sobre uma delas. A biblioteca do ThePHPLeague Commonmark. Para quem não conhece, o ThePHPLeague é um grupo de desenvolvedores PHP que cria vários projetos PHP testáveis. Alguns bem conhecidos como o omnipay, o fractal e o oauth2-client.

--- Arquivo JS
Se você não quiser usar o arquivo .js automaticamento no sistema
nomeie com um nome diferente de "javascript.js", assim o sistema
não irá incluir o arquivo


Para o pagamento alguns detalhes serão necessários

• Produto que esta comprando:
{
	"referenceCode" : "product001",
	"description" : "Pacote de 1200 Moedas",
	"signature" : "Gerar código",
	"price" : "valor Total",
}

• Dados do Comprador
{
	"merchantBuyerId" : "pegar id de account_id",
	"fullName" : "Nome Completo do comprador",
	"emailAddress" : "email do comprador",
	"phone" : "(13)33023740 (Repetir onde for preciso)",
	"document" : "cpf ou cnpj",
	"street1" : "Endereço 1",
	"street2" : "Complemento do endereço",
	"city" : "Cidade",
	"state" : "Estado",
	"country" : "BR",
	"postalCode" : "11020-000",
	"phone" : "(13)33023740" (pegar repedido)
}

• Informações do Cartão de Crédito
{
	"number" : "5502092758590037", (Número completo do cartão)
	"securityCode" : "703", (Código de segurança do cartão)
	"expirationDate" : "2027/12", (Validade do cartãop)
	"name" : "FLAVIO L SERRAO" (Nome Inpresso no Cartão)
}

