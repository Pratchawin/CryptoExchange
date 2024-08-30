
function refreshpage(){
    for (var i = 1; i <= 30; i++) {
        getIndTopCoinData(i);
    }   
}
function getIndTopCoinData(i) {
        var coin_name = document.getElementById("btcsymbol"+i).innerText;
        fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=" + coin_name + "USDT")
            .then(res => res.json())
            .then(data => {
                document.getElementById("btclastprice"+i).innerHTML = forMatPrice(data["lastPrice"]);
                document.getElementById("btcchange"+i).innerHTML = data["priceChangePercent"];
                document.getElementById("btcchange"+i).style.color = checkPercentPrice(data["priceChangePercent"]);
                document.getElementById("btcvolume"+i).innerHTML = forMatPrice(data["volume"]);
            })
}

function checkPercentPrice(percentPrice) {
    var color = ''
    if (percentPrice < 0) {
        color = 'red'
    } else {
        color = 'green'
    }
    return color;
}
function forMatPrice(price) {
    const bath = 32.64;
    money = bath * parseInt(price);
    moneyfmt = (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return " ฿" + moneyfmt;
}
function forMatPrice2(volume) {
    money = parseInt(volume);
    moneyfmt = (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return moneyfmt;
}
setInterval(refreshpage, 1000)

