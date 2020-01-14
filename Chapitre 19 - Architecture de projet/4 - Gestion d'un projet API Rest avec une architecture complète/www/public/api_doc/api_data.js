define({ "api": [
  {
    "type": "post",
    "url": "/api/utilisateur",
    "title": "Création d'un nouvel utilisateur",
    "name": "NouvelUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X POST -d '{\"nom\":\"DOE\",\"prenom\":\"Conor\",\"email\":\"conor.doe@les-enovateurs.com\", \"mot_de_passe\":\"azert\"}' http://127.0.0.1/api/utilisateur",
        "type": "curl"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "payload",
            "description": "<p>Renvoie le nouvel utilisateur crée</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/UtilisateursController.php",
    "groupTitle": "Utilisateurs"
  },
  {
    "type": "get",
    "url": "/api/utilisateurs/:id",
    "title": "Récupération d'un utilisateur",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>L'ID de l'utilisateur a récupéré.</p>"
          }
        ]
      }
    },
    "name": "infoUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET http://127.0.0.1/api/utilisateur/3",
        "type": "curl"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "payload",
            "description": "<p>Contient les informations d'un utilisateur</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1/api/utilisateur/:id"
      }
    ],
    "filename": "../../app/controllers/UtilisateursController.php",
    "groupTitle": "Utilisateurs"
  }
] });
