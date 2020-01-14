<h1>Gestion de l'internationalisation</h1>
<p>Voir les fichiers app/config/services.php et app/views/index/index.volt. Ainsi que le répertoire app/messages/</p><br/>

<h2>Traduction simple</h2>
<p>{{ t._("traduction d'éléments") }}</p>

<h2>Traduction non présente dans le dictionnaire</h2>
<p>{{ t._("non présent dans le dictionnaire") }}</p>

<h2>Traduction avec une variable</h2>
<p>{{ t._("avec %variable%",['variable' : 'test']) }}</p>
