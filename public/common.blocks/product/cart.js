function addToCart() {
    $.ajax({
        method: 'post',
        dataType: 'html',
        success: swal({
            title: "Успешно!",
            text: "В корзину добавлено " + $('.product__amount').val() + " товаров",
            icon: "success",
            className: "product__alert",
        })
    })
}