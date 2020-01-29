<section class="header_text sub">
    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
    <h4><span>plus de detail</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span9">
            <div class="row">
                <div class="span4">
                    <a href="files/<?php echo $tick->photo;?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img src="files/<?php echo $tick->photo;?>" ></a>
                    <ul class="thumbnails small">
                        <li class="span1">
                            <a href="files/<?php echo $tick->photo;?>" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="files/<?php echo $tick->photo;?>" alt=""></a>
                        </li>

                    </ul>
                </div>
                <div class="span5">
                    <address>
                        <strong>Soiré:</strong> <span> <?php echo $tick->nom; ?></span><br>
                        <strong>ville:</strong> <span><?php echo $tick->ville; ?></span><br>
                        <strong>date:</strong> <span><?php echo $tick->date; ?></span><br>
                    </address>
                    <h4><strong>place :<?php echo $tick->place; ?></strong></h4>
                </div>
                <div class="span5">



                        <a href="ecommerce.php?controller=ticket&action=add_panier&qte=0&id_ticket=<?php echo $tick->id_ticket;?>" class="btn btn-success" >ajouter au panier</a>



                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Description</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home"><?php echo $tick->description; ?></div>
                        <div class="tab-pane" id="profile">
                            <table class="table table-striped shop_attributes">
                                <tbody>
                                <tr class="">
                                    <th>Size</th>
                                    <td>Large, Medium, Small, X-Large</td>
                                </tr>
                                <tr class="alt">
                                    <th>Colour</th>
                                    <td>Orange, Yellow</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3 col">
            <div class="block">
                <ul class="nav nav-list">
                    <li class="nav-header active">Categories</li>

                    <?php

                    foreach($catt as $obj){
                        echo "<li href=".$obj->id_categorie.">".$obj->nom."</li>";
                    }
                    ?>








                </ul>
                <br/>
                <ul class="nav nav-list below">
                    <li class="nav-header">la joie,la vie</li>
                    <li><a href="#"></a></li>
                    <li><a href="#">avec </a></li>
                    <li><a href="#">Golden Ticket</a></li>

                </ul>
            </div>
        </div>
    </div>
</section>