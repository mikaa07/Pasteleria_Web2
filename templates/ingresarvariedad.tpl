{include file='templates/header.tpl'}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
           <h2>AGREGAR VARIEDAD</h2>
            <form class="form-alta" action="agregar-variedad" method="POST"> 
                
                <div class="col-auto mb-2">
                   <input placeholder="nombre_variedad" type="text" name="nombre_variedad" id="nombre_variedad" required>
                </div>
                
                <br>
              {if $isAdmin} 
             <input type="submit" class="btn btn-primary">
             {/if} 
            </form>
    </div>

</div>

<a href="productos" class="volver">VOLVER</a>
{include file="templates/footer.tpl"}