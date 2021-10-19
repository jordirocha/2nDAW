PRÀCTICA PUNTUABLE (DAW-2)
Pt1- UF1
Volem crear una web per realitzar enquestes. Es tractaria d’entrar a l’enquesta en 
funció d’un codi que ens han d’haver passat.
Res més entrar en aquesta web (arxiu index.php) només veurem un menú amb les 
opcions de Home (és a dir, index.php),, Login i Register (que ara mateix no aniran 
enlloc) i un formulari just a sota del menú per poder entrar a l’enquesta (associada a 
un codi)
Imatge il·lustrativa:
Les enquestes estaran «emmagatzemades» en algun lloc dins de l’aplicació, per 
exemple, en un o més vectors associatius. Pensa que hauràs de tenir guardats el codi 
per accedir a una enquesta, l’enquesta associada, a més de les respostes correctes a 
cada pregunta. De cada enquesta necessitem el seu títol, les preguntes i les possibles 
respostes.
Una idea podria ser:
Tenir dos arrays associatius de manera que :
a) un primer array ($arrayEnquesta) contingui els codis amb l’enquesta:
la key de cada component és el codi associat i el value és el títol; les 
preguntes i les possibles respostes. Per exemple,
["C34568D" => 
"Comprovem quant saps de futbol; 1.-Quin és l’actual entrenador de l’Atlético de Madrid;Luis Enrique:Diego 
Simeone:Ronald Koeman:Pochettino; 2.-Quants equips hi ha a la primera divisió?;45:12:7:Cap de les anteriors; etc...",
"D34gTf"=>
 CURS 2021-2022 1/3
Generalitat de Catalunya
Departament d’Educació
INS Provençana
PRÀCTICA PUNTUABLE (DAW-2)
"Parlem una mica d’història; etc",
...]
b) un segon array ($arrayRespostes) contingui els codis i la resposta bona a 
cada pregunta. Per exemple:
["C34568D" => "1a; 2a;3b;..."
"D34gTf"=>"1a; 2a;3b;..."
...]
ÉS CONDICIÓ IMPRESCINDIBLE QUE LA WEB ESTIGUI MAQUETADA AMB
UN CSS PROPI O AMB EL FRAMEWORK BOOTSTRAP.
Exercici 1.- 1 punt
Plantejar aquesta web tal i com es descriu i validar, al formulari de sota del menú, que
el codi sigui una seqüència d’entre 4 i 10 caràcters (només lletres majúscules,
minúscules i números). Si no és així, el client quedarà informat mitjançant un
missatge i no se li deixarà avançar.
Exercici 2. - 3.5 punts
Si el codi proporcionat és vàlid però no es troba a l’array de les enquestes
($arrayEnquesta), informar a l’usuari al respecte.
Si el codi és vàlid i es troba a l’array $arrayEnquesta, es generarà automàticament
una pàgina amb l’enquesta associada. Aquesta enquesta, per tant, sortirà de recórrer la
cadena en format csv (o qualsevol altra manera que tu hagis pensat) 
Exercici 3.- 3.5 punts
Aquesta enquesta que veus a sobre (faltarien preguntes per veure a la imatge)
acabarà en un botó d’enviament. Un cop cliquem en aquest botó, el programa ha de
ser capaç de mirar de cada pregunta si la resposta ha sigut correcta o no, a més a més,
 CURS 2021-2022 2/3
Generalitat de Catalunya
Departament d’Educació
INS Provençana
PRÀCTICA PUNTUABLE (DAW-2)
de dir el total d’encertades i el total d’errors. Per fer-ho una idea podria ser fent servir
el segon array ($arrayRespostes) que et descrivim més a dalt.
Exercici 4.- 2 punts
A sota d’aquest resum d’encerts, existirà un botó per imprimir a pdf. Per fer-ho 
hauràs de fer servir la llibreria fpdf. Més informació a la següent web
 CURS 2021-2022 3/3