const button = document.querySelector('#headerNavButton');
const csrf_token = document.head.querySelector('meta[name="csrf-token"]');
let productCount = new Map();

button.onclick = function(){
    const nav = document.querySelector('#headerNavUl');
    if(nav.classList.contains('close')){
        nav.classList.remove('close');
        nav.classList.add('open');

    }
    else{
        nav.classList.remove('open');
        nav.classList.add('close');
    }
}

const addProductInput = (id) => {
    let input = document.querySelector(`#product-input-${id}`);
    input.value++;
    console.log(input.value);
    productCount.set(id, input.value);
    console.log(productCount);
}

const downSizeProductInput = (id) => {
    let input = document.querySelector(`#product-input-${id}`);
    if(input.value < 2) return false;
    input.value--;
    productCount.set(id, input.value)
}

async function sendServerAddProduct(id){
    try{
        let count = productCount.get(id);
        console.log(count);
        if(typeof count === "undefined"){
            productCount.set(id, 1);
            count = productCount.get(id);
        }
        let response = await fetch(`/user/basket/${id}/store`, {
            method: 'post',
            body: JSON.stringify({
                count: count
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrf_token.content
            }
        })
        if(response.ok){
            console.log('Продукт добавлен в корзину');
            return console.log(response.text());
        }else{
            console.log(response.status);
            return console.log(response.statusText);
        }
    }catch (e) {
        console.log(e);
    }
}
