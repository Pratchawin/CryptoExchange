console.log("index webpage");
let endpoint = "https://api.binance.com/";

function forMatPrice(price) {
    const bath = 32.64;
    money = bath * parseInt(price);
    moneyfmt = (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return " ฿" + moneyfmt;
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
function getIndTopCoinData() {
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=BTCUSDT")
        .then(res => res.json())
        .then(data => {
            document.getElementById("btcsymbol").innerHTML = "BTC/THB";
            document.getElementById("btclastprice").innerHTML = forMatPrice(data["lastPrice"]);
            document.getElementById("btc24h").innerHTML = forMatPrice(data["highPrice"]);
            document.getElementById("btc24l").innerHTML = forMatPrice(data["lowPrice"]);
            document.getElementById("btcchange").innerHTML = data["priceChangePercent"];
            document.getElementById("btcchange").style.color = checkPercentPrice(data["priceChangePercent"]);
        })
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=ETHUSDT")
        .then(res => res.json())
        .then(data => {
            document.getElementById("ethsymbol").innerHTML = "ETH/THB";
            document.getElementById("ethlastprice").innerHTML = forMatPrice(data["lastPrice"]);
            document.getElementById("eth24h").innerHTML = data["highPrice"];
            document.getElementById("eth24l").innerHTML = data["lowPrice"];
            document.getElementById("ethchange").innerHTML = data["priceChangePercent"];
            document.getElementById("ethchange").style.color = checkPercentPrice(data["priceChangePercent"]);

        })
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=LTCUSDT")
        .then(res => res.json())
        .then(data => {
            document.getElementById("ltcsymbol").innerHTML = "LTC/THB";
            document.getElementById("ltclastprice").innerHTML = forMatPrice(data["lastPrice"]);
            document.getElementById("ltc24h").innerHTML = data["highPrice"];
            document.getElementById("ltc24l").innerHTML = data["lowPrice"];
            document.getElementById("ltcchange").innerHTML = data["priceChangePercent"];
            document.getElementById("ltcchange").style.color = checkPercentPrice(data["priceChangePercent"]);

        })
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=LRCUSDT")
        .then(res => res.json())
        .then(data => {
            console.log(data["lastPrice"])
            document.getElementById("glmsymbol").innerHTML = "LRC/THB";
            //forMatPrice(data["lastPrice"])
            fmt_price=data["lastPrice"]*37.5;
            document.getElementById("glmlastprice").innerHTML ="฿"+ fmt_price.toFixed(2);
            document.getElementById("glm24h").innerHTML = data["highPrice"];
            document.getElementById("glm24l").innerHTML = data["lowPrice"];
            document.getElementById("glmchange").innerHTML = data["priceChangePercent"];
            document.getElementById("glmchange").style.color = checkPercentPrice(data["priceChangePercent"]);

        })
}
setInterval(getIndTopCoinData, 1000)
function setCoinList() {
    var coin_list = ["BTC", "ETH", "APE", "ENS", "BNB", "BCH", "LTC", "SOL", "ADA", "GMT", "USDC", "NEAR", "ATOM", "EOS", "AXS", "QNT"];
    let tbl_show_data_list = document.getElementById("tbl_main_coin");
    let html = "";
    for (i = 0; i < coin_list.length; i++) {
        fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=" + coin_list[i] + "USDT")
            .then(res => res.json())
            .then(data => {
                count = 0;
                color = '';
                for (j = 1; j <= 1; j++) {
                    lastPrice = forMatPrice(data["lastPrice"]);
                    marketCap = forMatPrice(data["count"]);
                    if (data["priceChangePercent"] < 0) {
                        color = 'red';
                    } else {
                        color = 'green';
                    }
                    let main_data = `
                <tr>
                    <td class="td-dtt-ind">${data["symbol"]}</td>
                    <td class="td-dtt-ind">${lastPrice}</td>
                    <td class="td-dtt-ind set-color" style='color:${color}' id='td_percent_change${data["symbol"]}'>${data["priceChangePercent"]}</td>
                    <td class="td-dtt-ind cnn-market-cap">${marketCap}</td>
                </tr>
                `;
                    html += main_data;
                    tbl_show_data_list.innerHTML = html;
                }
            })
    }
}
setCoinList();
setInterval(setCoinList, 1000)