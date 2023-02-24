lilooJQ.Event({
    action: 'test',
    path: 'modules/ads/dash/routes/categories/ajax',
    data: {term: 'test', id: 1, type: 'ads'},
    success: function(res){

        console.log(res.data)

    }
})