<?php $idClient = $this->session->userdata('idClient');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Takalo Home</title>


    <link rel="icon" href="img/core-img/favicon.ico">


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amado-master/css/core-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amado-master/style.css">

</head>

<body>

    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?php echo base_url(); ?>assets/css/amado-master/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-wrapper d-flex clearfix">


        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="<?php echo base_url(); ?>assets/css/amado-master/img/core-img/logo.png" alt=""></a>
            </div>

            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>


        <header class="header-area clearfix">

            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>

            <nav class="amado-nav">
                <ul>
                    <?php 
                        $link =  base_url().'utilisateur/gestionobjet/'.$idClient
                    ?>
                <li><a href=<?php echo base_url('utilisateur/home');?>>ACCEUIL</a></li>
                    <li><a href="<?php echo $link ?>">TOUT MES OBJETS</a></li>
                    <li><a href="<?php echo base_url('utilisateur/proposition');?>">Mes Propositions</a></li>
                    <li><a href="<?php echo base_url('utilisateur/deconnexion');?>">DECONNEXION</a></li>
                </ul>
            </nav>

        </header>
 


        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <?php foreach($listeProduit as $produit){ ?>
                <div class="single-products-catagory clearfix">
                    <a href="shop.html">
                        <img src="<?php echo base_url(); ?><?php echo $produit['photo']; ?>" alt="">

                        <div class="hover-content">
                            <div class="line"></div>
                            <p><?php echo $produit['nameItems']; ?></p>
                            <h4> <?php echo $produit['descri']; ?></h4>
                        </div>
                    </a>
                </div>
                <?php } ?>

                
            </div>
        </div>

    </div>


    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-4">
                </div>

                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">

                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">2190-Mandresy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">2227-Riana</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">2219-Ismaël</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?php echo base_url() ?>/assets/css/amado-master/js/jquery/jquery-2.2.4.min.js"></script>

    <script src="<?php echo base_url() ?>/assets/css/amado-master/js/popper.min.js"></script>

    <script src="<?php echo base_url() ?>/assets/css/amado-master/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>/assets/css/amado-master/js/plugins.js"></script>

    <script src="<?php echo base_url() ?>/assets/css/amado-master/js/active.js"></script>

</body>

</html>


