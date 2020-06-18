<section>
    <div class="container-fluid">
      <div class="row mx-0">

      <?php
        foreach($viewVars['categoryHome6'] as $category):
      ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?=$viewVars['baseUri'] . '/' . $category->getPicture(); ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $category->getName(); ?></h2>
                <a href="<?= $router->generate('route_category', ['idCategory' => $category->getId()]); ?>" class="btn btn-light">Découvrir</a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      <div class="row mx-0">
         
      <?php
        foreach($viewVars['categoryHome4'] as $category):
      ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?=$viewVars['baseUri'] . '/' . $category->getPicture(); ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $category->getName(); ?></h2>
                <a href="<?= $router->generate('route_category', ['idCategory' => $category->getId()]); ?>" class="btn btn-link text-white">Faire un tour
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        
        
      </div>
    </div>
  </section>