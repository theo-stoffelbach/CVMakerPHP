<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="style.css" rel="stylesheet">
    <link href="https://imgs.search.brave.com/5qc7TkuIaSZkIrplnjDgC8gZQs8NPKpJh3D8odP4rxk/rs:fit:512:512:1/g:ce/aHR0cHM6Ly9pY29u/cy1mb3ItZnJlZS5j/b20vaWNvbmZpbGVz/L3BuZy81MTIvYnVs/YmFzYXVyLTEzMjA1/NjgxNzg2NTQwMTE1/NDAucG5n"
          rel="icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="script.js"></script>

    <title>Template Web site by Théo</title>
</head>
<body>
<h1>
    Flo est BO 
</h1>

<?php 

require '../Model/ConnexionDb.php'; // for the DB connexion
require '../Controller/GetDataForForm.php'; // for get data and put in the form

?>

    <form action="../Controller/ControllerCV.php" method="post">
        <label for="lastname">Nom:</label> <input type="text" name="lastname" value="<?php echo $data['lastname'] ?? ''; ?>" placeholder=""><br>        
        <label for="firstname">Prénom:</label> <input type="text" name="firstname" value="<?php echo $data['firstname'] ?? ''; ?>"><br>
        
        <label for="email">Email:</label> <input type="text" name="email" value="<?php echo $data['email'] ?? ''; ?>"><br>
        <label for="phone">numéro de téléphone:</label>  <input type="text" name="phone" value="<?php echo $data['phone'] ?? ''; ?>"><br>

        <label for="job">Intitulé du post :</label>  <input type="text" name="job" value="<?php echo $data['job'] ?? ''; ?>"><br>
        <label for="experience">Expérience professionnel : </label> <textarea name="experience" id="experience" cols="30" rows="10"><?php echo $data['experience'] ?? ''; ?></textarea><br>
        <label for="school">Parcours académique : </label> <textarea name="school" id="school" cols="30" rows="10" ><?php echo $data['school'] ?? ''; ?></textarea><br>
        <label for="hobbies">Hobbies :</label> <textarea name="hobbies" id="Hobbies" cols="30" rows="10" ><?php echo $data['hobbies'] ?? ''; ?></textarea><br>

        <input type="submit">
      </form>

      <form action="./index.php" method="get">
        <label for="lastname">Id du CV à importer : </label> <input type="text" name="Id" placeholder="Id"><br>
        <input type="submit" value="Réccuperer">
      </form>

</body>
</html>