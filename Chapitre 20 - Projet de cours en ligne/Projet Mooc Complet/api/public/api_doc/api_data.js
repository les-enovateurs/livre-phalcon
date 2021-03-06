define({ "api": [
  {
    "type": "get",
    "url": "/api/cours/:id",
    "title": "Récupération d'un cours",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>L'ID du cours à renvoyer.</p>"
          }
        ]
      }
    },
    "name": "infoCours",
    "group": "Cours",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET -d '{\"token\":\"...\"}' http://127.0.0.1/api/cours/1",
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
            "description": "<p>Contient les informations du cours</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/CoursController.php",
    "groupTitle": "Cours"
  },
  {
    "type": "put",
    "url": "/api/cours/modifier/:id",
    "title": "Modifier un cours existant",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>L'ID du cours à renvoyer.</p>"
          }
        ]
      }
    },
    "name": "modifierCours",
    "group": "Cours",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET -d '{\"token\":\"...\", \"nom\":\"Phalcon 4\", \"description\":\"Nouvelle version de Phalcon\"}' http://127.0.0.1/api/cours/modifier/1",
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
            "description": "<p>Contient les informations du cours actualisées</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/CoursController.php",
    "groupTitle": "Cours"
  },
  {
    "type": "post",
    "url": "/api/cours/nouveau",
    "title": "Permet de créer un nouveau cours et de l'associer à l'utilisateur connecté",
    "name": "nouveauCours",
    "group": "Cours",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X POST -d '{\"token\":\"...\", \"nom\":\"Phalcon\", \"description\":\"Un formation dingue\"}' http://127.0.0.1/api/cours/nouveau",
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
            "description": "<p>Contient les informations du cours fraîchement crée</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/CoursController.php",
    "groupTitle": "Cours"
  },
  {
    "type": "delete",
    "url": "/api/cours/supprimer/:id",
    "title": "Supprimer un cours existant",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>L'ID du cours à supprimer.</p>"
          }
        ]
      }
    },
    "name": "supprimerCours",
    "group": "Cours",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET -d '{\"token\":\"...\"}' http://127.0.0.1/api/cours/supprimer/1",
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
            "description": "<p>Indique si le cours a été supprimé</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/CoursController.php",
    "groupTitle": "Cours"
  },
  {
    "type": "post",
    "url": "/api/inscription",
    "title": "Création d'un nouvel utilisateur",
    "name": "InscriptionUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X POST -d '{\"nom\":\"DOE\",\"prenom\":\"Conor\",\"email\":\"conor.doe@les-enovateurs.com\", \"mot_de_passe\":\"azert\"}' http://127.0.0.1/api/inscription",
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
    "filename": "../../app/controllers/IndexController.php",
    "groupTitle": "Utilisateurs"
  },
  {
    "type": "post",
    "url": "/api/connexion",
    "title": "Permet d'authentifier un utilisateur",
    "name": "connexionUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X POST -d '{\"email\":\"conor.doe@les-enovateurs.com\", \"mot_de_passe\":\"azert\"}' http://127.0.0.1/api/connexion",
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
            "description": "<p>Contient les informations de l'utilisateur fraîchement connecté</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/IndexController.php",
    "groupTitle": "Utilisateurs"
  },
  {
    "type": "get",
    "url": "/api/cours",
    "title": "Récupére les cours gérés par l'utilisateur",
    "name": "coursUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET -d '{\"token\":\"...\"}' http://127.0.0.1/api/cours",
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
            "description": "<p>Contient un tableau de cours</p>"
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
    "url": "/api/utilisateur",
    "title": "Récupération de l'utilisateur connecté",
    "name": "infoUtilisateur",
    "group": "Utilisateurs",
    "examples": [
      {
        "title": "Exemple d'utilisation:",
        "content": "curl -i -X GET -d '{\"token\":\"...\"}' http://127.0.0.1/api/utilisateur",
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
            "description": "<p>Contient les informations de l'utilisateur connecté</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "filename": "../../app/controllers/UtilisateursController.php",
    "groupTitle": "Utilisateurs"
  }
] });
