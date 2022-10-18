{include file='templates/header.tpl'}
                               {* AGREGAR PRODUCTO *}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
        <h2>AGREGAR PRODUCTO</h2>
        <form class="form-alta" action="agregar-producto" method="post"> 
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="Producto.." type="text" name="nombre_producto" id="nombre_producto" >
            </div>
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="Precio.." type="text" name="precio" id="precio" >
            </div>
            <select class="custom-select mb-2 col-7" name="id_variedad">
                    {foreach $variedades as $variedad}
                       <option value="{$variedad->id_variedad}"></option>
                    {/foreach}
                </select>
        {if $isAdmin} 
        <input type="submit" class="btn btn-primary">
    {/if}
        </form>
        {* <p>{$aviso}</p> *}
    </div>
</div>
<p>{$aviso}</p>
<a href="productos" class="volver">VOLVER</a>
{include file='templates/footer.tpl'}