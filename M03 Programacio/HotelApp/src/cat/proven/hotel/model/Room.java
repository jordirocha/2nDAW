package cat.proven.hotel.model;

import java.util.Objects;


public class Room {
    private int number;
    private int capacity;
    private double price;
    private Category category;

    public Room() {
    }

    public Room(int number) {
        this.number = number;
    }

    public Room(Room other) {
        this.capacity = other.capacity;
        this.price = other.price;
        this.number = other.number;
        this.category = other.category;
    }

    public Room(int number, int capacity, double price, Category category) {
        this.capacity = capacity;
        this.price = price;
        this.number = number;
        this.category = category;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof Room)) return false;
        Room room = (Room) o;
        return number == room.number;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public int getCapacity() {
        return capacity;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public Category getCategory() {
        return category;
    }

    public void setCategory(Category category) {
        this.category = category;
    }

    @Override
    public int hashCode() {
        return Objects.hash(number);
    }

    @Override
    public String toString() {
        final StringBuilder sb = new StringBuilder("Room{");
        sb.append("capacity=").append(capacity);
        sb.append(", price=").append(price);
        sb.append(", number=").append(number);
        sb.append(", category=").append(category);
        sb.append('}');
        return sb.toString();
    }
}
