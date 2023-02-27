# Accordion [Components]
Componentes acordiom ideal para intefaces de faq's 

## Exemplo de aplicação
Nesse exemplo vamos usar o componente com informações vindas do banco de dados

```php
new \Components\Accordion([
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
