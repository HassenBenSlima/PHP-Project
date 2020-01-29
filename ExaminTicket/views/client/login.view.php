

</section>
<section class="header_text sub">
    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
    <h4><span>Authentifier ou cree un compte</span></h4>
</section>
<section class="main-content">
    <div class="row">
        <div class="span5">
            <h4 class="title"><span class="text"><strong>Authentification:</strong> Form</span></h4>
            <form method="post" action="login.php?controller=client&action=login">
                <input type="hidden" name="next" value="/">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Email:</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter votre email" name="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mot de passe:</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter votre mot de passe" name="motDePasse"  class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <input tabindex="3" class="btn btn-primary large" type="submit" value="connect">
                        <hr>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span7">
            <h4 class="title"><span class="text"><strong>Crée un compte:</strong> Form</span></h4>
            <form method="post" action="login.php?controller=client&action=ajout" enctype="multipart/form-data" class="form-stacked">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nom:</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter votre nom" name="nom" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Prenom:</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter votre prenom" name="prenom" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Contact:</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter votre contact" name="contact" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email:</label>
                        <div class="controls">
                            <input type="text" placeholder="Enter votre email" name="email" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mot de passe:</label>
                        <div class="controls">
                            <input type="password" placeholder="Enter votre mot de passe" name="motDePasse" class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                    </div>
                    <hr>
                    <div class="actions"><input tabindex="9" class="btn btn-primary large" type="submit" value="Crée"></div>
                </fieldset>
            </form>
        </div>
    </div>
</section>