package storeapp.model;

import java.util.Objects;

/**
 *
 * @author alro3749
 */
public class Product {

    private String code;
    private String name;
    private double price;
    private int stock;

    public Product() {
        this.code = "";
        this.name = "";
    }

    public Product(String code) {
        this.code = code;
        this.name = "";
    }

    public Product(Product other) {
        this.code = other.code;
        this.name = other.name;
        this.price = other.price;
        this.stock = other.stock;
    }

    public Product(String code, String name, double price, int stock) {
        this.code = code;
        this.name = name;
        this.price = price;
        this.stock = stock;
    }

    public void setCode(String code) {
        this.code = code;
    }

    public String getCode() {
        return code;
    }

    public String getName() {
        return name;
    }

    public double getPrice() {
        return price;
    }

    public int getStock() {
        return stock;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public void setStock(int stock) {
        this.stock = stock;
    }

    @Override
    public String toString() {
        StringBuilder sb = new StringBuilder();
        sb.append("Product{code=").append(code);
        sb.append(", name=").append(name);
        sb.append(", price=").append(price);
        sb.append(", stock=").append(stock);
        sb.append('}');
        return sb.toString();
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
        final Product other = (Product) obj;
        if (!Objects.equals(this.code, other.code)) {
            return false;
        }
        return true;
    }

}
