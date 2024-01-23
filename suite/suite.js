const start = document.getElementById('start')
const end = document.getElementById('end')
start.addEventListener('change', (e) => {
    end.setAttribute("min", start.value);
    if(start.value > end.value){
        end.value = start.value
    }
})