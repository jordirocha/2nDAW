/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author alumne
 */
public class Dog extends Animal {
    
    /*
     * Properties
    */
    private boolean dangerous; 
    
    /*
    * Constructors
    */
    
    public Dog() {
        super();
        
    }
    
    
    public Dog(String name, double weight,boolean dangerous ) {
        super(name, weight);
        this.dangerous = dangerous;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Dog{").append(super.toString());
        sb.append("; dangerous=").append(dangerous);
        sb.append('}');
        return sb.toString();
    }

    public void talk (){
        System.out.println("Bup");
    }
    
}
