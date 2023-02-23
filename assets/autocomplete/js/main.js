export default function lilooAutoComplete(Obj) {

  if(!Obj){ Obj = {} }
  let path = !Obj.path ? lilooV3.Root() + `assets/autocomplete/ajax/cities.php` : Obj.path
  let character = !Obj.character ? 2 : Obj.character
  let holder = !Obj.holder ? 'Digite sua busca' : Obj.holder
  let element = !Obj.element ? '[liloo-input-autocomplete]' : Obj.element

  let iAC = document.querySelector(element)
  iAC.setAttribute('dir', 'ltr')
  iAC.setAttribute('spellcheck', 'false')
  iAC.setAttribute('autocorrect', 'off')
  iAC.setAttribute('autocomplete', 'off')
  iAC.setAttribute('autocapitalize', 'off')
  iAC.setAttribute('maxlength', '2048')
  iAC.setAttribute('tabindex', '1')

  const autoCompleteJS = new autoComplete({
    selector: element,
    threshold: character,
    // debounce: 200,
    placeHolder: holder,
    data: {

      src: async (query) => {
        if (query) {
          let url = path + `?city=${query}`
          const response = await fetch(url)
          return await response.json()
        }
      },
      // cache: true,
      // keys: ["cidade"],

    },

    resultsList: {
      tag: "ul",
      id: "autoComplete_list",
      class: "results_list",
      position: "afterend",
      noResults: true,
      maxResults: 50,
      tabSelect: true,

      element: (list, data) => {
        const info = document.createElement("p");
        if (data.results.length) {
          info.innerHTML = `Encontramos <strong>${data.results.length}</strong> resultados`;
        } else {
          info.innerHTML = `Nenhum resultado para <strong>"${data.query}"</strong>`;
        }
        list.prepend(info);
      }

    },

    resultItem: {
      highlight: true,
    },

    events: {
      input: {
        selection(event) {
          let input = event.detail.selection
          autoCompleteJS.input.value = input.value[0]
          // autoCompleteJS.input.value = input.value[input.key]
          // console.log(input.value[input.key])     
        }
      }
    }
  })

 

}