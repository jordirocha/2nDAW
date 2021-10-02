/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author alumne
 */
public class FaunaApp {
    
    /*
    * Write an array with three cats
    */
    public static void main (String arg[]){
        
//        //First cat
//        Cat myCat = new Cat();
//        myCat.setName("Garfield");
//        myCat.setWeight(8.3);
//        
//        //Instantiate another Cat
//        Cat otherCat = new Cat("Garfield",8.3);
//                
//        //Instantiate another Cat
//        Cat thirdCat = new Cat("Tom",3);
//                
//        //Cats Array initialization
//        Cat[] cats= new Cat[3];
//        cats[0]=myCat;         //cats[0]=new Cat("Don gato",7);
//        cats[1]=otherCat;
//        cats[2]=thirdCat;
//        
//        //Prints all cats of the array
//        for (int i=0; i<cats.length;i++){
//            System.out.println(cats[i].toString());
//            cats[i].talk();
//        }
//        
//        //Compares some cats
//        if (myCat.equals(otherCat)){
//            System.out.println("Son iguals");
//        }else{
//            System.out.println("Son diferents");
//        }
//        
//        if (myCat==otherCat){
//            System.out.println("Son iguals");
//        }else{
//            System.out.println("Son diferents");
//        }
//        
//        //Print three instaces of dog
//        //Cats Array initialization
//        Dog[] dogs= new Dog[3];
//        dogs[0]=new Dog("Laika", 50, false);
//        dogs[1]=new Dog("Lassie", 6, false);
//        dogs[2]=new Dog("Bethooven", 2, true);
//        
//        for (int i=0; i<dogs.length;i++){
//         
//        }

//    Animal [] animals = new Animal[4];
//    animals[0] = new Cat("Cat1", 10);
//    animals[1] = new Dog("Dog2", 20, false);
//    animals[2] = new Cat("Cat3", 30);
//    animals[3] = new Dog("Dog4", 40, true);
//    
//   
//    for (Animal a: animals){
//        System.out.println(a.toString());
//        a.talk();
//    }

        //create an array of Animal
        Talkative [] animals = new Talkative[5];
        animals[0] = new Dog("Bobby", 10.0, false);
        animals[1] = new Cat("Marilynn", 8.0);
        animals[2] = new Dog("Lucy", 15.0, true);
        animals[3] = new Cat("Garfield", 30);
        animals[4] = new Dog("Lucas", 12, false);
        
        //display animals.
        for (int i=0; i<animals.length; i++) {
            System.out.println(animals[i].toString());
            animals[i].talk();
        }
    }
}
