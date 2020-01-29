<section  class="homepage-slider" id="home-slider">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="themes/images/carousel/banner-1.jpg" alt="" />
            </li>
            <li>
                <img src="themes/images/carousel/banner-2.jpg" alt="" />
            </li>

        </ul>
    </div>
</section>
<section class="header_text">
    1. Passez votre commande en ligne sur www.goldenticket.tn
    2. Choisissez paiement en paybox.
    <br/> 3. Munissez vous de votre numéro de commande.
    4. Présentez vous dans l'un de nos payboxs.
    5. Payez en espèce et récupérez votre e-ticket.
    <br/>
</section>

<section class="main-content">



<br/>
<div class="row">
    <div class="span12">
        <h4 class="title">
            <span class="pull-left"><span class="text"><span class="line">List <strong>Tickets</strong></span></span></span>
            <span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
        </h4>
        <div id="myCarousel-2" class="myCarousel carousel slide">
            <div class="carousel-inner">
                <div class="active item">
                    <ul class="thumbnails">

                        <?php
                        foreach($res as $obj){
                        ?>

                        <li class="span3">
                            <div class="product-box">
                                <span class="sale_tag"></span>
                                <p><a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" ><img src="files/<?php echo $obj->photo;?>" width="195" height="243" alt=""></a></p>
                                <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" class="title"><?php echo $obj->nom;?></a><br/>
                                <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" class="category"><?php echo $obj->date;?></a>
                                <p class="price"><?php echo $obj->place;?>  en <?php echo $obj->ville;?> </p>

                            </div>
                        </li>

                            <?php
                        }
                        ?>

                    </ul>
                </div>
                <div class="item">
                    <ul class="thumbnails">

                        <?php
                        foreach($res as $obj){
                        ?>

                            <li class="span3">
                                <div class="product-box">
                                    <span class="sale_tag"></span>
                                    <p><a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" ><img src="files/<?php echo $obj->photo;?>" width="195" height="243" alt=""></a></p>
                                    <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" class="title"><?php echo $obj->nom;?></a><br/>
                                    <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" class="category"><?php echo $obj->date;?></a>
                                    <p class="price"><?php echo $obj->place;?>  en <?php echo $obj->ville;?> </p>

                                </div>
                            </li>

                            <?php
                        }
                        ?>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="pagination pagination-small pagination-centered">
        <ul>
            <li><a href="#">Prev</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">Next</a></li>
        </ul>
    </div>
</section>
<div class="row feature_box">
    <div class="span4">
        <div class="service">
            <div class="responsive">
                <img src="themes/images/feature_img_2.png" alt="" />
                <h4>TOUJOURS À VOTRE <strong>ÉCOUTE:</strong></h4>
                <p>Pour un suivi et un support quotidien.</p>
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="service">
            <div class="customize">
                <img src="themes/images/feature_img_1.png" alt="" />
                <h4>TOUS LES MODES DE <strong>PAIEMENT:</strong></h4>
                <p>Carte bancaire nationale, internationale, e-dinars ou en espèce.</p>
            </div>
        </div>
    </div>
    <div class="span4">
        <div class="service">
            <div class="support">
                <img src="themes/images/feature_img_3.png" alt="" />
                <h4>LANCEZ VOTRE ÉVÉNEMENT <strong>FACILEMENT:</strong></h4>
                <p>En quelques cliques notre équipe mettera vos billets en vente</p>
            </div>
        </div>
    </div>
</div>