
import java.util.Objects;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author alumne
 */

public abstract class Animal implements Talkative{
    
    /*
     * Properties
     */
    String name;
    double weight;
    
    /*
    * Constructors
    */

    public Animal() {
        
    }
    
    public Animal(String name) {
        this.name=name;
    }
    
    public Animal(String name, double weight ) {
        this.name=name;
        this.weight=weight;
    }
    
    /*
    * Getters & setters
    */

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public double getWeight() {
        return weight;
    }

    public void setWeight(double weight) {
        this.weight = weight;
    }

    /*
     * More methods
     */
    @Override
    public int hashCode() {
        int hash = 5;
        hash = 17 * hash + Objects.hashCode(this.name);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Cat other = (Cat) obj;
        if (!Objects.equals(this.name, other.name)) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Animal{name=").append(name);
        sb.append(", weight=").append(weight);
        sb.append('}');
        return sb.toString();
    }
    
    
    
    
}
