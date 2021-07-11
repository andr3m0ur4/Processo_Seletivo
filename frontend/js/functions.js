// classe para criar um elemento
class Element {
    constructor(name, className) {
        this.element = $(`<${name}>`)
        this.element.addClass(className)
    }

    get() {
        return this.element
    }

    setBody(body) {
        this.element.append(body)
    }
}

// classe para armazenar o JWT
class JWT {
    constructor() {
        $.get('http://localhost:8080/jwt/get')
            .done(data => this.jwt = data)
    }

    get() {
        return this.jwt
    }
}

let jwt = new JWT()

// formatar currency
const formatter = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
})

$(() => {
    
    $('#text-search').keydown(e => {
        if ((e.keyCode === 13 || e.keyCode === undefined) && $(e.target).val()) {
            const search = $(e.target).val()
            searchProduct(search)
        }
    })

    $('#btn-search').click(() => {
        $('#text-search').keydown()
    })

})

// requisição ajax com o valor digitado pelo usuário
const searchProduct = query => {
    const data = { q: query }

    $.ajax({
        url: 'http://localhost:8080/products/name',
        method: 'GET',
        data,
        headers: jwt.get(),
        success: data => {
            $('.results').text('')

            if (!data.error && data.products.length > 0) {
                fillResults(data.products)
            } else {
                notResults()
            }
        }
    })
}

// preencher a view com os dados da consulta
const fillResults = products => {
    products.forEach(product => {
        const card = new Element('div', 'card mt-2')
        const ul = new Element('ul', 'list-group list-group-flush')

        const liPrice = new Element('li', 'list-group-item')
        const h5Price = new Element('h5', 'card-title')
        h5Price.setBody('Preço do produto')
        const pPrice = new Element('p', 'card-text')
        pPrice.setBody(`${formatter.format(product.price)}`)

        const liLastDate = new Element('li', 'list-group-item')
        const h5LastDate = new Element('h5', 'card-title')
        h5LastDate.setBody('Última Data de Alteração do Preço')
        const pLastDate = new Element('p', 'card-text')
        pLastDate.setBody(product.last_price_update_date)

        card.setBody(ul.get())
        ul.setBody(liPrice.get())
        ul.setBody(liLastDate.get())
        liPrice.setBody(h5Price.get())
        liPrice.setBody(pPrice.get())
        liLastDate.setBody(h5LastDate.get())
        liLastDate.setBody(pLastDate.get())

        $('.results').append(card.get())
    })
}

// exbir mensagem que não há resultados
const notResults = () => {
    const card = new Element('div', 'card mt-2')
    const body = new Element('div', 'card-body')
    const h5 = new Element('h5', 'text-title text-center')

    card.setBody(body.get())
    body.setBody(h5.get())
    h5.setBody('Nenhum resultado encontrado!')

    $('.results').append(card.get())
}