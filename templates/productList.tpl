{include file="header.tpl"}

 {* {if $isAdmin }  *}
    <a href="tablaproductos" class="m-3"><button type="button" class="btn btn-info">Editar productos</button></a>
    <a href="tablavariedades" class="m-3"><button type="button" class="btn btn-info">Editar variedades</button></a>
{* {/if}  *}
{* {if $rol == "true"} *}
    <a href="panel" class="m-3"><button type="button" class="btn btn-info">Panel Admin</button></a>
{* {/if} *}


<a href="logout" class="m-3"><button type="button" class="btn btn-info">Log Out</button></a>


{* {if $rol == "true"} *}
    <a href="agregarproducto" class="m-3"><button type="button" class="btn btn-info">Agregar producto</button></a>
    <a href="agregarvariedad" class="m-3"><button type="button" class="btn btn-info">Agregar variedad</button></a>
{* {/if} *}

<div class="container">
    <h1> Nuestros productos </h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col"> Id </th>
                <th scope="col"> Producto </th>
                <th scope="col"> Precio </th>
                <th scope="col"> Variedad </th>
            </tr>
        </thead>

        <tbody>
        {foreach from=$productos item=$producto}
        <tr scope="row">
            <td>{$producto->id_producto}</td>
            <td>{$producto->nombre_producto}</td>
            <td>${$producto->precio}</td>
            <td>{$producto->id_variedad}</td>
            
        </tr>
        {/foreach}
        </tbody>
    </table>
</div>

