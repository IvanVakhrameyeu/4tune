$(document).ready(function() {
    $('.nvuti-amount').on("change paste keyup", function () {
        let win_amount = $('.nvuti-amount').val() / $('.nvuti-chance').val() * 100;
        $('.nvuti-win').text(win_amount.toFixed(2));
    });

    $('.nvuti-chance').on("change paste keyup", function () {
        let win_amount = $('.nvuti-amount').val() / $('.nvuti-chance').val() * 100;
        $('.nvuti-win').text(win_amount.toFixed(2) + " N");
        let min = Math.floor(parseFloat($('.nvuti-chance').val()) / 100 * 999999);
        let max = Math.floor(999999 - parseFloat($('.nvuti-chance').val()) / 100 * 999999);
        $('.nvuti-min').text('0-' + min);
        $('.nvuti-max').text(max + '-999999');
    });

    $('.nvuti-btn').click(function (e) {
        let chance = parseFloat($('.nvuti-chance').val());
        let amount = parseFloat($('.nvuti-amount').val());
        let stake = $('.nvuti-btn').attr('about');
        let data = {
            'chance': chance,
            'amount': amount,
            'stake': stake
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: './nvuti/setBet',
            data: data,
            dataType: 'json',
            async: true,
            success: function (response, status) {
                console.log(response);
                $('.hash-value').text(response.hash);
                $('.wallet-balance').text(response.balance)
            }
        });
    });
});
function change_input($this, $name) {
    switch ($this.type) {
        case "double":
            document.getElementById($name).value *= 2;
            break;
        case "half":
            document.getElementById($name).value /= 2;
            break;
        case "min":
            document.getElementById($name).value = 1;
            break;
        case "max":
            ($name == "count_game") ? document.getElementById($name).value = 1000 : document.getElementById($name).value = 95;
            break;
    }
    if($name == "count_game"){
        document.getElementById($name).value >1000? document.getElementById($name).value =1000:null;
    }    else{
        document.getElementById($name).value >95? document.getElementById($name).value =95:null;
    }
    if (document.getElementById($name).value < 1 || isNaN(document.getElementById($name).value)) {
        document.getElementById($name).value = 1;
    }
    $('.nvuti-chance').trigger("change");
}
