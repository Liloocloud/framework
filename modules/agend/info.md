# Módulo Agend

#### Descrição
<hr>
Responsável por realizar agendamento de clientes. Este módulo requer acoplamento com o módulo "clients" (se não estiver instalado , instale)

#### Como funciona?
1. Configure sua agenda
2. Informe os tipo de serviços oferecidos e os horários disponíveis
3. Envie um Link do agendamento para seus clientes
4. O cliente acessa o link fornecido 
5. O cliente visualiza os horários disponíveis e escolhe o que for melhor
6. Confirmação do agendamento por formulário (nome, e-mail e etc.)
7. Opcional (Enviar confirmação ao cliente)

##### 1. Configure sua agenda
Opções que estarão disponíveis para a configuração:
• 

#### Tipos de agendamento / Ideal para:
- Saúde e Assistência Médica – Hospitais, Clínicas Médicas e Odontológicas, Fisioterapia e etc.
- Gastronomia e Entretenimento – Bares, restaurantes, casas de eventos e etc.
- Escolas, Universidades, Professores, Cursos, treinamentos e conferências
- Cuidados Pessoais – Salões de beleza, Barbearias e Spa
- Eventos e Cultura – Personal trainers, Academias e etc.
- serviços públicos – Cartórios, ONG’s, Repartições públicas e etc.
- Terapeutas 
- Serviços veterinários
- Time de vendas
- Recrutamento e Recursos Humanos
- Aluguéis/Venda de equipamentos
- Profissionais de reparos
- Limpeza de casas e serviço de limpeza
- Estúdios Musicais com salas para ensaio

#### Recursos
- Agendamento direto pelo site
- Notificação de agendamento por e-mail
- Envio do link pelo Whatsapp ou e-mail
- Landingpage
- Integrações para videoconferência
- Painel Dashboard
- Cadastro de membros da equipe (colaboradores por nível de acesso)
- Lembretes Automáticos por e-mail e SMS (ver plano SMS)

#### Tabela (Modulagem do banco de dados)
- Id do cliente
- Nome
- E-mail
- Horário (Dia e Hora)
- Serviço ou finalidade
- Profissional (Colaborador cadastrado)

### Tabela do banco de Dados

| Nome | Tipo | Tamanho | Permitir NULL | Descrição | 
| :--- | :--- | :------ | :------------ | :-------- |
| agend_id | bigint | 11 | - | Índice auto_increment | 
| agend_client_id | bigint | 11 | - | ID da tabela do cliente | 
| agend_client_name | varchar | 255 | x | Nome para o cadastro do client (O cliente pode ou não existir) |
| agend_datetime | datetime | - | - | Data e hora do Agendamento | 
| agend_id | bigint | 11 | - | Índice auto_increment | 

#### Concorrentes
[Simples Agenda](https://www.simplesagenda.com.br/)
[Super SaaS](https://www.supersaas.com.br/)
[eAgenda](https://eagenda.com.br/)




