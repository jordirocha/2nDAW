package storeapp.model;

/**
 *
 * @author alro3749
 */
public class Fridge extends Product {

    private int capacity;
    private boolean noFrost;

    public Fridge() {
        super();
        this.noFrost = false;
    }

    public Fridge(String code) {
        super(code);
        this.noFrost = false;
    }

    public Fridge(Fridge other) {
        super(other);
        this.capacity = other.capacity;
        this.noFrost = other.noFrost;
    }

    public Fridge(String code, String name, double price, int stock, int capacity, boolean noFrost) {
        super(code, name, price, stock);
        this.capacity = capacity;
        this.noFrost = noFrost;
    }

    public int getCapacity() {
        return capacity;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }

    public boolean isNoFrost() {
        return noFrost;
    }

    public void setNoFrost(boolean noFrost) {
        this.noFrost = noFrost;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Fridge{capacity=").append(capacity);
        sb.append(", noFrost=").append(noFrost);
        sb.append(super.toString());
        sb.append('}');
        return sb.toString();
    }

}
