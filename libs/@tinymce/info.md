
## Implementação
```js
tinymce.init({
    selector: '[liloo-tinymce]',
    height: 500,
    menubar: true,
    language: 'pt_BR'
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat',
    // content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
})
```
