
<?php include "head.php" ?>

<?php
    $recupArticle = $bdd->query('SELECT * FROM article ORDER BY id DESC');
    if(!empty($_GET['search']))
        {
            $search = htmlspecialchars($_GET['search']);
            $recupArticle = $bdd->query("SELECT * FROM article WHERE CONCAT(title,prix) LIKE '%$search%' ORDER BY id DESC");
        }

    if(isset($_POST['delete_article']))
    {
        $id = $_GET['id'];
        $deleteProduct = $bdd->prepare("DELETE FROM article WHERE id = ?");
    
        $execute = $deleteProduct->execute(array($id));
    
        if($execute)
        {
            $msg = 'Article supprimé avec succès';
        }
    }
 ?>

<div class="col-lg-10 offset-lg-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>
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
      <canvas class="my-4 w-100" id="myChart" width="900" height="50"></canvas>
      <h2>Produits</h2>
      <div class="col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Photo</th>
              <th scope="col">Titre</th>
              <th scope="col">Sous-titre</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <?php
              if($recupArticle->rowCount() > 0)
                  {
                      ?>
                    <?php
                      while($article = $recupArticle->fetch())
                      {
                      ?>
          <tbody>
            <tr>
              <td><img width="90" height="90" src="../avatars/<?= $article['image']?>" alt=""></td>
              <td><?= $article['title']?></td>
              <td><strong><?= $article['subtitle']?></strong></td>
              <td>
                <form action="?id=<?= $article['id']?>" method="POST">
                  <button name="delete_article" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          </tbody>
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
        </table>
        <div>
          {{$products->links()}}
        </div>
      </div>
</div>

<?php include "foot.php" ?>



