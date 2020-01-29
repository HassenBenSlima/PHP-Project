
<section class="main-content">
    <div class="row">
        <div class="span9">
            <h4 class="title"><span class="text"><strong>Votre</strong> panier</span></h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Supprimer</th>
                    <th>Image</th>
                    <th>Nom:</th>
                    <th>Quantité</th>
                    <th>choix:</th>
                    <th>prix unitaire</th>

                    <th>Total</th>
                </tr>
                </thead>
                <tbody>

                <?php if(isset($_SESSION['panier'])){


                  foreach($a as $aa){

                        foreach($b as $bb){


                            if(isset( $_SESSION['panier'][$aa->id_ticket][$bb->id_type])){


//                    echo " <br>--------------------<br>";
//                    echo $_SESSION['panier'][$aa->id_ticket][$bb->id_type] ['prixu']."<br>";
//                    echo " <br>--------------------<br>";
//
//                                echo " <br>--------------------<br>";

                    ?>
                <tr>
                    <td><a class=""  href="ecommerce.php?controller=ticket&action=del_panier&id_ticket=<?php echo $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['id_ticket'];?>">X</a></td>
                    <td><a href="">
                            <img width="145" height="145" alt="poster_1_up" class="" src="files/<?php echo  $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['photo'];?>">
                            </a></td>

                    <td> <?php echo  $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['nomTicket'];?></td>

                    <td class="cart_quantity">
                        <input type="button" class="btn-primary "  value="-" onclick="window.location.href='ecommerce.php?controller=ticket&action=changequatite&id=<?php echo $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['id'];?>&m=-1'">
                        <input type="number" size="4" class="input-mini" title="Qty" value="<?php echo $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['qte'];?>" min="0" step="1">
                        <input type="button" class="btn-success"  value="+" onclick="window.location.href='ecommerce.php?controller=ticket&action=changequatite&id=<?php echo  $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['id'];?>&m=1'">

                    </td>
                    <td><?php echo  $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['nomType'];?></td>

                    <td><?php echo  $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['prixu'];?></td>

                   <td><?php $tot= $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['prixu']*  $_SESSION['panier'][$aa->id_ticket][$bb->id_type]['qte'] ; echo $tot;?>TND</td>
                </tr>
                <?php
                            }
                        }
                  }
                }

               ?>
                </tbody>
            </table>
            <hr>
            <p class="cart-total right">
                <strong>Total</strong>: <?php echo $total;?> TND <br>
            </p>
            <hr/>
            <p class="buttons center">
                <a href="ecommerce.php?controller=reservation&action=ajout" class="btn btn-primary" type="button">Golden Ticket :Reservé</a>

                <a  href="ecommerce.php?controller=ticket&action=liste_ticket" type="button" class="btn btn-success" >Continue</a>
                <a class="btn btn-inverse"  href="ecommerce.php?controller=ticket&action=vider_panier">Vider</a>
            </p>
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