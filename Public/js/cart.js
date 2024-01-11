function qs(element) {
    return document.querySelector(element)
}
let $cartEvent = qs('#cart');

document.addEventListener('DOMContentLoaded', e=>{
    const cookies = document.cookie.split(';');
    let cookie = null;
    cookies.forEach(item => {
        if(item.indexOf('items')>-1){
            cookie = item;
        }
    })

    if(cookie != null){
        const count = cookie.split('=')[1];
        //console.log(count);
    }
});


$cartEvent.addEventListener('click', e => {
    updateCart();
})

function updateCart(){
    fetch('http://localhost/?/apiCarrito/Accion&action=mostrar')
    .then(res => res.json())
    .then(data =>{
        let $tableCount = qs('#tableCart');
        let priceTotal = '';
        let html = '';

        data.items.forEach(x => {
            html += `
                <li>
                    <a>
                        <span class="media-left media-icon">
                            <div style="height: 115px;width: 115px;">
                                <img src="${x.img}" style="width: 100%;height: 100%;object-fit: cover;">
                            </div>
                        </span>
                        <div class="media-body">
                            <input type="hidden" value="${x.id}" id="cartIdProduct"/>
                            <span class="block">Nombre: ${x.name}</span>
                            <span class="block">Precio: $${x.price}</span>
                            <span class="block">Cantidad: ${x.cantidad}</span>
                            <span class="block">SubTotal: $${x.subTotal}</span>
                            <div class="btns">
                                <button id="btnRemove">
                                    Quitar 1 del carrito
                                </button>
                            </div>
                        </div>
                    </a>
                </li>            
            `;
        });

        if(data.info.count == 0){
            priceTotal = `<li class="not-head" style="font-weight:bold;">No hay productos</li>`;
        }else{
            priceTotal = `<li class="not-head" style="font-weight:bold;">TOTAL: $${data.info.total} <br>CANTIDAD: ${data.info.count}</li>`;

        }

        $tableCount.innerHTML = html+ priceTotal;
        document.cookie = `items=${data.info.count}`; 

        document.querySelectorAll('li a div.media-body').forEach(btn=>{
            btn.addEventListener('click',e =>{
                let id = btn.children[0].value
                removeItemFromCart(id);
            })
        })
    })
}

let btnAdd = document.querySelectorAll('#btnAdd');
btnAdd.forEach(btn=>{
    btn.addEventListener('click',e =>{
        let id = btn.parentElement.parentElement.children[0].value
        addItemToCart(id);
    })
})

function addItemToCart(id){
    fetch(`http://localhost/?/apiCarrito/Accion&action=agregar&id=${id}`)
    .then(res => res.json())
    .then(data => {
        //console.log(data);
        updateCart();
    })
}

function removeItemFromCart(id){
    fetch(`http://localhost/?/apiCarrito/Accion&action=eliminar&id=${id}`)
    .then(res => res.json())
    .then(data => {
        updateCart();
    })
}