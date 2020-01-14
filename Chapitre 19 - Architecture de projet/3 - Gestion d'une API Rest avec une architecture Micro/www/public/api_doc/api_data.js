define({ "api": [
  {
    "type": "put",
    "url": "/api/utilisateur/:id",
    "title": "Modification d'un utilisateur",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>L'ID de l'utilisateur a modifié.</p>"
          }
        ]
      }
    },
    "name": "ModifieUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X PUT -d '{\"nom\":\"DOE\",\"prenom\":\"Pauline\",\"email\":\"pauline.doe@les-enovateurs.com\"}' http://127.0.0.1/api/utilisateur/3",
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
            "description": "<p>Contient les informations de l'utilisateur modifié</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/app.php",
    "groupTitle": "Utilisateurs"
  },
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
    "filename": "../../app/app.php",
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
    "name": "RecupereUtilisateur",
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
    "filename": "../../app/app.php",
    "groupTitle": "Utilisateurs"
  },
  {
    "type": "get",
    "url": "/api/utilisateurs",
    "title": "Récupération des utilisateurs",
    "name": "RecupereUtilisateurs",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET http://127.0.0.1/api/utilisateurs",
        "type": "curl"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "payload",
            "description": "<p>Liste d'utilisateurs</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1/api/utilisateurs"
      }
    ],
    "filename": "../../app/app.php",
    "groupTitle": "Utilisateurs"
  },
  {
    "type": "delete",
    "url": "/api/utilisateur/:id",
    "title": "Suppression d'un utilisateur",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>L'ID de l'utilisateur a supprimé.</p>"
          }
        ]
      }
    },
    "name": "SupprimeUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X DELETE http://127.0.0.1/api/utilisateur/4",
        "type": "curl"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "payload",
            "description": "<p>Contient la valeur true si l'utilisateur a bien été supprimé</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1/api/utilisateur/{id}"
      }
    ],
    "filename": "../../app/app.php",
    "groupTitle": "Utilisateurs"
  }
] });
