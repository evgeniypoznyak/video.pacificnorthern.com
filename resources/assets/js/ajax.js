/**
 * Created by Evgeniy on 7/14/2017.
 */
$('#search-form').submit(function () {

    /*var _token = $('meta[name="csrf-token"]').attr('content');*/
    var search = $('#srch-term').val();

    $.ajax({
        type: "POST",
        data: {
            /* _token: _token,*/
            search: search
        },
        url: '/search',

        beforeSend: function () {
            $('#search-result-list').html('');
            // remove all search content here


        },

        success: function (res) {

            $('#search-result').show();


            $(res).each(function (index, value) {

                var fileName = value.split('.mp4');
                fileName = fileName[0].split('/');
                fileName = fileName.slice(-1)
                fileName = fileName[0];


                var template = '<a style="text-decoration: none"' +
                    'href="/watch?file=' + value + '" target="_blank">' +
                    '<span  class="ui-button myCustomList">' + fileName + '</span></a>';


                var new_div = $(template).hide();
                $('#search-result-list').append(new_div);

                // new_div.show(3000);
                //new_div.toggle("explode", "", 800);

                //new_div.toggle("puff, {}, 800);


                // new_div.toggle("drop", {}, 3000);


                new_div.slideDown(1000);


                //new_div.animate('explode');


                //new_div.show('slow');


                //$( '#search-result-list' ).append(template);





            })

        },

        error: function (error) {
            console.log(error);
        },



    });




    return false;

});