<h1>Récupération de fichiers</h1>
<form action="{{ url("photo") }}" method="post" enctype="multipart/form-data">
    Photo du compte :
    <input type="file" name="fichier_photo" id="fichier_photo">
    <br /><br />
    <input type="submit" value="Envoyer" name="submit">
</form>