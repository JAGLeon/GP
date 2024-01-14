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
            priceTotal = `<li class="not-head priceTotal" style="font-weight:bold;"><div>TOTAL: $${data.info.total} <br>CANTIDAD: ${data.info.count}</div><div class="buyDiv" onclick="buyCart();" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-money"></i>COMPRAR</div></li>`;

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
        //console.log(data); //logica para preguntar cantidad en la bd
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


function buyCart(){
    fetch('http://localhost/?/apiCarrito/Accion&action=mostrar')
    .then(res => res.json())
    .then(data =>{
        let $tableCount = qs('.modal-body');
        let priceTotal = '';
        let html = '';
        let i = 1;
        data.items.forEach(x => {
            html += `
                <form method="POST" action="productos/compra">
                <div style="border-bottom: 1px solid #b3aeae;">
                    <div style="padding-left: 170px;">
                        <span class="media-left media-icon">
                            <div style="height: 90px;width: 90px;">
                                <img src="${x.img}" style="width: 100%;height: 100%;object-fit: cover;">
                            </div>
                        </span>
                        <div class="media-body" style="padding-left: 20px;">
                            <input type="hidden" value="${x.cantidad},${x.id}" name="id${i}" id="cartIdProduct"/>
                            <span class="block">Nombre: ${x.name}</span>
                            <span class="block">Precio: $${x.price}</span>
                            <span class="block">Cantidad: ${x.cantidad}</span>
                            <span class="block">SubTotal: $${x.subTotal}</span>
                        </div>
                    </div>
                </div>            
            `;
            i += 1;
        });
        priceTotal = `<li class="not-head priceTotal" style="font-weight:bold;justify-content: space-around;margin-top: 8px;"><div>TOTAL: $${data.info.total}</div><div>PRODUCTOS: ${data.info.count}</div></li>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="color:black;" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </div> </form>`;
        $tableCount.innerHTML = html+ priceTotal;
    })
}


