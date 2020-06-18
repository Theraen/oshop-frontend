<?php dump($viewVars); ?>
<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="<?=$viewVars['baseUri'];?>/">Home</a></li>
        <li class="breadcrumb-item active"><?= $viewVars['brand']->getName(); ?></li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading"><?= $viewVars['brand']->getName(); ?></h1>
        <div class="row">
        </div>
      </div>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
          Affichage <strong><?= $viewVars['nbProductInBrand']; ?> </strong>de <strong><?= $viewVars['nbAllProduct']['nbProduct']; ?> </strong>résultats
        </div>
        <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a
            href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
        </div>
        <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
          <select class="custom-select w-auto border-0">
            <option value="orderby_0">Defaut</option>
            <option value="orderby_1">Popularité</option>
            <option value="orderby_2">Vote</option>
            <option value="orderby_3">Nouveauté</option>
          </select>
        </div>
      </header>
      <div class="row">
        <?php
          foreach($viewVars['productList'] as $product):
          $type = $viewVars['type']->find($product->getTypeId());

          $picture = explode('.', $product->getPicture());
          $pictureTn = $picture[0] . '_tn.' . $picture[1];
        ?>
        <!-- product-->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?= $router->generate('route_product', ['idProduct' => $product->getId()]); ?>" class="product-hover-overlay-link">
              <img src="<?=$viewVars['baseUri'] . "/" . $pictureTn; ?>" alt="product" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href="<?= $router->generate('route_product', ['idProduct' => $product->getId()]); ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $type->getName(); ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?= $router->generate('route_product', ['idProduct' => $product->getId()]); ?>" class="text-dark"><?= $product->getName(); ?></a></h3><span class="text-muted"><?= $product->getPrice(); ?>€</span>
          </div>
        </div>
        <!-- /product-->
        <?php endforeach; ?>

      </div>
      
    </div>
  </section>