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
                id: question.id,
                id_question: element.id
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
                if (type == 1)
                    return `<p onclick="active_modal(${item.id})">${value}</p>`;
                else {
                    var id = id_detail();
                    var base_url = base_url_php();
                    console.log(base_url);
                    if (id == item.id_question)
                        return `<a href="#${item.name.replace(/ /g, '-')}">${value} ${item.id_question}</a>`;
                    else
                        return `<a href="${base_url}support_detail.php?option=${item.id_question}#${item.name.replace(/ /g, '-')}">${value} ${item.id_question}</a>`;

                }
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
    $("#description-modal").html(`${pregunta.questions.answer}`)
    $('#exampleModal').modal('show');
}