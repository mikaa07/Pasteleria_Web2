


<div class="container">
    <h1> Nuestras Variedades </h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col"> Id </th>
                <th scope="col"> Variedad </th>
            </tr>
        </thead>

        <tbody>
        {foreach from=$variedades item=$variedad}
        <tr scope="row">
            <td> {$variedad->id_variedad}</td>
            <td> {$variedad->nombre_variedad}</td>
        </tr>
        {/foreach}
        </tbody>
    </table>
</div>

{include file='templates/footer.tpl'}