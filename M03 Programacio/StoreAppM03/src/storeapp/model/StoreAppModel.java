package storeapp.model;

import java.util.ArrayList;
import java.util.List;

/**
 * ADT class for a store list
 *
 * @author alro3749
 */
public class StoreAppModel {
// Attributes

    private List<Product> store;
// Constructor

    public StoreAppModel() {
        store = new ArrayList<>();
        generateTestData();
    }
// getters (accessors)

    public List<Product> getStore() {
        return store;
    }

    /**
     * init test data
     */
    private void generateTestData() {
//        this.store.add(new Tv("385244", "LG 43UP75006LF 43 LED UltraHD 4K HDR10 Pro", 369.98, 44, 43));
//        this.store.add(new Tv("247583", "Xiaomi Mi TV 4A 32 LED HD", 179.98, 14, 32));
//        this.store.add(new Tv("255195", "Silver 43 LED FullHD", 199.98, 33, 43));
//        this.store.add(new Tv("587456", "Samsung 43TU7092UXXH 43 LED UltraHD 4K HDR10+", 399, 21, 43));
//
//        this.store.add(new Fridge("342926", "Cecotec GrandCooler 20000", 99, 120, 300, false));
//        this.store.add(new Fridge("298766", "Bosch KGN39XIDP Frigorífico Combi D Acero Inoxidable", 659, 33, 400, true));
//        this.store.add(new Fridge("298685", "Balay 3KFE768WI Frigorífico", 896.01, 20, 233, true));
        this.store.add(new Product("385244", "LG 43UP75006LF", 369.98, 55));
        this.store.add(new Product("247583", "Xiaomi Mi TV 4A 32 LED HD", 179.98, 14));
        this.store.add(new Product("255195", "Silver 43 LED FullHD", 199.98, 33));
        this.store.add(new Product("587456", "Samsung 43TU7092UXXH", 399, 21));

    }

    /**
     * Return an article given code from data source
     *
     * @param sCode the code to find
     * @return article found or null if not found or in case of error
     */
    public Product findArticle(String sCode) {
        if (existCode(sCode)) {
            Product temp = new Product(sCode);
            int index = store.indexOf(temp);
            if (index != -1) {
                Product art = store.get(index);
                return art;
            }
        }
        return null;
    }

    /**
     * Checks if the code given already exits in data source
     *
     * @param sCode the code of article
     * @return true if already exits or false otherwise
     */
    public boolean existCode(String sCode) {
        Product temp = new Product(sCode);
        if (store.contains(temp)) {
            return true;
        }
        return false;
    }

    public void displayByType(String type) {
        type.toUpperCase();
        for (Product art : store) {
            if (type.equals("F") && art instanceof Fridge) {
                System.out.println(art.getName());
            } else if (type.equals("T") && art instanceof Tv) {
                System.out.println(art.getName());
            }
        }
    }

    /**
     * Adds a product given in data source
     *
     * @param product article to add
     * @return true if its correctly added or false otherwise
     */
    public boolean add(Product product) {
        if (!store.contains(product)) {
            store.add(product);
            return true;
        }
        return false;
    }

    /**
     * Retuns all products of data source
     *
     * @return list of products
     */
    public List<Product> getAllProducts() {
        return store;
    }

    /**
     * Updates the values of the old article with the new article given
     *
     * @param selected the current selected article
     * @param newValues the new article with new values
     * @return true if its succesfully updated or false otherwise
     */
    public boolean update(Product oldProduct, Product newProduct) {
        if (store.contains(oldProduct)) {
            int index = store.indexOf(oldProduct);
            store.get(index).setName(newProduct.getName());
            store.get(index).setPrice(newProduct.getPrice());
            store.get(index).setStock(newProduct.getStock());
            store.get(index).setCode(newProduct.getCode());
            return true;
        }
        return false;
    }

    /**
     * Removes the article given from data source
     *
     * @param artDelete the article to delete
     * @return true if its succesfully removed or false otherwise
     */
    public boolean delete(Product artDelete) {
        if (store.contains(artDelete)) {
            store.remove(artDelete);
            return true;
        }
        return false;
    }

    /**
     * Retrievs all products which their stock is under the stock given
     *
     * @param stock the stock quantity
     * @return list of products or empty in case of not found
     */
    public List<Product> getArticlesByUnderStock(int stock) {
        List<Product> products = new ArrayList<>();
        for (Product product : store) {
            if (product.getStock() < stock) {
                products.add(product);
            }
        }
        return products;
    }

}
