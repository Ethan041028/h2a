<!-- form.php -->
<form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="custom-form">
    <div class="form-group">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="tel" name="telephone" placeholder="Téléphone" required>
    </div>
    <div class="form-group">
        <textarea name="message" placeholder="Message" required></textarea>
    </div>
    <div class="form-group checkbox-group">
        <label>
            <input type="checkbox" name="autorisation" value="oui">
            Oui, j’autorise XXX à utiliser mes données pour me tenir informé...
        </label>
    </div>
    <div class="form-group checkbox-group">
        <label>
            <input type="checkbox" name="newsletter" value="oui">
            Je souhaite recevoir les mails de XX
        </label>
    </div>
    <div class="form-group">
        <button type="submit" name="submit_form">Envoyer ma demande</button>
    </div>
</form>
