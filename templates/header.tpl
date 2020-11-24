<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <title>{$titulo_s|upper}</title>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC" rel="stylesheet">
    {* <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'> *}
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
    <header> <!-- hacer barra de nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="home">Recipe Archive</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex w-100">
                    <li class="nav-item active">
                        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                        <!-- sr-only screen readers -->
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="categorias">Categorias</a>
                    </li>
                    {if !isset($smarty.session.EMAIL_USER)} {* si no esta abierta una session me aparece *}
                        <li class="nav-item active">
                            <a class="nav-link" href="signUp">Registrarse</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="adminRecetas">Login</a>
                        </li>
                    {/if}
                    {if isset($smarty.session.EMAIL_USER) && $admin_s}
                        <li class="nav-item active">
                            <a class="nav-link" href="adminRecetas">Admin</a>
                        </li>
                        
                    {/if}
                    {if isset($smarty.session.EMAIL_USER)} {* para q no se rompa el nav si no esta logueado *}
                        <li class="nav-item active ml-auto">
                            <a class="nav-link" href="logout">{$smarty.session.EMAIL_USER} -LOGOUT</a>    
                        </li>
                    {/if}
                </ul>
            </div>
        </nav>
    </header>

    <main class="container justify-content-center align-items-center vh-100">