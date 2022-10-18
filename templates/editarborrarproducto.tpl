{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
    <div>

        <h1> EDITAR Y BORRAR PRODUCTOS</h1>
        <table class="my-4 table">
            <thead>

                <tr>
                    <th class="col">PRODUCTO</th>
                    <th class="col">PRECIO</th>
                    
                    {if $isAdmin}
                        <th class="col">borrar</th>
                        <th class="col">editar</th>
                    {/if}


                </tr>

            </thead>


            {foreach from=$tablaProductos item=item}
                <form class="form-alta" action="editarproducto/{$item->id_producto}" method="POST">
                    <tr style=text-align:center>

                        <td><input class="form-control" type="text" name="nombre_producto" value="{$item->nombre_producto}"></td>
                        <td><input class="form-control" type="text" name="precio" value="{$item->precio}"></td>
                        <td><input class="form-control" type="number" name="id_variedad" value="{$item->id_variedad}"></td>
                        {if $isAdmin}
                            <td><a class="btn btn-primary" href="borrarproducto/{$item->id_producto}">borrar</a></td>
                            <td><button type="submit" class="btn btn-primary">editar</button></td>
                        {/if}
                    </tr>
                </form>

            {/foreach}

        </table>

    </div>
</div>
<a href="productos" class="volver">VOLVER</a>
{include file="templates/footer.tpl"}