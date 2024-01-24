const start = document.getElementById('start')
const end = document.getElementById('end')
const price = document.getElementById('price')
start.addEventListener('change', (e) => {
    end.setAttribute("min", start.value);
    if(start.value > end.value){
        end.value = start.value
    }
})

function updatePrice(p){
    var Dstart = new Date(start.value)
    var Dend  = new Date(end.value)
    var difference = Dend.getTime() - Dstart.getTime();
    var days = Math.ceil(difference / (1000 * 3600 * 24));

    const finalPrice = days*p

    price.innerText = isNaN(finalPrice) ? "0€" : String(finalPrice) +"€";


}