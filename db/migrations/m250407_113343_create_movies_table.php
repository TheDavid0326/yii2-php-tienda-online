<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%movies}}`.
 */
class m250407_113343_create_movies_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('movies', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'price' => $this->float()->notNull(),
            'image' => $this->string(2500)->notNull(),
            'release_date' => $this->date()->null(),
            'duration' => $this->integer()->null(),
        ]);

        $this->batchInsert('movies', ['id', 'title', 'description', 'price', 'image', 'release_date', 'duration'], [
            [1, 'Avatar', 'En el año 2154, Jake Sully, un exmarine parapléjico, es enviado al exuberante planeta Pandora, donde los humanos explotan recursos naturales. A través de un enlace neuronal, Jake controla un avatar Na’vi y se involucra en la lucha por la supervivencia de la comunidad indígena.', 3.99, 'uploads/Avatar.jpg', '2009-12-18', 162],
            [2, 'Aquaman', 'Arthur Curry, heredero del reino de Atlantis, debe aceptar su destino como gobernante del océano y detener a su medio hermano Orm, quien busca la guerra contra la humanidad. Con la ayuda de Mera y Vulko, Arthur emprende una aventura para reclamar su legítimo lugar.', 2.99, 'uploads/Aquaman.jpg', '2018-12-21', 143],
            [3, 'Battleship', 'Una flota naval internacional se enfrenta a una amenaza alienígena en aguas de Hawái. Con tecnología avanzada y estrategias ingeniosas, los humanos intentan repeler la invasión extraterrestre antes de que conquisten el planeta.', 2.99, 'uploads/Battleship.jpg', '2012-05-18', 131],
            [4, 'Ahora me ves', 'Un grupo de ilusionistas, conocidos como "Los Cuatro Jinetes", realiza espectáculos mágicos que involucran robos imposibles. Mientras el FBI los persigue, su juego de engaños y revelaciones se vuelve cada vez más peligroso.', 1.99, 'uploads/Ahora me ves.jpg', '2013-05-31', 115],
            [5, 'Pacific Rim', 'En un futuro devastado por monstruos colosales llamados Kaijus, la humanidad construye gigantescos robots, los Jaegers, para combatir la amenaza. Un piloto retirado y una joven cadete son la última esperanza para cerrar el portal interdimensional que los trae.', 4.99, 'uploads/Pacific Rim.jpg', '2013-07-12', 131],
            [6, 'Prison Break', 'Michael Scofield idea un plan meticuloso para infiltrarse en la prisión donde su hermano Lincoln ha sido condenado injustamente. Con ingenio, códigos tatuados en su cuerpo y una red de aliados, intentará ejecutar una de las fugas más audaces.', 3.49, 'uploads/Prison Break.jpg', '2005-08-29', 44],
            [7, 'Soy Leyenda', 'Robert Neville es el último humano vivo en Nueva York tras una epidemia que convirtió a la población en criaturas nocturnas. Sobrevive acompañado de su perro y busca desesperadamente una cura para la infección.', 4.79, 'uploads/Soy Leyenda.jpg', '2007-12-14', 101],
            [8, 'Spider-man: No way home', 'Peter Parker enfrenta las consecuencias de que su identidad secreta haya sido revelada. Para revertirlo, pide ayuda a Doctor Strange, pero la magia provoca la llegada de villanos de diferentes universos.', 5.99, 'uploads/Spiderman No Way Home.jpg', '2021-12-17', 148],
            [9, 'Star Trek', 'James T. Kirk y Spock deben dejar de lado sus diferencias para salvar a la Federación de un poderoso enemigo. La tripulación del USS Enterprise emprende una aventura llena de acción, ciencia ficción y exploración espacial.', 4.49, 'uploads/Star trek.jpg', '2009-05-08', 127],
            [10, 'Tarzán', 'Criado por gorilas en la selva, Tarzán regresa a la civilización y descubre un complot para explotar los recursos naturales de su hogar. Deberá decidir entre su vida humana y su legado salvaje.', 3.79, 'uploads/Tarzán.jpg', '2016-07-01', 94],
            [11, 'Origen', 'Dom Cobb es un experto en infiltrarse en los sueños para extraer secretos corporativos. En su última misión, en lugar de robar información, debe implantar una idea sin que el objetivo sospeche.', 5.49, 'uploads/Origen.jpg', '2010-07-16', 148],
            [12, 'Alita: Ángel de Combate', 'En un mundo futurista, una joven cyborg con habilidades de combate despierta sin recuerdos de su pasado. Mientras intenta descubrir su verdadera identidad, se enfrenta a poderosos enemigos que quieren controlarla.', 4.99, 'uploads/Alita - Ángel de combate.jpg', '2019-02-14', 122],
            [13, 'Capitán América: Civil War', 'Los Vengadores se dividen entre los que apoyan la regulación gubernamental y quienes creen que deben actuar libremente. Steve Rogers y Tony Stark lideran bandos opuestos en un conflicto que cambiará el equipo para siempre.', 4.99, 'uploads/Capitán América - Civil War.jpg', '2016-04-28', 147],
            [14, 'Capitán América: El Soldado de Invierno', 'Steve Rogers descubre una conspiración en S.H.I.E.L.D. que amenaza la seguridad mundial. En su lucha por la verdad, se enfrenta a un misterioso asesino con una conexión personal inesperada.', 3.99, 'uploads/Capitán América - El soldado de invierno.jpg', '2014-04-04', 136],
            [15, 'Chernobyl', 'Serie basada en hechos reales sobre la explosión del reactor nuclear en 1986. Explora el desastre, sus consecuencias y el heroico sacrificio de quienes intentaron minimizar los daños.', 9.99, 'uploads/Chernobyl.jpg', '2019-05-06', 322],
            [16, 'El Caballero Oscuro', 'Batman enfrenta a su peor enemigo, el Joker, un criminal caótico que desata el terror en Gotham. Con la ayuda del fiscal Harvey Dent y el comisionado Gordon, lucha por restaurar el orden.', 3.99, 'uploads/El caballero oscuro.jpg', '2008-07-18', 152],
            [17, 'El Clan de los Rompehuesos', 'Paul Crewe, exjugador de fútbol americano, es condenado a prisión y obligado a formar un equipo de reclusos para enfrentar a los guardias en un partido brutal.', 3.99, 'uploads/El clan de los rompehuesos.jpg', '2005-05-27', 113],
            [18, 'Gladiador', 'Máximo Décimo Meridio, un leal general romano, es traicionado y convertido en esclavo. Convirtiéndose en gladiador, busca venganza contra el emperador responsable de la muerte de su familia.', 4.99, 'uploads/Gladiator.jpg', '2000-05-05', 155],
            [19, 'Guardianes de la Galaxia Vol. 3', 'Star-Lord y su equipo emprenden una peligrosa misión que pone en riesgo el futuro de los Guardianes. Viejos enemigos resurgen mientras enfrentan un desafío que podría destruirlos.', 5.99, 'uploads/Guardianes de la galaxia Vol 3.jpg', '2023-05-05', 150],
            [20, 'Guardianes de la Galaxia Vol. 1', 'Un grupo de forajidos intergalácticos se une para detener a un poderoso villano. Pese a sus diferencias, aprenderán a trabajar juntos y a forjar una familia inesperada.', 3.99, 'uploads/Guardianes de la galaxia.jpg', '2014-08-01', 122],
            [21, 'King Kong', 'En este remake del clásico de 1933, un grupo de cineastas viaja a la misteriosa Isla Calavera, donde descubren a un colosal simio llamado Kong. La criatura desarrollará un vínculo especial con la actriz protagonista, mientras lucha contra los peligros de la isla y la codicia humana.', 3.99, 'uploads/King Kong.jpg', '2005-12-14', 187],
            [22, 'Los Vengadores', 'Nick Fury, director de S.H.I.E.L.D., reúne a un equipo de superhéroes —Iron Man, Capitán América, Thor, Hulk, Viuda Negra y Ojo de Halcón— para enfrentar la amenaza de Loki, quien busca conquistar la Tierra con ayuda de un ejército alienígena.', 4.99, 'uploads/Los vengadores.jpg', '2012-05-04', 143],
            [23, 'The Greatest Showman', 'Inspirada en la vida de P.T. Barnum, la película narra la historia del nacimiento del mayor espectáculo de entretenimiento del mundo. Con un enfoque en la diversidad y el espíritu emprendedor, Barnum reúne a personas extraordinarias para crear un show nunca antes visto.', 5.29, 'uploads/The greatest showman.jpg', '2017-12-20', 105],
            [24, 'Vengadores: Infinity War', 'Thanos, el titán loco, está en busca de las seis Gemas del Infinito con el objetivo de equilibrar el universo a su manera. Los Vengadores y sus aliados luchan desesperadamente para evitar que logre su plan de erradicar a la mitad de la población con un solo chasquido.', 5.99, 'uploads/Vengadores Infinity War.jpg', '2018-04-26', 149],
            [25, 'Vengadores: Endgame', 'Después de la devastación causada por Thanos, los Vengadores sobrevivientes emprenden un último y arriesgado plan para revertir la tragedia. Con sacrificios inesperados y un enfrentamiento épico, los héroes luchan por restaurar lo que se perdió.', 5.99, 'uploads/Vengadores Endgame.jpg', '2019-04-25', 181],
        ]);

        // Configurar AUTO_INCREMENT
        $this->db->createCommand("ALTER TABLE movies AUTO_INCREMENT = 26")->execute();

        // Opcional: establecer el motor InnoDB y el charset
        // $this->db->createCommand("ALTER TABLE movies ENGINE = InnoDB")->execute();
        // $this->db->createCommand("ALTER TABLE movies DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_general_ci")->execute();
    }

    public function safeDown()
    {
        $this->dropTable('movies');
    }
}
