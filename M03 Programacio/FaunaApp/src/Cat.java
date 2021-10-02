
import java.util.Objects;



/**
 * ADT for Cat
 * @author ProvenSoft
 */
public class Cat extends Animal  {
    /*
    *  Constructors
    */

    public Cat(String name, double weight) {
        this.name=name;
        this.weight=weight;
    }

    public Cat() {
    }

    public Cat(String name) {
        this.name=name;
    }
    
    public Cat(Cat other) {
        this.name=other.name;
        this.weight=other.weight;
    }
    

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Cat{name=").append(name);
        sb.append(", weight=").append(weight);
        sb.append('}');
        return sb.toString();
    }
    
    @Override
    public void talk (){
        System.out.println("Meu");
    }
    
    
       
}
