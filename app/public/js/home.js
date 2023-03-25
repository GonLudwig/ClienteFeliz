let table = $('#clienteTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'pdfHtml5'
    ],
    ajax: {
        url: '/cliente'
    },
    columns: [
        {data: 'id'},
        {
            data: null,
            render: function (data, type, row) {
                return `<input class="input-group-text" name="nome${data.id}" value="${data.nome}">
                    <div class="dadosPdf">${data.nome}</div>`
            }
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<input class="input-group-text" name="telefone${data.id}" value="${data.telefone}">
                    <div class="dadosPdf">${data.telefone}</div>`
            }
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<input class="input-group-text" name="email${data.id}" value="${data.email}">
                    <div class="dadosPdf">${data.email}</div>`
            }
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<input class="input-group-text" name="ultima_compra${data.id}" value="${data.ultima_compra}">
                    <div class="dadosPdf">${data.ultima_compra}</div>`
            }
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<button class="btn btn-primary" onclick="editar(${data.id})">Editar</button>`
            }
        },
        {
            data: null,
            render: function (data, type, row) {
                return `<button class="btn btn-danger" onclick="excluir(${data.id})">Excluir</button>`
            }
        }
    ],
    order: [[0, 'desc']],
})

function excluir(id) {
    if (confirm("Deseja confirma ação ?")) {
        $.ajax({
            url: `/cliente/${id}`,
            method: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .done(function () {
            table.ajax.reload()
        })
        .fail(data => {
            let response = data.responseJSON
            alert(Object.values(response.errors)[0][0] ?? response.message)
        })
    }
}

function editar(id) {
    $.ajax({
        url: `/cliente/${id}`,
        method: "PUT",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            nome: $(`input[name=nome${id}]`).val(),
            telefone: $(`input[name=telefone${id}]`).val(),
            email: $(`input[name=email${id}]`).val(),
            ultima_compra: $(`input[name=ultima_compra${id}]`).val(),
        }
    })
    .done(function () {
        table.ajax.reload()
    })
    .fail(data => {
        let response = data.responseJSON
        alert(Object.values(response.errors)[0][0] ?? response.message)
    })
}

function criar(element) {
    let paiElement = $(element).parent()
    $.ajax({
        url: '/cliente',
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            nome: paiElement.children('input[name=nome]').val(),
            telefone: paiElement.children('input[name=telefone]').val(),
            email: paiElement.children('input[name=email]').val(),
            ultima_compra: paiElement.children('input[name=ultima_compra]').val(),
        }
    })
    .done(function (data) {
        alert(data.message)
        paiElement.children('input[name=nome]').val("")
        paiElement.children('input[name=telefone]').val("")
        paiElement.children('input[name=email]').val("")
        paiElement.children('input[name=ultima_compra]').val("")
        table.ajax.reload()
    })
    .fail(data => {
        let response = data.responseJSON
        alert(Object.values(response.errors)[0][0] ?? response.message)
    })
}