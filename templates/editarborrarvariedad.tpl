{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
    <div>
        <h1> EDITAR Y BORRAR VARIEDADES</h1>
        <table class="my-4 table">
            <thead>

                <tr>
                    
                    <th class="col">NOMBRE</th>
                    {if $isAdmin}
                        <th class="col"> BORRAR</th>
                        <th class="col">EDITAR</th>
                    {/if}


                </tr>

            </thead>

            <p class="lead">{$aviso}</p>
            {foreach from=$tablaVariedades item=item}
                <form class="form-alta" action="editarvariedad/{$item->id_variedad}" method="POST">

                    <tr>
                        <td><input class="form-control" type="text" name="nombre_variedad" value="{$item->nombre_variedad}"></td>
                        
                        {if $isAdmin}
                            <td><a class="btn btn-primary" id="borrar" href="borrarvariedad/{$item->id_variedad}">borrar</a></td>
                            <td><button type="submit" class="btn btn-primary">editar</button></td>
                        {/if}
                </form>
                </tr>
            {/foreach}
        </table>
    </div>

</div>

<a href="productos" class="volver">VOLVER</a>

{include file="templates/footer.tpl"}