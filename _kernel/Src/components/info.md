# Componentes do Uikit + Twig
Gestão de componentes visuais Liloo Framework. O intuito é parecer como modelo conceitual do nodeJS onde você importa a biblioteca e já está disponível para criar o template. Nessa caso usamos o Uikit como framework Ui e o Twig como o gerenciador de template engine

Veja: 
[Uikit] (https://getuikit.com/docs/introduction)
[Twig] (https://twig.symfony.com/)


## Requisitos
- Libs twig para gestão dos tamplates
- Generic\ para leitura do banco ou função global _get_data_full|table()

## 1. Accordion
```php
$tpl = new Components\Components('accordion', [
    'data' => _get_data_full(), // Retorn da função ou o "$array" direto

    // Configurações globais do component
    'config' => [
        'animation' => 'slide', // slide, fade, scale
        'col' => 3, // Numero de colunas '<div>' flex box
        'cache' => true, // Se vai ativar a cache ou não
        'multiple' => false, // A aba do permanece aberta mesmo se outra for aberta
    ],

    // Implementando a "sync"
    'sync' => [
        'title' => 'field', // Indique o campo que possui título do item
        'desc' => 'field', // Indique o campo que possui a descrição do item
    ]
], function ($res) {
    echo '<div class="uk-container uk-padding">';
    echo $res;
    echo '</div>';
});
```

## 2. Lightbox
```php
(new Components\Components('lightbox', [
    'data' => _get_data_full(), // Retorn da função ou o "$array" direto

    // Configurações globais do component
    'config' => [
        'animation' => 'slide', // slide, fade, scale
        'col' => 3, // Numero de colunas '<div>' flex box
        'cache' => true, // Se vai ativar a cache ou não
        'width' => 800, // Largura padrão das imagens abertar na janela do lightbox
        'height' => 600, // Altura padrão das imagens abertar na janela do lightbox  
    ],

    // Implementando a "sync"
    'sync' => [
        'thumb' => 300, // Tamanho em pixel da imagens disponível
        'desc' => 'field', // Indique o campo que possui a descrição do item
        'alt' => 'field', // Indique o campo que possui o valor de alt (pode ser a descrição)
        'imgUrl' => 'url', // Url da imagem 
    ]
], function ($res) {
    echo '<div class="uk-container uk-padding">';
    echo $res;
    echo '</div>';
}));
```


