<h1>Gestion de la sécurité</h1>
    <h2>Cryptage</h2>
        <h3>Chaîne à crypter :</h3>
            <p>{{ phrase_a_crypter }}</p>
        <h3>Chaîne cryptée :</h3>
            <p>{{ phrase_crypte }}</p>
        <h3>Chaîne cryptée avec hashage md2 :</h3>
            <p>{{ phrase_crypte_avec_hash }}</p>
        <h3>Chaîne cryptée avec le service cryptage_avec_cle :</h3>
            <p>{{ phrase_crypte_avec_service }}</p>
        <h3>Chaîne cryptée et encodée en base64 :</h3>
            <p>{{ phrase_crypte_base_64 }}</p>
        <h3>Chaîne cryptée avec hashage md2 et encodée en base64 :</h3>
            <p>{{ phrase_crypte_avec_hash_base_64 }}</p>

    <h2>Cryptage</h2>
        <h3>Chaîne decryptée :</h3>
            <p>{{ phrase_decrypte }}</p>
        <h3>Chaîne decryptée avec hashage md2 :</h3>
            <p>{{ phrase_decrypte_avec_hash }}</p>
        <h3>Chaîne decryptée avec le service cryptage_avec_cle :</h3>
            <p>{{ phrase_decrypte_avec_service }}</p>
        <h3>Chaîne désencodée en base64 et decryptée :</h3>
            <p>{{ phrase_decrypte_base_64 }}</p>
        <h3>Chaîne désencodée en base64 et decryptée avec hashage md2 :</h3>
            <p>{{ phrase_decrypte_avec_hash_base_64 }}</p>


    <h2>Algorithme de hashage disponibles : </h2>
    <ul>
        <li>{{ liste_algorithme_hash|join('</li><li>') }}</li>
    </ul>