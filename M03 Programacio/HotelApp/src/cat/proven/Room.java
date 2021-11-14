package cat.proven;

import java.util.Objects;



public class Room {
    int number;
    int capacity;
    double price;
    Category category;

    public Room( int number,int capacity, double price, Category category) {
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
