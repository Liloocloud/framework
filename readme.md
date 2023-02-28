# Framework PHP Liloo

## Composer 
- Regra composer.json opcional
```json
"autoload": {
   "psr-4": {"Modules\\": "Modules/"}
}
```

## Generic Class
A Liloo possue recurso de leitura já com paginação inclusa. Basta utilizar as Classes Genéricas. Um exemplo abaixo dos métodos e do uso em geral. Pode ser bem interessante para casos mais complexo.

### 1. Generic\Read - Método join()
__join(string $inner_join, int $limit = null, string $statement = '')__

```php
$Test = new \Generic\Read(tb_1);
$Test->join(
    "INNER JOIN `" . tb_2 . "` ON " . tb_1 . ".field_1 = " . tb_2 . ".field_2
    WHERE " . tb_1 . ".field_1 =:var_statement", // Parte da sintaxe INNER JOIN + WHERE
    10, // Limite de resultados paginados
    "var_statement=value" // Statement passando chave e valor
);
```

