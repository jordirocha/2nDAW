package storeapp.model;

/**
 *
 * @author alro3749
 */
public class Tv extends Product {

    private int inches;

    public Tv() {
        super();
    }

    public Tv(String code) {
        super(code);
    }

    public Tv(Tv other) {
        super(other);
        this.inches = other.inches;
    }

    public Tv(String code, String name, double price, int stock, int inches) {
        super(code, name, price, stock);
        this.inches = inches;
    }

    public int getInches() {
        return inches;
    }

    public void setInches(int inches) {
        this.inches = inches;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Tv{inches=").append(inches);
        sb.append(super.toString());
        sb.append('}');
        return sb.toString();
    }

}
