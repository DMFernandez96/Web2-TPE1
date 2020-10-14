<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{BASE_URL}">
    <title>{$titulo_s|upper}</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="adminRecetas">Admin</a>
                    </li>
                    {if isset($smarty.session.EMAIL_USER)} {* para q no se rompa el nav si no esta logueado *}
                        <li class="nav-item active ml-auto">
                            <a class="nav-link" href="logout">{$smarty.session.EMAIL_USER} (logout)</a>    
                        </li>
                    {/if}
                </ul>
            </div>
        </nav>
    </header>

    <main class="container justify-content-center align-items-center vh-100">