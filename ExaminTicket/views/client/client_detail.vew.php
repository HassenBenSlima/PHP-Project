<section class="header_text sub">
    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
    <h4><span>plus de detail</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span9">
            <div class="row">
                <div class="span4">
                    <img src="themes/images/Occupations-Actor-Male-Light-icon.png" alt="" class="pull-right">


                </div>
                <div class="span5">
                    <address>
                        <strong>Votre nom:</strong> <span> <?php echo $res->nom; ?></span><br>
                        <strong>Votre prenom:</strong> <span><?php echo $res->prenom; ?></span><br>
                        <strong>email:</strong> <span><?php echo $res->email; ?></span><br>
                    </address>
                    <h4><strong>contact :<?php echo$res->contact; ?></strong></h4>
                </div>
                <div class="span5">


<div>



</div>


                    <div class="row pull-left">
                        <div class=" ">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#home">Votre reseration</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">

                                    <table class="table table-striped ">

                                        <tr>
                                            <th>nomticket</th>
                                            <th>photo</th>
                                            <th>quantite</th>
                                            <th>prix unitaire</th>
                                            <th>client</th>
                                            <th>Prix Total</th>
                                            <th>action</th>
                                        </tr>

                                        <tbody>
                                        <?php
                                        foreach($res1 as $obj){
                                            ?>
                                            <tr>
                                                <td><?php echo $obj->nomticket;?></td>
                                                <td><?php if (!empty ($obj->photo)) { ?><img src="files/<?php echo $obj->photo;?>" width="150"><?php } ?></td>
                                                <td><?php echo $obj->quantite;?></td>
                                                <td><?php echo $obj->prix;?></td>
                                                <td><?php echo $obj->nomclient;?></td>
                                                <td><?php echo ($obj->prix * $obj->quantite);?></td>
                                                <td><a href="index.php?controller=ligne_cmd&action=deletersv&id=<?php echo $obj->id;?>" onclick="if(confirm('etes vous sure de supprimer?')) return true; else return false;">supp.</a>
                                                </td></tr>
                                            <!--    | <a href="index.php?controller=ligne_cmd&action=edit1&id=--><?php //echo $obj->id;?><!--">modif.</a>-->
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                <div class="tab-pane" id="profile">

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="row">
                <div class="span9">
                    <ul class="nav nav-tabs" id="myTab">

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane" id="profile">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3 col">
            <div class="block">
                <ul class="nav nav-list">

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