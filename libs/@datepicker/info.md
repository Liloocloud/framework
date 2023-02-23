# Datapicker
- Criado em 05.09.2022
- Site oficial da documentação:
[LInk Oficial Data Rande Picker](http://www.daterangepicker.com/)

## implementação
**Obs.:** Caso você queira utilizar o daterangepicker junto com a lib/@liloo/forms, sempre instancie abaixo do componente do form criado. Pelo fato de ser Virtual DOM a renderização ocorre em ordem de criação.

### 1. Modo simples
```js 
import "../../../../libs/@datepicker/datapicker";
```
<input type="text" liloo-daterange>

### 2. Modo com todos os recursos completos
```js 
import { lilooDatePicker } from "../../../../libs/@datepicker/datapicker"
lilooDatePicker.Range({
    element: '#liloo-datapicker'
})
```
