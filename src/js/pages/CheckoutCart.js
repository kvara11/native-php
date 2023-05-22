$(function() {

    var
    ShoppingCartFormEl = $('form.ShoppingCart'),
    UpdateCartEl;

    ShoppingCartFormEl.submit(function(e) {
        e.preventDefault();
    });

    var xhr;
    function refreshShoppingCart(serialized) {
        UpdateCartEl.text('Updating...');
        if (!serialized)
            serialized = ShoppingCartFormEl.serialize();
        try {
            xhr.abort();
        } catch (e) {}
        xhr = $.ajax({
            type: 'POST',
            url: window.location.href,
            data: serialized,
            dataType: 'html',
            success: function(data) {
                ShoppingCartFormEl.html(data);
                // ShoppingCartFormEl.find('select').skinnedSelect();
                var CartCount = 0;
                ShoppingCartFormEl.find('input[type="text"]').each(function() {
                    CartCount += parseInt($(this).val());
                });
                $('.cart-count').html('('+CartCount+')');
                addCartEvents();
            }
        });
    }

    function addCartEvents() {

        UpdateCartEl = ShoppingCartFormEl.find('.UpdateCart');
        UpdateCartEl.click(function(e) {
            e.preventDefault();
            refreshShoppingCart();
        });
        ShoppingCartFormEl.find('button').click(function(e) {
            e.preventDefault();
            var serialized = ShoppingCartFormEl.serialize()+'&'+$(this).attr('name')+'='+$(this).attr('value');
            refreshShoppingCart(serialized);
        });

    }

    addCartEvents();

});
