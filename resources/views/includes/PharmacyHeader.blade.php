<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Pharmacy profile</title>
    <style>

:root {
    --black: #444;
    --light-color: #777;
    --box-shadow: .5rem .5rem 0 rgba(22, 160, 133, .2);
    --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
    --border: .2rem solid var(--main-color);

    --main-color: #543ab7;
    --secondary-color: #00acc1;
    --hover-main: #817ecd;
    --hover-secondary: #9bb0dd;
    --bg-sec: #f2f2fa;
}

body {
    background-color: var(--bg-sec);
}

.form-control:focus {
    box-shadow: none;
    border-color: #9bb0dd;
}

.profile-button {
    background:  #9bb0dd;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: var( --hover-main);
}

.profile-button:focus {
    background: var( --hover-main);
    box-shadow: none
}

.profile-button:active {
    background: var( --hover-main);
    box-shadow: none
}

.back:hover {
    color: var( --hover-main);
    cursor: pointer
}

.labels {
    font-size: 11px
}

i{
    color: #444;
    font-size: 30px;
    padding: 20px;
}
@media (max-width: 1024px){
    i{
    color: #444;
    font-size: 15px;
    padding: 20px;
}
.navbar{
    padding: 10px 0 10px 0;
}

}

    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5 ">
    <!-- Container wrapper -->
    <div class="container-fluid">

        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">ابولو
        </a>
        <!--  start Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0  flex-row ">
            <li class="nav-item">
                <a href="/chat">
                        <i class="bi bi-chat" ></i>
                </a>
            </li>
            <li class="nav-item">
                    <i class="bi bi-gear"></i>

            </li>
            <li>
                <i class="bi bi-gear"></i>
            </li>

        </ul>
        <!-- end Left links -->
    <!-- Container wrapper -->
    </nav>
    <!-- end Navbar -->
