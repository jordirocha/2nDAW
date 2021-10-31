## StoreApp amb llistes
Volem implementar una aplicació que gestioni productes d'una botiga. Cada un dels productes (Product) està caracteritzat per un codi (code únic de tipus String ), una descripció (name de tipus String), un preu (price de tipus double) i un valor d'stock (stock de tipus int).  
La botiga només ven dos tipus de productes: Tv i Fridge. Els productes Tv es caracteritzen per tenir un valor de polzades (inches de tipus int), i els productes Fridge es caracteritzen per tenir una capacitat (capacity de tipus int) i l'atribut noFrost de tipus boolean.

L'aplicació StoreAp ha d'implementar les següents funcionalitats:

1) Llistar tots els productes
2) Cercar producte per codi
3) Afegir producte
4) Modificar producte
5) Eliminar producte
6) Cercar productes amb un stock per sota d'un valor
7) Cercar productes per tipus (Tv o Fridge)

Cal capturar els errors i comunicar a l'usuari el resultat de cada una de les accions.
Cal assignar correctament les responsabilitats als mètodes i classes.