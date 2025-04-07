<?php

use yii\db\Migration;

class m250407_113638_insert_movies_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('movies', ['id', 'title', 'description', 'price', 'image', 'release_date', 'duration'], [
            [1, 'Avatar', 'En el año 2154, un marine parapléjico...', 3.99, 'uploads/Avatar.jpg', '2009-12-18', 162],
            [2, 'Aquaman', 'Arthur Curry, hijo de un farero...', 2.99, 'uploads/Aquaman.jpg', '2018-12-21', 143],
            [3, 'Battleship', 'Cuando una flota naval internacional...', 2.99, 'uploads/Battleship.jpg', '2012-05-18', 131],
            [4, 'Ahora me ves', 'Un equipo de ilusionistas llamado los Cuatro Jinetes...', 1.99, 'uploads/Ahora me ves.jpg', '2013-05-31', 115],
            [5, 'Pacific Rim', 'Cuando legiones de monstruos gigantes...', 4.99, 'uploads/Pacific Rim.jpg', '2013-07-12', 131],
            [6, 'Prison Break', 'Michael Scofield idea un plan para ayudar...', 3.49, 'uploads/Prison Break.jpg', '2005-08-29', 44],
            [7, 'Soy Leyenda', 'Robert Neville (Will Smith) es el último humano...', 4.79, 'uploads/Soy Leyenda.jpg', '2007-12-14', 101],
            [8, 'Spider-man: No way home', 'Peter Parker (Tom Holland) desenmascarado...', 5.99, 'uploads/Spiderman No Way Home.jpg', '2021-12-17', 148],
            [9, 'Star Trek', 'El joven James T. Kirk (Chris Pine) y Spock...', 4.49, 'uploads/Star trek.jpg', '2009-05-08', 127],
            [10, 'Tarzán', 'Tarzan, criado por gorilas, descubre...', 3.79, 'uploads/Tarzán.jpg', '2016-07-01', 94],
            [11, 'Origen', 'Dom Cobb (Leonardo DiCaprio) roba secretos...', 5.49, 'uploads/Origen.jpg', '2010-07-16', 148],
            [12, 'Alita: Ángel de Combate', 'En un futuro postapocalíptico...', 4.99, 'uploads/Alita - Ángel de combate.jpg', '2019-02-14', 122],
            [13, 'Capitán América: Civil War', 'Los Vengadores se dividen en bandos opuestos...', 4.99, 'uploads/Capitán América - Civil War.jpg', '2016-04-28', 147],
            [14, 'Capitán América: El Soldado de Invierno', 'Steve Rogers trabaja en S.H.I.E.L.D...', 3.99, 'uploads/Capitán América - El soldado de invierno.jpg', '2014-04-04', 136],
            [15, 'Chernobyl', 'Drama histórico que relata los devastadores...', 9.99, 'uploads/Chernobyl.jpg', '2019-05-06', 322],
            [16, 'El Caballero Oscuro', 'Batman se alía con el fiscal Harvey Dent...', 3.99, 'uploads/El caballero oscuro.jpg', '2008-07-18', 152],
            [17, 'El Clan de los Rompehuesos', 'Paul Crewe (Adam Sandler), un ex quarterback...', 3.99, 'uploads/El clan de los rompehuesos.jpg', '2005-05-27', 113],
            [18, 'Gladiador', 'Máximo Décimo Meridio, un leal general romano...', 4.99, 'uploads/Gladiator.jpg', '2000-05-05', 155],
            [19, 'Guardianes de la Galaxia Vol. 3', 'El equipo de Guardianes se embarca en una peligrosa misión...', 5.99, 'uploads/Guardianes de la galaxia Vol 3.jpg', '2023-05-05', 150],
            [20, 'Guardianes de la Galaxia Vol. 1', 'Un grupo de inadaptados intergalácticos...', 3.99, 'uploads/Guardianes de la galaxia.jpg', '2014-08-01', 122],
            [21, 'King Kong', 'Remake del clásico de 1933...', 3.99, 'uploads/King Kong.jpg', '2005-12-14', 187],
            [22, 'Los Vengadores', 'Nick Fury de S.H.I.E.L.D. reúne a Iron Man...', 4.99, 'uploads/Los vengadores.jpg', '2012-05-04', 143],
            [23, 'The Greatest Showman', 'Inspirada en la vida de P.T. Barnum...', 5.29, 'uploads/The greatest showman.jpg', '2017-12-20', 105],
            [24, 'Vengadores: Infinity War', 'Thanos busca las seis Gemas del Infinito...', 5.99, 'uploads/Vengadores Infinity War.jpg', '2018-04-26', 149],
            [25, 'Vengadores: Endgame', 'Tras el "chasquido" de Thanos, los Vengadores...', 5.99, 'uploads/Vengadores Endgame.jpg', '2019-04-25', 181],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('movies');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250407_113638_insert_movies_data cannot be reverted.\n";

        return false;
    }
    */
}
