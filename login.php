<?php

    include('conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])){

        if(strlen($_POST['email']) == 0){
            echo "Prencha seu Email";
        }else if(strlen($_POST['senha']) == 0){
            echo"Preencha sua senha";
        }else{

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuario WHERE email = $email AND senha = $senha";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQl: " . $mysqli->error);
        
            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start;
                }

                $_SESSION['cnpj'] = $usuario['cnpj'];
                $_SESSION['razao_social'] = $usuario['razao_social'];

                header("Localion: index.html");

            }else{
                echo"Falha ao logar";
            }
        }
    } 

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="@arianekevinny, @predohenr, @gabiqueiroga" />
        <title>metatrade - Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">metatrade</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link ms-2" href="aboutus.html">Sobre nós</a></li>
                            <li class="nav-item"><a class="btn btn-outline-light ms-3" href="#!">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 mb-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Acesse sua conta!</h3>
                            </div>
                            <div class="card-body">

                                <!-- ALERTAS -->
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </symbol>
                                  </svg>
                                  
                                  <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div>
                                      Alerta
                                    </div>
                                  </div>
                                  <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div>
                                      Usuário/Senha Incorretos!
                                    </div>
                                  </div>

                                <form>
                                    <div class="form-floating mb-3">
                                        <input name="email" type="email" class="form-control" placeholder="nome@exemplo.com" id="inputEmail"  required>
                                        <label for="inputEmail">E-mail</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="senha" type="password" class="form-control" placeholder="Senha" id="inputPassword"  required>
                                        <label for="inputPassword">Senha</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary" formaction="#!">Login</a>
                                    </div>
                                </form>

                            </div>
                            <div class="d-flex align-items-center card-footer justify-content-between py-3">
                                <a class="small" href="register.html">Precisa de uma conta? Cadastre-se!</a>
                                <a class="small" href="password.html">Esqueceu sua senha?</a>
                            </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="text-muted text-center">Desenvolvido por:
                <a href="https://github.com/predohenr" target="_blank"><img src="assets/img/github.png", height="25", width="25"></a>
                <a href="https://github.com/gabiqueiroga" target="_blank"><img src="assets/img/github.png", height="25", width="25"></a>
                <a href="https://github.com/arianekevinny" target="_blank"><img src="assets/img/github.png", height="25", width="25"></a>
            </div>
            </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>