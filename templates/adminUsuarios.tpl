{include file="templates/header.tpl"}
{include file="templates/adminTab.tpl"}

<div class="row">
    <div class="col">
        <h3> Usuarios</h3>
        <table class="table table-responsive">
            <thead class="thead-dark">
                <tr class="">
                    <th>Mail </th>
                    <th>Contraseña </th>
                    <th>Es admin? </th>
                    <th>Permisos admin</th>
                    <th>Eliminar</th>
                </tr> 
            </thead>
            {foreach from=$usuarios_s item=usuario}  
                <tr class="bg-light">
                    <td>{$usuario->mail}</td>
                    <td>{$usuario->pass}</td>
                    <td>{$usuario->administrador}</td> {* boolean *}
                    <td>
                        {if $usuario->administrador == 0}
                            <a class='btn btn-primary btn-sm' href='addAdmin/{$usuario->id}'>Hacer Admin</a>  
                        {else}
                            <a class='btn btn-primary btn-sm' href='eliminarAdmin/{$usuario->id}'>Revocar permisos</a> 
                        {/if}
                    </td>
                    <td><a class='btn btn-danger btn-sm' href='eliminarusuario/{$usuario->id}'>ELIMINAR USUARIO</a></td>
                    
                </tr>
            {/foreach}
        </table>
    </div>
</div>

{include file="templates/footer.tpl"}