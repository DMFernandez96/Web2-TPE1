{include 'header.tpl'}
<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="verificarUsuario">
    <div class="form-group">
        <label for="mail">Email</label>
        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">

    </div>
    {if $error_s}
        <div class="alert alert-danger"> 
            {$error_s}
        </div>
    {/if}

    <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
{include 'footer.tpl'}