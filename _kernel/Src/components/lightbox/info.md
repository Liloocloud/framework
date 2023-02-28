# Lightbox [Components]
Componente Lightbox bem interessante. Possui suporte a touch e també é responsivo. Seu uso é recomendado em casos onde há a necessidade de apresentação de fotos e imagens de galerias e portfólio.

## Exemplo de aplicação
1. Nesse exemplo vamos usar o componente com informações vindas do banco de dados.

```php
new \Components\Accordion([
    'cache' => false,
    'sql' => [
        'table' => 'tabela_do_banco',
        'where' => ['campo_da_condicao_where' => 'valor_a_ser_verificado'],
        'fields' => [
            'title' => 'campo_do_titulo',
            'text' => 'campo_da_descricao',
        ],
    ],
], function ($res) {   
    echo '<h2>Estou usando o template</h2>';
    echo $res;
});
```

- 'cache'       // Definição do uso da cache, por padrão false. Cria um pasta "cache/" na raiz do projeto
- 'sql/table'   // Indique a tabela que deseja consumir dados
- 'sql/where'   // Array com os campos e valores que deseja que sejam verificados
- 'sql/fields'  // Nos valores do array "title" e "text" indique os campos que irão corresponde-los
 
2. Nesse exemplo vamos usar o componente com informações escritas direto no código. Vale lembrar que esse modelo terá prioridade caso sejam utilizados os dois modos apresentados.
```php
new \Components\Accordion([
    'cache' => false,
    'data' => [
        ['title' => 'Primeiro Título', 'text' => 'Conteúdo do primeiro item'],
        ['title' => 'Segundo Título', 'text' => 'Conteúdo do segundo item'],
        ['title' => 'Terceiro Título', 'text' => 'Conteúdo do terceiro item'],
    ]
], function ($res) {   
    echo '<h2>Estou usando o template</h2>';
    echo $res;
});
```

- 'cache'       // Definição do uso da cache, por padrão false. Cria um pasta "cache/" na raiz do projeto
- 'data'        // Nos Valores do array "title" e "text" passe os valores que irão corresponde-los
 