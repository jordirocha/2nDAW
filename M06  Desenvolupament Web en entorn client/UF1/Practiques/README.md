## EXERCICI 1
Escriu el teu DNI complet (exemple 12345678Z) i el programa respon si és o no correcte. Escriu el resultat per pantalla i per consola

## EXERCICI 2 
Escriu un programa que ens deixi introduir una frase qualsevol i ens mostri si és o no palíndroma. Escriu el resultat per pantalla i per consola
## EXERCICI 3 
Programa que :
- demana 6 números per pantalla i els fica dins d’un array.
- mostrar l’array sencer en el cos de la pàgina i a la consola.
- treu el vector ordenat i el mostra en el cos de la pàgina i a la consola.
- inverteix el seu ordre i el mostra en el cos de la pàgina i a la consola.
- mostra el total d’elements de l’array.
- busca un valor introduït per l’usuari i ens diu si hi és o no a l’array i, en el cas que hi sigui, ens dóna la seva posició

## EXERCICI 4
Realitza una pàgina que faci estadístiques sobre una cadena de text que li passem: comptant el nombre de vegades que apareix cada lletra, nombre de paraules totals, primera paraula, darrera paraula, les paraules col·locades en ordre invers, les paraules ordenades de la a la z i les paraules ordenades de la z a la a. Utilitzar un Array per emmagatzemar la informació estadística.

## EXERCICI 7

S’ha de crear una web de reserva d’entrades que consta d’una pàgina principal amb 3 elements:

1 - Iframe 1: Formulari (elements: input, select, input, button)
Aquest formulari demana el nom (input), l’espectacle que vols reservar (select entre teatre i cine) i la quantitat d’entrades (input).
Al clickar el botó “calcular” s’han de validar els inputs, s’ha d’actualitzar el iframe 2 indicant el preu total i s’ha de canviar l’estat del procés de reserva al div de la pàgina principal.

2 - Iframe 2: Acceptació (elements: button)
Mostra el preu total de la reserva en funció de les dades del formulari del iframe1.
Quan l’usuari accepta el preu fent click el botó “acceptar”, s’actualitza l’estat del procés de reserva al div de la pàgina principal i s’obre una finestra nova on es mostra la següent informació:

- Nom
- Espectacle
- Quantitat d’entrades
- Preu total

A la nova finestra ha d’haver-hi 2 botons, un per tancar la finestra i un altre per imprimir el contingut. Quan l’usuari imprimeix el contingut també s’ha d’actualitzar l’estat del procés de reserva al div de la pàgina principal.


3 - Div: Estat del procés
Els estats del procés de reserva són els següents:

- “Esperant les dades de l’usuari”
- “Pendent de l’acceptació del preu”
- “Reserva feta”
- “Reserva feta i finestra impresa”