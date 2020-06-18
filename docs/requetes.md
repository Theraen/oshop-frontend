# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Récupérer le produit ayant un id donné (#2)

```sql
SELECT *
FROM product
WHERE id = 2
```

## Récupérer le produit et la marque ainsi que la categorie ayant un id donné (#2)

```sql
SELECT product.*, brand.name AS brand_name, category.name AS category_name
FROM product
INNER JOIN brand
ON brand_id = brand.id
INNER JOIN category
ON category_id = category.id
WHERE product.id = 2
```

## Récupérer tous les produit de la marque ayant un id (#2)

```sql
SELECT *
FROM product
WHERE brand_id = 2
```

## Récupérer tous les produit d'une category ayant un id (#3)

```sql
SELECT *
FROM product
WHERE category_id = 3
```

## Récupérer tous les produit d'un type ayant un id (#4)

```sql
SELECT *
FROM product
WHERE type_id = 4
```

## Récupérer la liste des 5 categorie de la page d'accueil

```sql
SELECT *
FROM category
WHERE home_order != 0
ORDER BY home_order ASC
```

## Récupérer la liste des 5 type du footer

```sql
SELECT *
FROM type
WHERE footer_order != 0
ORDER BY footer_order ASC
```

## Récupérer la liste des 5 marques du footer

```sql
SELECT *
FROM brand
WHERE footer_order != 0
ORDER BY footer_order ASC
```

## Récupérer une categorie depuis son Id (#2)

```sql
SELECT *
FROM category
WHERE id = 2
```

## Récupérer toutes les categorie

```sql
SELECT *
FROM category
```

## Récupérer une marque depuis son Id (#2)

```sql
SELECT *
FROM brand
WHERE id = 2
```

## Récupérer toutes les marques

```sql
SELECT *
FROM brand
```

## Récupérer un type depuis son Id (#2)

```sql
SELECT *
FROM type
WHERE id = 2
```

## Récupérer tous les type

```sql
SELECT *
FROM type
```