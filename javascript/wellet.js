var bath_concur = document.getElementById("th_bath").innerText;
var static_th = document.getElementById("th_static").innerText;
var ckk_bath = document.getElementById("th_bath").innerHTML;
//document.getElementById("th_bath").innerHTML="Hello world";
//ฟังก์ชั่นเเสดงค่าเงิน BTC เเเละ Bath
function getIndTopCoinData() {
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=BTCUSDT")
        .then(res => res.json())
        .then(data => {
            if (bath_concur == "0฿") {
                document.getElementById("con_to_btc").innerHTML = "0.00000000 BTC";
            } else {
                document.getElementById("con_to_btc").innerHTML = data["lastPrice"] + "BTC";
                con_btc_to_thb = bath_concur / data["lastPrice"];
                th_con_to_int = parseFloat(bath_concur);
                tt_btc = th_con_to_int / (data["lastPrice"] * 32.64);
                if (tt_btc < parseInt(static_th)) {
                    document.getElementById("con_to_btc").innerHTML = parseFloat(tt_btc).toFixed(8) + " BTC";
                    document.getElementById("con_to_btc").style.color = "green";
                }
            }
        })
}
setInterval(getIndTopCoinData, 1000);


function show_coin_in_wellet(i) {
    console.log(i);
    var coin_name = document.getElementById("coinName" + i).innerText;
    console.log("Coin name:",coin_name);
    var coin_amount = document.getElementById("coin_amount" + i).innerText;
    console.log("Coin amount:",coin_amount);
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=" + coin_name + "USDT")
        .then(res => res.json())
        .then(data => {
            var tt_btc = coin_amount * data["lastPrice"];
            fmt_price = forMatPrice(tt_btc);
            document.getElementById("coin_price"+i).innerHTML = fmt_price + " THB";
        })
}
function refresh_coin() {
    for (var i = 1; i <= 10; i++) {
        setInterval(show_coin_in_wellet(i), 1000)
    }
}
setInterval(refresh_coin, 1000);


function forMatPrice(price) {
    const bath = 32.64;
    money = bath * parseFloat(price);
    moneyfmt = (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return moneyfmt;
}
function forMatPrice2(price) {
    money = parseFloat(price);
    moneyfmt = (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
    return moneyfmt;
}

function show_data_in_tbl_coin(i) {
    var coin_name = document.getElementById("coinName"+i).innerText;
    var coinPrice = document.getElementById("price"+i);
    var amount = document.getElementById("coinAmount"+i).innerHTML;
    var totalPice=document.getElementById("totalPrice"+i);
    var optPrice=document.getElementById("optPricet"+i);
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=" + coin_name + "USDT")
        .then(res => res.json())
        .then(data => {
            var totalVolumn=(data["lastPrice"]*32.64)*amount;
            coinPrice.innerHTML=forMatPrice(data["lastPrice"])+" THB";
            coinPrice.style.color='green';
            totalPice.innerHTML=forMatPrice2(totalVolumn)+" THB";
            optPrice.data["lastPrice"];
        })
}
function set_tbl_interval(){
    for (var i = 1; i <= 15; i++) {
        show_data_in_tbl_coin(i)
    }
}
setInterval(set_tbl_interval,1000);

function sclCoin() {
    var x = document.getElementById("mySelect").value;
    var formValue=document.getElementById("coinPrice");
    var inpCoin=document.getElementById("coinName");
    inpCoin.value=x;
    formValue.value=000000000;
    console.log("select ",x);
    fetch("https://api.binance.com/api/v3/ticker/24hr?symbol=" + x + "USDT")
        .then(res => res.json())
        .then(data => {
            console.log(data["lastPrice"]*32.64);
            formValue.value=parseFloat(data["lastPrice"]*32.64).toFixed(0);
        })
  }