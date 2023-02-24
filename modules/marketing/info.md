### Reports 
Requisitos para implementação
- Criar component Card em Javascript para mostrar dados básico como sessões, Whatsapp e etc
- Criar modal padrão para carregar os dados dos Canais 

Cases AJAX:

Ideias:
• Permitir que o usuário crie suas campanhas e, ao finalizar a criação 
o sistema lhe fornece um link com serão coletadas todas as informações 
importantes para analise de desempenho das campanhas

• Coletar informações de dispositivos 

• Implementação do QR-Code

• Coletar informações de localização com as bibliotecas GeoLocation do navegador

• A validação do link nunca usado antes, da-se ao primeiro carregamento dele.

• Configurar mensagens do whatsapp para receber de acordo com os links respectivos

Banca de dados:
- Contatos via Whatsapp
- -- Telefone | key => contact_whatsapp
- -- Mensagem | value

• Controladores
contact_id // Indice autoincrement
contact_account_id // Conta de usuário

contact_channel // Canal, se é google, facebook, qr-code e etc
- Fonte do contato (label)
- Campanha Facebook ads
- Campanha Google ads
- Cliente ativo
- Contato pelo site
- Contato por e-mail
- Contato por telefone
- E-mail marketing
- facebook
- Feiras e eventos
- Google e outros buscadores
- Indicado por cliente
- Indicado por parceiro
- Linkedin ads
- Otimização SEO
- Prospecção ativa
- Redes sociais

contact_event // Guarda o tipo de evendo, se click, session, scroll, load, reload e etc
- click_id (Clique no elemento com "id" respectivo)
- click_class (Clique no elemento com "class" respostivo)
- send_form (Envio do formulário)
- page_load (Carregamento de uma página)
- element_view (Quando um determinado elemento se torna visivel numa página)

contact_method // QUal o metodo que recebeu o contato se form, ligação, SMS, contato whatsapp etc.
- Clique no botão do whatsapp (Aqui o cliente ainda não efetivou um contato)
- Iniciou um conversa pelo Whatsapp (Aqui o cliente deixou o telefone e clicou em iniciar conversa)
- Clique no botão ver telefone (Aqui o cliente clicou no tefone, mas não efetivou uma liagação ainda)
- Clique no telefone para ligar (Indica que o cliente clicou em ligar no respectivo telefone)
- Clique no icone do:
- -- Facebook (Indica que o cliente se interessou em ver a rede social "facebook")
- -- Assim sucessivamente para as outras redes sociais

• Dados
contact_name // Nome do contato
contact_email // E-mail do usuário
contact_message // Mensagem
contact_subjetc // Assunto do e-mail
contact_phone // Telefone do contato
contact_attachment // Arquivo em anexo em caso de formulário
contact_link // link que enviou o contato
contact_whatsapp // Whatsapp do contato
contact_segment // Qual o segmento do usuário (interesse)
contact_office // Cargo do contato

• Dados de localização (Captura por form ou automatico por Lib)
contact_address_zipcode // CEP
contact_address // Endereço do contato
contact_address_number // Número
contact_address_complement // Complemento
contact_address_district // Bairro
contact_address_city // Cidade 
contact_address_state // Estado (Sigla)
contact_address_country // Pais

• Rede sociais
contact_network_facebook // O usuário preenche a conta do facebook
contact_network_instagram // Idem acima
contact_network_youtube // Idem acima
contact_network_linkedin // Idem acima
contact_network_tiktok // Idem acima
contact_network_twitter // Idem acima
contact_network_pinterest // Idem acima
contact_network_skype // Idem acima
contact_network_snapchat // Idem acima
contact_network_telegram // Idem acima

• Análise
contact_quality // O usuário da plataforma analisa se o cliente é bom ou ruim (Antigo validade)
contact_sale // Se realizou a venda ou não. O usuário da plataforma indica pra ter noção de como estão as vendas

• Dados ocultos 
contact_ip // Guarda o IP de acesso do usuário
contact_device // Tenta recuperar o dispositivo que o usuário está acessando (Lib device detect)
contact_registered // Data e hora de registro do contato
contact_modify // Data de modificação

--------------
spotify
qzone - 
reddit - 
tumblr - 
badoo - Semelhante ao tinder
tagged - semelhante ao tinder

wechat - parecido com whatsapp

vkontakte - Tipo um facebook Russo

dailymotion - Semelhante ao Youtube

habbo - hotel virtual semelhante a uma rede social

clubhouse - Clubhouse é um aplicativo de rede social para bate-papo com áudio somente para convidados.

twitch - Twitch é um serviço de streaming de vídeo ao vivo que se concentra em streaming ao vivo de videogame, incluindo transmissões de competições de esportes eletrônicos. Além disso, oferece transmissões de música, conteúdo criativo e mais recentemente, streams "na vida real".


