let count = 1;
document.querySelector('.product__amount').value = count;

function increment() {
    if(count < 10) {
        count++;
        document.querySelector('.product__amount').value = count;
    }
}

function decrement() {
    if(count > 1) {
        count--;
        document.querySelector('.product__amount').value = count;
    }
}