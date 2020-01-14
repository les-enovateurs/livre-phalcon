<?php

use Phalcon\Image\Adapter\Gd;

class ImageController extends ControllerBase
{

    public function recuperationDonneeAction()
    {
        $oImage = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        //https://www.php.net/manual/fr/function.exif-imagetype.php
        $aImageType = [
            0  => 'UNKNOWN',
            1  => 'GIF',
            2  => 'JPEG',
            3  => 'PNG',
            4  => 'SWF',
            5  => 'PSD',
            6  => 'BMP',
            7  => 'TIFF_II',
            8  => 'TIFF_MM',
            9  => 'JPC',
            10 => 'JP2',
            11 => 'JPX',
            12 => 'JB2',
            13 => 'SWC',
            14 => 'IFF',
            15 => 'WBMP',
            16 => 'XBM',
            17 => 'ICO',
            18 => 'COUNT'
        ];

        $oFichier            = $oImage->getImage();
        $this->view->mime    = $oImage->getMime();
        $this->view->chemin  = $oImage->getRealpath();
        $this->view->type    = $aImageType[$oImage->getType()];
        $this->view->largeur = $oImage->getWidth();
        $this->view->hauteur = $oImage->getHeight();
    }

    public function conversionJpgVersPngAction()
    {
        $oImage = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        //conversion jpg -> png
        $oImage->save(BASE_PATH . '/public/img/les_enovateurs.png');
    }

    public function reductionQualite30Action()
    {
        $oImage = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        //reduction qualité à 30%
        $oImage->save(BASE_PATH . '/public/img/les_enovateurs_30.jpg', 30);
    }

    public function redimensionLargeurAction()
    {
        //redimensionnement largeur
        $oImageRedimensionLargeur = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRedimensionLargeur->resize(
            1080,
            null,
            \Phalcon\Image::WIDTH
        );

        $oImageRedimensionLargeur->save(BASE_PATH . '/public/img/les_enovateurs_largeur_1080.jpg');
    }

    public function redimensionHauteurAction()
    {
        //redimensionnement hauteur
        $oImageRedimensionHauteur = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRedimensionHauteur->resize(
            null,
            1024,
            \Phalcon\Image::HEIGHT
        );

        $oImageRedimensionHauteur->save(BASE_PATH . '/public/img/les_enovateurs_hauteur_1024.jpg');
    }

    public function redimensionLargeurHauteurPetitAction()
    {
        //redimensionnement de la largeur et de la hauteur precise
        $oImageRedimensionLargeurHauteurAuto = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRedimensionLargeurHauteurAuto->resize(
            1080,
            1024,
            \Phalcon\Image::AUTO
        );

        $oImageRedimensionLargeurHauteurAuto->save(BASE_PATH . '/public/img/les_enovateurs_largeur_1080_hauteur_1024_plus_petit.jpg');
    }

    public function redimensionLargeurHauteurGrosAction()
    {
        //redimensionnement de la largeur et de la hauteur precise
        $oImageRedimensionLargeurHauteurPrecise = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRedimensionLargeurHauteurPrecise->resize(
            1080,
            1024,
            \Phalcon\Image::PRECISE
        );

        $oImageRedimensionLargeurHauteurPrecise->save(BASE_PATH . '/public/img/les_enovateurs_largeur_1080_hauteur_1024_plus_gros.jpg');
    }

    public function redimensionLargeurHauteurSansProportionsAction()
    {
        //redimensionnement de la largeur et de la hauteur sans proportions
        $oImageRedimensionLargeurHauteurSansProportions = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRedimensionLargeurHauteurSansProportions->resize(
            1080,
            1024,
            \Phalcon\Image::TENSILE
        );

        $oImageRedimensionLargeurHauteurSansProportions->save(BASE_PATH . '/public/img/les_enovateurs_largeur_1080_hauteur_1024_sans_proportions.jpg');
    }

    public function reductionHauteurLargeurParDeuxAction()
    {
        //reduction de la hauteur et de la largeur en divisant par 2.
        $oImageRedimensionDivisionParDeux = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRedimensionDivisionParDeux->resize(
            $oImageRedimensionDivisionParDeux->getWidth() / 2,
            $oImageRedimensionDivisionParDeux->getHeight() / 2,
            \Phalcon\Image::TENSILE
        );

        $oImageRedimensionDivisionParDeux->save(BASE_PATH . '/public/img/les_enovateurs_reduction_par_deux.jpg');
    }

    public function rognageAction()
    {
        //rogner l'image
        $oImageRognage = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');
        $oImageRognage->crop(
            800,
            800,
            120,
            20
        );

        $oImageRognage->save(BASE_PATH . '/public/img/les_enovateurs_rogner_800x800.jpg');
    }

    public function rotation60Action()
    {
        //rotation de l'image de 60 degrès
        $oImageRotation = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageRotation->rotate(60);

        $oImageRotation->save(BASE_PATH . '/public/img/les_enovateurs_rotation_60.jpg');
    }

    public function retournementImageVerticalAction()
    {
        //retournement de l'image vertical
        $oImageVertical = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageVertical->flip(\Phalcon\Image::VERTICAL);

        $oImageVertical->save(BASE_PATH . '/public/img/les_enovateurs_rotation_vertical.jpg');
    }

    public function retournementImageHorizontalAction()
    {
        //retournement de l'image horizontal
        $oImageHorizontal = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageHorizontal->flip(\Phalcon\Image::HORIZONTAL);

        $oImageHorizontal->save(BASE_PATH . '/public/img/les_enovateurs_rotation_horizontal.jpg');
    }

    public function filigraneAction()
    {
        //Filigrane
        $oImageAvecFiligrane = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oFiligrane = new Gd(BASE_PATH . '/public/img/filigrane.png');
        $oFiligrane->resize(200, 200);

        $oImageAvecFiligrane->watermark(
            $oFiligrane,
            400,
            400,
            80
        );

        $oImageAvecFiligrane->save(BASE_PATH . '/public/img/les_enovateurs_avec_filigrane.jpg');
    }

    public function brouillardAction()
    {
        //Brouillard
        $oImageBrouillard = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageBrouillard->blur(45);

        $oImageBrouillard->save(BASE_PATH . '/public/img/les_enovateurs_brouillard_45.jpg');
    }

    public function refletAction()
    {
        $oImageReflet = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageReflet->reflection(300);

        $oImageReflet->save(BASE_PATH . '/public/img/les_enovateurs_reflet_300.jpg');
    }

    public function pixiliseAction()
    {
        //Pixelise
        $oImagePixelise = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImagePixelise->pixelate(60);

        $oImagePixelise->save(BASE_PATH . '/public/img/les_enovateurs_pixel_60.jpg');
    }

    public function texteAction()
    {
        $oImageTexte = new Gd(BASE_PATH . '/public/img/les_enovateurs.jpg');

        $oImageTexte->text('Un test', 1000, 1000, 100, '3ADF00');

        $oImageTexte->save(BASE_PATH . '/public/img/les_enovateurs_texte.jpg');
    }

    public function creationAction()
    {
        $oNouvelleImage = new Gd('', 300, 300);

        $oNouvelleImage->save(BASE_PATH . '/public/img/nouvelle_image.jpg');
    }
}