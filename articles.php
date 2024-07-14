<?php
session_start();
require ('config.php');

$recupArticle = $bdd->query('SELECT * FROM article ORDER BY id DESC');
        
if(!empty($_GET['search']))
{
    $search = htmlspecialchars($_GET['search']);
    $recupArticle = $bdd->query("SELECT * FROM article WHERE CONCAT(title,prix) LIKE '%$search%' ORDER BY id DESC");
}


if(isset($_POST['ajout']))
{
    $title = htmlspecialchars($_POST['title']);
    $recupProduct = $bdd->prepare('SELECT * FROM panier WHERE title = ?');

    $recupProduct->execute(array($title));

    if($recupProduct->rowCount() > 0)
    {
        $already = "L'article a déja été ajouté au panier";
    }else
    {                

                $image = htmlspecialchars($_POST['image']);
                $title = htmlspecialchars($_POST['title']);
                $prix = htmlspecialchars($_POST['prix']);
                $quantity = htmlspecialchars($_POST['quantity']);

                $insertProduct = $bdd->prepare('INSERT INTO panier(title,prix,quantity,image) VALUES(?,?,?,?)');

                $duplicata = $insertProduct->execute(array($title,$prix,$quantity,$image));


                

                $msg = 'Article Ajouté au panier avec succès';


    }

}

if(isset($_POST['delete_article']))
    {
        $id = $_GET['id'];
        $recupProduct = $bdd->prepare("DELETE FROM article WHERE id = ?");
    
        $execute = $recupProduct->execute(array($id));
    
            $supp = 'Article supprimé avec succès';
    }


        if(isset($_GET['categorie']))
        {
            $category_id = $_GET['categorie'];

            $recupArticle = $bdd->prepare('SELECT * FROM article WHERE category_id = ? ');

            $recupArticle->execute(array($category_id));
        }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Application web qui féra le pont entre artisans et client">
    <meta name="keywords" content="ecommerce, artisans, artisan, articles, e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Entreprise66.png.jpg">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENTREPRISE 66</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        #select{
            width: 200px !important;
        }
    </style>
</head>

<body>
<?php include "base/header.php"; ?>
    <!-- Header Section End -->
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option" style="margin-top:100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="index.php"><i class="fa fa-home"></i> ACCUEIL</a>
                        <span>ARTICLES</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php 
        if(!empty($msg))
        {
            ?>
            <div class="container">
                <div class="alert alert-success">
                    <button type="button" data-dismiss="alert" class="close">&times;</button>
                    <?php echo $msg; ?>
                </div>
            </div>
            <?php
        }
    ?>
    <?php 
        if(!empty($already))
        {
            ?>
            <div class="container">
                <div class="alert alert-danger">
                    <button type="button" data-dismiss="alert" class="close">&times;</button>
                    <?php echo $already; ?>
                </div>
            </div>
            <?php
        }
    ?>
    <?php 
        if(!empty($supp))
        {
            ?>
            <div class="container">
                <div class="alert alert-danger">
                    <button type="button" data-dismiss="alert" class="close">&times;</button>
                    <?php echo $supp; ?>
                </div>
            </div>
            <?php
        }
    ?>

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div>
                                            <option value=""></option>
                                            <?php
                                                $recupCategory = $bdd->query('SELECT * FROM category');

                                                while($category = $recupCategory->fetch())
                                                {
                                                    ?>
                                                    <a href="?categorie=<?= $category['id'] ?>" class="text-secondary">- <?= $category['title']; ?></a></br>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Filter par prix</h4>
                            </div>
                            <div>
                                <form action="" method="get">
                                <p>Prix : </p>
                                <select name="search" id="" id="select" class="form-control">
                                    <option value=""></option>
                                    <option value="1000"><?= number_format(1000,2) ?></option>
                                    <option value="2000"><?= number_format(2000,2) ?></option>
                                    <option value="3000"><?= number_format(3000,2) ?></option>
                                    <option value="5000"><?= number_format(5000,2) ?></option>
                                    <option value="10000"><?= number_format(10000,2) ?></option>
                                    <option value="20000"><?= number_format(20000,2) ?></option>
                                    <option value="50000"><?= number_format(50000,2) ?></option>
                                    <option value="100000"><?= number_format(100000,2) ?></option>
                                    <option value="200000"><?= number_format(200000,2) ?></option>
                                    <option value="500000"><?= number_format(500000,2) ?></option>
                                    <option value="1000000"><?= number_format(1000000,2) ?></option>
                                </select>
                                    <br><br><button class="btn btn-default border-danger" type="submit">Filtrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        if($recupArticle->rowCount() > 0)
                        {
                            ?>
                        <?php
                        while($article = $recupArticle->fetch())
                        {
                            ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="avatars/<?= $article['image'] ?>">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <?php if(isset($_SESSION['id_artisan'])): ?>
                                        <?php
                                        $artisanconnect = $_SESSION['id_artisan'];

                                        if($article['artisan_id'] === $artisanconnect)
                                        {
                                            ?>
                                            <li><a href="edit.php?id=<?= $article['id']; ?>"><span class="icon_pencil-edit"></span></a></li>
                                            <li>
                                                <form action="?id=<?= $article['id']; ?>" method="post">
                                                    <button name="delete_article" type="submit" style="border:none;background-color:transparent"><a href="#"><span class="fa fa-trash"></span></a></button>
                                                </form>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <?php endif; ?>
                                        <li><a href="avatars/<?= $article['image'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <input type="hidden" value="<?= $article['title']; ?>" name="title">
                                                <input type="hidden" value="<?= $article['prix']; ?>" name="prix">
                                                <input type="hidden" value="1" name="quantity">
                                                <input type="hidden" value="<?= $article['image'] ?>" name="image">
                                                <button style="background:transparent;border:none" type="submit" name="ajout"><a href="#"><span class="icon_bag_alt"></span></a></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="show.php?id=<?= $article['id']; ?>"><?php echo $article['title']; ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price"><?php echo number_format($article['prix'],2); ?> FCFA</div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                       <?php
                      }else{
                        ?>
                        <h3 class="text-danger text-center">Aucun résultat</h3>
                        <?php
                      }
                    ?>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    <?php include "base/footer.php" ?>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>