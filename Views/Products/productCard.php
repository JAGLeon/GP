<div class="product col-md-4" >
    <input type="hidden" value="<?= $item['id'] ?>">
    <a href="#" class="img">
    <img src="<?= $item['img'] ?>" class="img-product" alt="">
    </a>
    <div class="description">
        <p class="funko-name">Marca: <?= $item['brand'] ?></p>        
        <p class="funko-name">Nombre: <?= $item['name'] ?></p>   
        <p class="funko-prices">$ <?= $item['price'] ?></p> 
        <button id="btnAdd">Agregar al carrito</button>
    </div>
    <div style="position: absolute;top: -11px;left: 16px;background-color: #e9e1e1;padding: 0 7px;border-radius: 5px;box-shadow: 0px 1px 5px 3px #b3b3b3;">Stock <?= $item['quantity'] ?></div>
</div>


