<?php
session_start(); // Inicia a sessão

include 'php/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $codigo_editora = $_POST['codigo_editora'];
    $ano = $_POST['ano'];
    $situacao = $_POST['situacao'];
    $edicao = $_POST['edicao'];
    $qtde_disponivel = $_POST['qtde_disponivel'];

    $sql = "INSERT INTO livro (isbn, titulo, autor, codigo_editora, ano, situacao, edicao, qtde_disponivel) VALUES ('$isbn', '$titulo', '$autor', $codigo_editora, $ano, '$situacao', $edicao, $qtde_disponivel)";

    if ($conn->query($sql) === TRUE) {
      $_SESSION['mensagem'] = "Novo livro adicionado com sucesso!";
    } else {
      $_SESSION['mensagem'] = "Erro ao adicionar novo livro: " . $conn->error;
    }

    $conn->close();
    
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Adicionar Livro</title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <!-- datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container">
          <div class="contact_nav">
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Contato : +01 123455678990
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                Email : ifpb@gmail.com
              </span>
            </a>
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                <a href="https://www.bing.com/maps?osid=2d9cc22c-c352-4b15-84e1-a645eaf97d8a&cp=-7.025562~-37.280592&lvl=17&pi=0&v=2&sV=2&form=S00027">Localização</a>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" >
              <img src="images/White and navy simple book store logo.png" alt="">
            </a>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item ">
                    <a class="nav-link" href="funcoes.php">HOME<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="livros.php">VOLTAR<span class="sr-only">(current)</span></a>
                  </li>
                 
                </ul>
              </div>
              <div class="quote_btn-container">
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- contact section -->
  <section class="contact_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2><br/>
          ADICIONAR LIVRO
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <!-- Exibe a mensagem de sucesso ou erro -->
            <?php
            if (isset($_SESSION['mensagem'])) {
                echo "<p>" . $_SESSION['mensagem'] . "</p>";
                unset($_SESSION['mensagem']); // Remove a mensagem depois de exibir
            }
            ?>
            <form action="add_livro.php" method="post">
              <div>
                <input type="text" name="isbn" placeholder="ISBN" required />
              </div>
              <div>
                  <input type="text" name="titulo" placeholder="Título" required />
              </div>
              <div>
                  <input type="text" name="autor" placeholder="Autor" required />
              </div>
              <div>
                  <input type="number" name="codigo_editora" placeholder="Código da Editora" required />
              </div>
              <div>
                  <input type="number" name="ano" placeholder="Ano" required />
              </div>
              <div>
                  <select name="situacao" required>
                      <option value="ativo">Ativo</option>
                      <option value="inativo">Inativo</option>
                  </select>
              </div>
              <div>
                  <input type="number" name="edicao" placeholder="Edição" required />
              </div>
              <div>
                  <input type="number" name="qtde_disponivel" placeholder="Quantidade Disponível" required />
              </div>
              <div class="btn_box">
                <button type="submit">
                  adicionar
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

 