$(document).ready(function() {
    var category = [];
    var data = {};
    var array_php = return_array();
    var type = type_support();
    array_php.forEach((element, key) => {
        var categoria = {
            listLocation: element.title,
            header: `<h5>${element.title}</h5>`
        }
        category.push(categoria);
        var questions = [];
        element.questions.forEach(question => {
            var json = {
                name: question.title,
                id: question.id
            }
            questions.push(json)
        });
        var title = element.title;
        data[title] = questions;
    });
    var options = {
        data: data,
        getValue: "name",
        categories: category,
        list: {
            match: {
                enabled: true
            }
        },
        template: {
            type: "custom",
            method: function(value, item) {
                console.log(type);
                if (type == 1)
                    return `<p onclick="active_modal(${item.id})">${value}</p>`;
                else
                    return `<a href="#${item.name.replace(/ /g, '-')}">${value}</a>`;
            }
        }

    };
    $('#search').easyAutocomplete(options);

})

function active_modal(id) {
    var array = return_array();
    var pregunta;
    array.forEach(element => {
        element.questions.forEach(question => {
            if (question.id == id) {
                element['questions'] = question;
                pregunta = element;
            }
        });
    })
    console.log(pregunta);
    $("#title-modal").html(pregunta.title)
    $("#sub-title-modal").html(pregunta.questions.title)
    $("#description-modal").html(`${pregunta.questions.question} <br><br> ${pregunta.questions.question}`)
    $('#exampleModal').modal('show');
}