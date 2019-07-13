$(document).ready(function() {
    //Получаем регионы
    $.ajax({
        method: "POST",
        url: "/main/get_region"
    }).done(function(msg) {
        regions = JSON.parse(msg);
        $.each(regions, function(key, value) {
            $('#selectRegion').append($("<option></option>").attr("value", value.ter_id).text(value.ter_name)).trigger("chosen:updated");
        });
    });
    //Получаем города
    $('#selectRegion').change(function(event) {
        $('#districtTr').hide();
        regId = event.target.selectedOptions[0].value;
        if (regId == -1) return;
        $.ajax({
            method: "POST",
            url: "/main/get_cities",
            data: {
                regId: regId
            }
        }).done(function(msg) {
            cities = JSON.parse(msg);
            if (!cities.length > 0) return;
            $('#selectCity').find('option').remove();
            $('#selectCity').append($("<option></option>").attr("value", "-1").text("Выберите город .."));
            $.each(cities, function(key, value) {
                $('#selectCity').append($("<option></option>").attr("value", value.ter_id).text(value.ter_name)).trigger("chosen:updated");
            });
            $("#cityTr").show()
        });
    });
    //Получаем районы
    $('#selectCity').change(function(event) {
        cityId = event.target.selectedOptions[0].value;
        if (cityId == -1) return;
        $.ajax({
            method: "POST",
            url: "/main/get_districts",
            data: {
                cityId: cityId
            }
        }).done(function(msg) {
            districts = JSON.parse(msg);
            if (!districts.length > 0) return;
            $('#selectDistrict').find('option').remove();
            $('#selectDistrict').append($("<option></option>").attr("value", "-1").text("Выберите район .."));
            $.each(districts, function(key, value) {
                $('#selectDistrict').append($("<option></option>").attr("value", value.ter_id).text(value.ter_name)).trigger("chosen:updated");
            });
            $("#districtTr").show();
        });
    });
    //Валидация формы
    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Вы должны выбрать из списка");
    $('form[id="loginForm"]').validate({
        rules: {
            name: 'required',
            email: {
                required: true,
                email: true,
            },
            selectRegion: {
                valueNotEquals: "-1"
            },
            selectCity: {
                valueNotEquals: "-1"
            },
            selectDistrict: {
                valueNotEquals: "-1"
            }
        },
        messages: {
            name: 'Обьязательное поле',
            email: 'Введите правильную почту'
        },
        submitHandler: function(form) {
            register(form);
        }
    });
    //Отправка формы
    function register(form) {
        var $form = $(form);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize()
        }).done(function(json) {
            json = JSON.parse(json);
            alert(json.msg);
        }).fail(function() {
            alert("Ошибка отправки запроса на сервер!")
        });
    }
});