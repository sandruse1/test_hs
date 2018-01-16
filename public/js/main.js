let current_model = '';
let search_params = [];
let build_data = null;
$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: '/get_categories',
        contentType: false,
        cache: false,
        dataType: 'json',
        processData: false,
        success: function (response) {
            response.forEach(function(element) {
                let models = element.models.split(',');
                $(`<li  data-toggle="collapse" data-target="#${element.category}" class="collapsed active">
                    <a href="#">
                       <i class="fa fa-mobile fa-lg"></i> ${element.category}
                    </a>
                  </li>
                   <ul class="sub-menu collapse" id="${element.category}">
                    </ul>`).appendTo($('#menu-content'));
                models.forEach(function (model) {
                    $(`<li onclick="show_model(this, '${model}')"><a href="#">${model}</a></li>`).appendTo($('#'+ element.category));
                });
            });
        }
    });
});

function show_model(li, model) {


    $('.sub-menu li').css('background-color', '#181c20')
    $(li).css('background-color', 'grey');
    var data = new FormData();
    data.append('model', model);
    $.ajax({
        type: "POST",
        url: '/get_model',
        contentType: false,
        cache: false,
        dataType: 'json',
        processData: false,
        data:data,
        success: function (response) {
            build_data = response;
            build(build_data);
        }
    });
}

function build(response) {
    $('#tb_body').empty();
    $('#sec_data').empty();
    $('#name_price').empty();
    $('#img_div').empty();
    search_params = [];
    current_model = response[0].name_model;
    $("#view_art").css("display", "block");
    let sec_param = JSON.parse(response[0].second_data_model);
    let prime_param = JSON.parse(response[0].prime_data_model);
    let prime_data_article = JSON.parse(response[0].prime_data_article);
    let count = 1;

    $(`<h4 id="art_name">${response[0].name_model} ${response[0].title_article}</h4>
      <h4 id="art_price" class="">Price: ${response[0].price_article}</h4>`).appendTo($('#name_price'));

    $(`<img id="art_img" src="../public/images/${response[0].img_article}" alt="" width="300px" style="float:left; margin: 7px 7px 7px 0;" class="img-responsive">`
    ).appendTo($('#img_div'));

    for(let key in sec_param){
        if(sec_param.hasOwnProperty(key)){
            search_params.push("select"+count.toString());
            $(`<div class="col-md-6 " style="min-width: 200px; max-width: 200px">
                        <label for="select${count.toString()}">${key}</label>
                        <select id="select${count.toString()}" class="form-control" name="select${count.toString()}">
                        </select>
                    </div>`).appendTo($('#sec_data'));
            $.each(sec_param[key], function (i, item) {
                $('#select' + count.toString()).append($('<option>', { value: item, text : item }));
            });
            count = count + 1;
        }
    }

    $(`<div class="col-md-3" style="margin-top: 5px">
                 <button onclick="choose_model()" type="button" class="btn btn-primary"><i class="fa fa-hand-o-right"></i> Choose</button>
               </div>`).appendTo($('#sec_data'));

    for(let key in prime_param){
        if(prime_param.hasOwnProperty(key)){
            $(`<tr >
                        <td>${key}</td>
                        <td>${prime_param[key]}</td>
                    </tr>`).appendTo($('#tb_body'));
        }
    }
    for(let key in prime_data_article){
        if(prime_data_article.hasOwnProperty(key)){
            $(`<tr >
                        <td>${key}</td>
                        <td>${prime_data_article[key]}</td>
                    </tr>`).appendTo($('#tb_body'));
        }
    }

}

function choose_model() {
    let what = '%';
    let to_set = [];
    search_params.forEach(function (model) {
        what = what + $( "#"+model+" option:selected" ).text() + "%";
        to_set.push($( "#"+model+" option:selected" ).text())
    });
    var data = new FormData();
    data.append('model', current_model);
    data.append('what', what);
    $.ajax({
        type: "POST",
        url: '/choose',
        contentType: false,
        cache: false,
        dataType: 'json',
        processData: false,
        data:data,
        success: function (response) {
            let count = 1;
            build_data = response;
            build(build_data);
            to_set.forEach(function (set) {
                $('#select' + count.toString()).val(set);
                count = count + 1;
            })
        }
    });

}