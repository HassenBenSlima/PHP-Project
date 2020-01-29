
<form method="post" action="ecommerce.php?controller=ticket&action=searchcat" class="form-actions">
    <select name="idcat" class="form-control">
        <?php
        foreach($catt as $obj){
            echo "<option value=".$obj->id_categorie.">".$obj->nom."</options>";
        }
        ?>

    </select>

    <input type="date" class="input" name="datecat"><br>
    <input type="submit" class="btn btn-premary" value="rechercher">
</form>

<section class="main-content">

    <div class="row">
        <div class="span9">
            <ul class="thumbnails listing-products">
                <?php
                if(isset($res)){
                foreach($res as $obj){
                ?>

                <li class="span3">
                    <div class="product-box">
                        <span class="sale_tag"></span>
                        <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" ><img src="files/<?php echo $obj->photo;?>"/></a><br/>
                        <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>" ><?php echo $obj->nom;?></a><br/>
                        <a href="ecommerce.php?controller=ticket&action=detail&id_ticket=<?php echo $obj->id_ticket;?>"  class="category"><?php echo $obj->date;?></a>
                        <p class="price"><?php echo $obj->place;?>  en <?php echo $obj->ville;?></p>
                    </div>
                </li>

                    <?php
                }
                }
                ?>

            </ul>
            <hr>
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