// Listagem drag and drop das pipelines
$("#pipeline-listing").sortable({
    connectWith: "#pipeline-listing",
    cursor: 'move',
    scrollSensitivity: 30,
    scrollSpeed: 40,
    tolerance: "pointer",
    // cursorAt: { left: 5 },
    // disabled: true,
    // distance: 5,

    over: function( event, ui ) {
        $('#'+ui.item.attr('id')).addClass('rotate')
    },

    out: function( event, ui ) {
        $('#'+ui.item.attr('id')).addClass('rotate-reverse')
    },

    update: function () {

        let Pipeline = $(this).attr("id");
        let MatrixOrder = [];

        $(this).children('div').each(function (idx, elm) {
           MatrixOrder.push(elm.id)
        });

        console.log(MatrixOrder)

        // lilooV3.Event({
        //     action: 'alter/pipelines',
        //     path: AjaxPath,
        //     data: JSON.stringify({MatrixOrder,Pipeline}),
        //     success: function(res){
        //         console.log(res)
        //     }
        // })
        
        $('[liloo-loader]').hide();
    }
}).disableSelection();






// $('button[type="submit"]').on('click', function(){
//     setInterval(function(){
//         document.location.reload(true)
//     }, 2000);
// })