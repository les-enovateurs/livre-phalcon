<h1>Méthode POST</h1>

<h2>Analyse de la requête émise</h2>
<p>POST : {{ avec_post|default(0) }}</p>
<p>Ajax : {{ avec_ajax|default(0) }}</p>

<h2>Récupération des données émises en POST</h2>
<p>Email : {{ email }}</p>
<p>Mot de passe : {{ mot_de_passe }}</p>

<h2>Nettoyage des données avec des filtres</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Sans filtre</th>
            <th>Avec filtre</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
                INT
            </td>
        </tr>
        <tr>
            <td>{{ int_sans_filtre }}</td>
            <td>{{ int_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                ABSINT
            </td>
        </tr>
        <tr>
            <td>{{ absint_sans_filtre }}</td>
            <td>{{ absint_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                INT!
            </td>
        </tr>
        <tr>
            <td>{{ cast_int_sans_filtre }}</td>
            <td>{{ cast_int_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                FLOAT
            </td>
        </tr>
        <tr>
            <td>{{ float_sans_filtre }}</td>
            <td>{{ float_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                FLOAT!
            </td>
        </tr>
        <tr>
            <td>{{ cast_float_sans_filtre }}</td>
            <td>{{ cast_float_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                STRING
            </td>
        </tr>
        <tr>
            <td>{{ string_sans_filtre }}</td>
            <td>{{ string_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                ALPHA-NUMERIQUE
            </td>
        </tr>
        <tr>
            <td>{{ alphanum_sans_filtre }}</td>
            <td>{{ alphanum_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                TRIM
            </td>
        </tr>
        <tr>
            <td>|{{ trim_sans_filtre }}|</td>
            <td>|{{ trim_avec_filtre }}|</td>
        </tr>
        <tr>
            <td colspan="2">
                STRIPTAGS
            </td>
        </tr>
        <tr>
            <td>{{ striptags_sans_filtre }}</td>
            <td>{{ striptags_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                UPPER
            </td>
        </tr>
        <tr>
            <td>{{ upper_sans_filtre }}</td>
            <td>{{ upper_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                LOWER
            </td>
        </tr>
        <tr>
            <td>{{ lower_sans_filtre }}</td>
            <td>{{ lower_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                EMAIL
            </td>
        </tr>
        <tr>
            <td>{{ email_sans_filtre }}</td>
            <td>{{ email_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                URL
            </td>
        </tr>
        <tr>
            <td>{{ url_sans_filtre }}</td>
            <td>{{ url_avec_filtre }}</td>
        </tr>
        <tr>
            <td colspan="2">
                SPECIAL CHARS
            </td>
        </tr>
        <tr>
            <td>{{ special_chars_sans_filtre }}</td>
            <td>{{ special_chars_avec_filtre }}</td>
        </tr>
    </tbody>
</table>