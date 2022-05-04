-- INSERT INTO hiking (name,difficulty,distance,duration,height_difference)
-- VALUES ('Le Sentier des Sources enter Cilaos et Bras Sec', 'Facile',4800, '01:15', 280),
-- ('Le sommet du Piton Béthoune par le tour du Bonnet de Pretre', 'Très difficile', 5700, '04:00', 650),
-- ('Le Dimitile depuis Bras Sec par le Kerveguen', 'Difficile',24500, '10:00', 1550),
-- ('De la Mare à Joncs à Cilaos par le Kervegueun et le Gite de la Caverne Dufour', 'Difficile',16500, '07:00', 1420);
ALTER TABLE
  hiking
ADD
  available boolean;
CREATE TABLE users (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Pseudo VARCHAR(30) NOT NULL,
    DateInscription TIMESTAMP
  );
ALTER TABLE
  users
ADD
  mdp VARCHAR(15);