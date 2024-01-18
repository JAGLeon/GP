<div class="product col-md-4" >
    <input type="hidden" value="<?= $item['id'] ?>">
    <a href="#" class="img">
    <img src="<?= $item['img'] ?>" class="img-product" alt="">
    </a>
    <div class="description">
        <p class="funko-name">Marca: <?= $item['brand'] ?></p>        
        <p class="funko-name">Nombre: <?= $item['name'] ?></p>   
        <p class="funko-prices">$ <?=  number_format($item['price']) ?></p> 
        <button id="btnAdd">Agregar al carrito</button>
    </div>
    <div class="stockProductCard">Stock <?= $item['quantity'] ?></div>
</div>


