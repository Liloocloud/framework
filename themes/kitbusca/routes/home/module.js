import "../../../../assets/autocomplete/js/autocomplete.js"
import lilooAutoComplete from "../../../../assets/autocomplete/js/main.js"

/* Filtro de categorias  */
lilooAutoComplete({
    element: '#autoCompleteCategories',
    holder: 'O que deseja Buscar?',
    path: lilooV3.Root() + 'themes/kitbusca/ajax/categories.php'
})

/* Fitro de Cidades */
lilooAutoComplete({
    element: '#autoCompleteCities',
    holder: 'Localização',
    path: lilooV3.Root() + 'themes/kitbusca/ajax/cities.php'
})

