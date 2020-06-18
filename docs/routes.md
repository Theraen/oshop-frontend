# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/legal-mentions` | `GET` | `MainController` | `legalMentions` | Mention légales | Legal notices of the site | - |
| `/catalog/category/[i:idCategory]` | `GET` | `CatalogController` | `category` | category's name | category's products | [`idCategory`] is id of Category to display |
| `/catalog/type/[i:idType]` | `GET` | `CatalogController` | `type` | type's name | type's products + type déscription | [`idType`] is id of Type to display |
| `/catalog/brand/[i:idBrand]` | `GET` | `CatalogController` | `brand` | brand's name | brand's products | [`idBrand`] is id of Brand to display |
| `/catalog/product/[i:idProduct]` | `GET` | `CatalogController` | `products` | product's name | product description | [`idProduct`] is id of Product to display |