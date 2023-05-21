<?php require_once './assets/request/conn.php';?>
<!doctype html>
<html class="no-js" lang="pt-br">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- título do site -->
        <title>Jupiter e-commerce</title>

      <!-- icone png de favicon -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--fontes-css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--ícone lineares css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animacao.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--estilos.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsividade.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

    </head>
	
	<body>
		<!--welcome-hero start -->
		<header id="home" class="welcome-hero">

			<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<!--/.carousel-indicator -->
				 <ol class="carousel-indicators">
					<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
					<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
					<li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
				</ol><!-- /ol-->
				<!--/.carousel-indicator -->

				<!--/.carousel-inner -->
				<div class="carousel-inner" role="listbox">
					<!-- .item -->
					<!-- Criação do carrocel com dados da base de dados -->
					<?php
						// comando/query que sera mandado a base de dados para nos trazer a informacao que esta na base de dados
						$comando = "SELECT * FROM produto ORDER BY nome ASC";
						// usamos o try para a prevencao de erros
						try {
							// comando que ira criar a comunicacao com a base de dados a busca da informacao
							$da_base_dados = $conn->prepare($comando);
							// execucao do comando
							$da_base_dados->execute();
							$dados_trazidos = $da_base_dados->fetchAll(PDO::FETCH_ASSOC);
							$data = 0;
							foreach($dados_trazidos as $linha){
					?>
					<div class="item <?php echo ($data==0)? 'active' : '';?>">
						<div class="single-slide-item slide1">
							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4><?php echo $linha['tipo']?></h4>
													<h2><?php echo $linha['nome']?></h2>
													<p><?php echo $linha['descricao']?></p>
													<div class="packages-price">
														<p>
															<?php echo number_format($linha['valor'], 2)?>
															<del><?php echo number_format($linha['desconto'], 2)?></del>
														</p>
													</div>
													<button class="btn-cart welcome-add-cart add-carinho" id="<?php echo $linha['id']?>">
														<span class="lnr lnr-plus-circle"></span>
														Adicionar <span>ao</span> carrinho
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
														mais informação
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="<?php echo $linha['imagem']?>" alt="slider image">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->
					<?php
								$data++;
							}
						} catch (\Throwable $th) {
							//throw $th;
						}
					?>
					
				</div><!-- /.carousel-inner-->

			</div><!--/#header-carousel-->

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <!-- Start Top Search -->
				        <div class="top-search">
				            <div class="container">
				                <div class="input-group">
				                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
				                    <input type="text" class="form-control" placeholder="Search">
				                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				                </div>
				            </div>
				        </div>
				        <!-- End Top Search -->

				        <div class="container">            
				            <!-- Start Atribute Navigation -->
				            <div class="attr-nav">
				                <ul>
				                	<li class="search">
				                		<a href="#"><span class="lnr lnr-magnifier"></span></a>
				                	</li><!--/.search-->
				                	<li class="nav-setting">
				                		<a href="#"><span class="lnr lnr-cog"></span></a>
				                	</li><!--/.search-->
				                    <li class="dropdown">
				                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
				                            <span class="lnr lnr-cart"></span>
											<!-- <span class="badge badge-bg-1">2</span> -->
				                        </a>
				                        <ul class="dropdown-menu cart-list s-cate">
				                            <!-- Removemos toda a informação aqui -->
				                        </ul>
				                    </li><!--/.dropdown-->
				                </ul>
				            </div><!--/.attr-nav-->
				            <!-- End Atribute Navigation -->

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">Jupiter <span> E-commerce</span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">inicio</a></li>
				                    <li class="scroll"><a href="#new-arrivals">novidades</a></li>
				                    <li class="scroll"><a href="#feature">Produtos</a></li>
				                    <li class="scroll"><a href="#newsletter">contacto</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

		</header><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--populer-products start -->
		
		<!--populer-products end-->

		<!--new-arrivals start -->
		
		<!--new-arrivals end -->

		<!--sofa-collection start -->
		
		<!--sofa-collection end -->

		<!--feature start -->
		
		<!--feature end -->

		

		<!-- clients strat -->
		
		<!-- clients end -->

		<!--newsletter strat -->
		
		<!--newsletter end -->

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<div class="footer-social">
						<a href="#"><i class="fa fa-facebook"></i></a>	
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
		
					</div>
					<p>
					direitos autorais. projetado e desenvolvido por<a href="#">Fabio dos Santos(Jupiter tech)</a>
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>

		<!-- Importacao do ficheiro JS que contera todas as acoes a realizar a nivel do JS -->
		<script src="./assets/js/accoes.js"></script>
        
    </body>
	
</html>