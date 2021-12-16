

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>partie 7 exercice 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-dark">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-warning text-center fs-3 p-5">

            <?php
                if ((isset($_POST['civilGender'])) || (isset($_POST['firstname'])) || (isset($_POST['lastname']))) { ?>
                    <?='Je suis '.$_POST['civilGender'].' '.$_POST['firstname'].' '.$_POST['lastname'];?>
                
                <?php
                } 
                
                if (isset($_FILES['files']) && $_FILES['files']['error'] == 0) {
                
                       // Testons si le fichier n'est pas trop gros                
                    if ($_FILES['files']['size'] <= 1000000) {
                
                    // Testons si l'extension est autorisée                
                        $fileInfo = pathinfo($_FILES['files']['name']);
                        $fileName = $fileInfo['filename'];
                        $extension = $fileInfo['extension'];
                        // var_dump($fileInfo);
                        $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
                
                        if (in_array($extension, $allowedExtensions)) { ?>

                        <p class="text-success m-5">
                            <a href=""><?=$fileName.".".$extension;?></a> 
                        </p>

                        <?php 
                        } else { ?>

                        <p class="text-danger m-5">
                            <?="Ce type de fichier n'est pas autorisé !"?>
                        </p>                
                            <!-- On peut valider le fichier et le stocker définitivement                 -->
                            <!-- move_uploaded_file($_FILES['files']['tmp_name'], 'uploads/' . basename($_FILES['files']['name'])); -->                            
                <?php
                        }                
                    }          
                } else { ?>

                    <form action="index.php" method="POST" enctype="multipart/form-data">
                    <label for="firstname" class="form-label">Civilité</label>                 
                    <select class="form-select form-select-mb mb-3" name="civilGender" aria-label=".form-select-mb example">
                        <option value=Mr>Mr</option>
                        <option value=Mme>Mme</option>                    
                    </select>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="firstname">                          
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="lastname">
                    </div>

                        <div>
                            <label class="form-label" for="customFile" >Choisissez un fichier</label>
                            <input type="file" class="form-control" id="customFile" name="files"/>
                        </div>
            
                        <button type="submit" class="btn btn-warning mt-5" name="envoi">Envoyer</button> 
                    </form>

                <?php
                }
            ?>

            </div>
        </div>
    </div>
</div>


</body>
</html>
