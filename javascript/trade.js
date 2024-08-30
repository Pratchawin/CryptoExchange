function getNewOrderFromTrade() {
    fetch("https://api.binance.com/api/v3/order")
        .then(res => res.json())
        .then(data => {
            console.log(data)
        })
}
getNewOrderFromTrade();
function setCoinList() {
    var coin_list = ["BTC", "ETH", "APE", "ENS", "BNB", "BCH", "LTC", "SOL", "ADA", "GMT", "USDC", "NEAR", "ATOM", "EOS", "AXS", "QNT"];
    let tbl_show_data_list = document.getElementById("tbl_main_coin");
    let html = "";
    for (i = 0; i < coin_list.length; i++) {
        fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=" + coin_list[i] + "USDT")
            .then(res => res.json())
            .then(data => {
                /* console.log(data);
                console.log(typeof data); */
                count = 0;
                color = '';
                for (j = 1; j <= 1; j++) {
                    //console.log(data["symbol"] + "" + data["lastPrice"] + "" + data["priceChangePercent"] + "" + data["count"]);
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
                </tr>
                `;
                    html += main_data;
                    tbl_show_data_list.innerHTML = html;
                }
            })
    }
}
setCoinList();
setInterval(setCoinList, 5000)
function forMatPrice(price) {
    const bath = 32;
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

var show_btc_price_in_trade_page=document.getElementById("show_btc_price");
function show_btc_price() {
    var coin_name=document.getElementById("get_coin_name2").innerText;
    console.log("Coin name:",coin_name);
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol="+coin_name+"USDT")
        .then(res => res.json())
        .then(data => {
            console.log(data);
            var con_price=forMatPrice(parseFloat(data["lastPrice"]));
            document.getElementById("c_price_thb").innerHTML=con_price;
            document.getElementById("c_price_usd").innerHTML=forMatPriceToUSD(parseFloat(data["lastPrice"]));
            document.getElementById("hight_price").innerHTML=forMatPrice(data["highPrice"]);
            document.getElementById("p_chang").innerHTML=parseFloat(data["priceChangePercent"]).toFixed(2)+"%";
            document.getElementById("low_price").innerHTML=forMatPrice(data["lowPrice"]);
            document.getElementById("c_volume").innerHTML=forMatComma(parseFloat(data["volume"]));

            document.getElementById("show_btc_price").innerHTML =forMatPrice(parseFloat(data["lastPrice"]));
            document.getElementById("show_btc_price").style.color = "black";
            document.getElementById("btc_inp_price").value=data["lastPrice"] * 32;
        })
}
function forMatPrice(price) {
    const bath = 32.64;
    money = bath * parseInt(price);
    moneyfmt = (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return " ฿" + moneyfmt;
}
function forMatPriceToUSD(price) {
    moneyfmt = (price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return " $" + moneyfmt;
}
function forMatComma(price) {
    moneyfmt = (price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return moneyfmt;
}
setInterval(show_btc_price, 1000);
var get_coin_name=document.getElementById("get_coin_name2").innerText;