# Implementação de componente

```php
$tpl = new Components\Components('accordion', [
    'cache' => false,
    'data' => [
        ['title' => 'Título', 'text' => 'descrição']
    ]
], function ($res) {
    echo '<div class="uk-container uk-padding">';
    echo $res;
    echo '</div>';
});
```
