-- DROP DATABASE IF EXISTS final;
-- CREATE DATABASE IF NOT EXISTS final;
-- USE final;

CREATE TABLE final_membre (
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    date_naissance DATE,
    genre Char,
    email VARCHAR(50),
    ville VARCHAR(50),
    mdp VARCHAR(50),
    image_profil VARCHAR(50)
);

CREATE TABLE final_categorie_objet (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(50)
);

CREATE TABLE final_objet (
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(50),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_membre) REFERENCES final_membre(id_membre),
    FOREIGN KEY (id_categorie) REFERENCES final_categorie_objet(id_categorie)
);

CREATE TABLE final_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(50),
    FOREIGN KEY (id_objet) REFERENCES final_objet(id_objet)
);

CREATE TABLE final_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT NOT NULL,
    date_emprunt DATE NOT NULL,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES final_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES final_membre(id_membre)
);

INSERT INTO final_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Jean Dupont', '1990-05-15', 'H', 'jean.dupont@email.com', 'Paris', ' ', 'jean.jpg'),
('Marie Martin', '1985-08-22', 'F', 'marie.martin@email.com', 'Lyon', ' ', 'marie.jpg'),
('Pierre Durand', '1995-03-10', 'H', 'pierre.durand@email.com', 'Marseille', ' ', 'pierre.jpg'),
('Sophie Lambert', '1988-11-30', 'F', 'sophie.lambert@email.com', 'Toulouse', ' ', 'sophie.jpg');

INSERT INTO final_categorie_objet (nom_categorie) VALUES 
('esthetique'), ('bricolage'), ('mecanique'), ('cuisine');

INSERT INTO final_objet (nom_objet, id_categorie, id_membre) VALUES
('Perceuse', 2, 1), ('Pinceau', 2, 1), ('Marteau', 2, 1), ('Tournevis', 2, 1),
('Pince à épiler', 1, 1), ('Sèche-cheveux', 1, 1),
('Clé à molette', 3, 1), ('Jack de voiture', 3, 1),
('Mixeur', 4, 1), ('Robot culinaire', 4, 1),
('Ponceuse', 2, 2), ('Scie', 2, 2), ('Niveau', 2, 2),
('Maquillage', 1, 2), ('Crème hydratante', 1, 2), ('Brosse à cheveux', 1, 2),
('Cric', 3, 2), ('Trousse à outils', 3, 2),
('Grille-pain', 4, 2), ('Casserole', 4, 2),
('Scie sauteuse', 2, 3), ('Établi pliant', 2, 3),
('Pinceau de maquillage', 1, 3), ('Éponge de beauté', 1, 3), ('Rasoir électrique', 1, 3),
('Compresseur', 3, 3), ('Valise à outils', 3, 3), ('Batterie de voiture', 3, 3),
('Four à micro-ondes', 4, 3), ('Cocotte minute', 4, 3),
('Échelle', 2, 4), ('Cloueur', 2, 4),
('Poudre compacte', 1, 4), ('Vernis à ongles', 1, 4), ('Lisseur', 1, 4),
('Démonte-pneu', 3, 4), ('Chargeur de batterie', 3, 4),
('Machine à café', 4, 4), ('Batteur électrique', 4, 4), ('Poêle antiadhésive', 4, 4);

INSERT INTO final_images_objet (id_objet, nom_image) VALUES
(1, 'perceuse.jpg'), (2, 'pinceau.jpg'), (5, 'pince_epiler.jpg'), 
(10, 'robot_culinaire.jpg'), (14, 'maquillage.jpg'), (20, 'casserole.jpg');

INSERT INTO final_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2023-01-10', '2023-01-20'),
(5, 3, '2023-02-15', '2023-02-25'),
(10, 4, '2023-03-05', '2023-03-15'),
(14, 1, '2023-04-12', '2023-04-22'),
(20, 2, '2023-05-18', '2023-05-28'),
(25, 3, '2023-06-07', '2023-06-17'),
(30, 4, '2023-07-21', '2023-07-31'),
(35, 1, '2023-08-14', '2023-08-24'),
(40, 2, '2023-09-03', '2023-09-13'),
(3, 3, '2023-10-11', '2023-10-21');


CREATE OR REPLACE VIEW v_objet_detail AS
SELECT 
    o.id_objet,
    o.nom_objet,
    o.id_categorie,
    c.nom_categorie,
    o.id_membre,
    m.nom AS nom_membre
FROM final_objet o
JOIN final_categorie_objet c ON o.id_categorie = c.id_categorie
JOIN final_membre m ON o.id_membre = m.id_membre;

CREATE OR REPLACE VIEW v_objet_images AS
SELECT 
    v.id_objet,
    v.nom_objet,
    v.id_categorie,
    v.nom_categorie,
    v.id_membre,
    v.nom_membre,
    i.id_image,
    i.nom_image
FROM v_objet_detail v
JOIN final_images_objet i ON v.id_objet = i.id_objet;

CREATE OR REPLACE VIEW v_objet_images_simple AS
SELECT 
    v.id_objet,
    v.nom_objet,
    v.id_categorie,
    v.id_membre,
    i.nom_image
FROM v_objet_detail v
JOIN final_images_objet i ON v.id_objet = i.id_objet;

INSERT INTO final_emprunt (id_objet, id_membre, date_emprunt, date_retour) 
VALUES (40, 5, '2023-10-25', '2023-10-30' );

ALTER TABLE final_membre
ADD COLUMN etat INT DEFAULT 1;