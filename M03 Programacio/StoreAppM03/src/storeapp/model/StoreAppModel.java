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
        this.store.add(new Tv("1", "LG 43UP75006LF 43 LED", 369.98, 44, 43));
        this.store.add(new Tv("2", "Xiaomi Mi TV 4A 32 LED HD", 179.98, 14, 32));
        this.store.add(new Tv("3", "Silver 43 LED FullHD", 199.98, 33, 43));
        this.store.add(new Tv("4", "Samsung 43TU7092UXXH 43", 399, 21, 43));
        this.store.add(new Fridge("5", "Cecotec GrandCooler 20000", 99, 120, 300, false));
        this.store.add(new Fridge("6", "Bosch KGN39XIDP", 659, 33, 400, true));
        this.store.add(new Fridge("7", "Balay 3KFE768WI", 896.01, 20, 233, true));
    }

    /**
     * Return an article given code from data source, no matters if their class are type of TV o FRIDGE
     *
     * @param sCode the code to find
     * @return the article found or null if not found or in case of error
     */
    public Product findArticle(String sCode) {
        Product temp = null;
        if (existCode(sCode)) {
            for (Product art : store) {
                if (art.getCode().equals(sCode)) {
                    temp = art;
                }
            }
        }
        return temp;
    }

    /**
     * Checks if the code given already exits in data source
     *
     * @param sCode the code of article
     * @return true if already exits or false otherwise
     */
    public boolean existCode(String sCode) {
        for (Product art : store) {
            if (art.getCode().equals(sCode)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Returns a list of articles, which ones must be Fridges or Tv's
     *
     * @param type the type of product to filter
     * @return list of articles, empty list in case not found
     */
    public List<Product> displayByType(String type) {
        List<Product> products = new ArrayList<>();
        for (Product art : store) {
            if (type.equals("F") && art instanceof Fridge) {
                products.add(art);
            } else if (type.equals("T") && art instanceof Tv) {
                products.add(art);
            }
        }
        return products;
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
     * @param oldProduct the current selected article
     * @param newProduct the new article with new values
     * @return true if its successfully updated or false otherwise
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
     * @return true if its successfully removed or false otherwise
     */
    public boolean delete(Product artDelete) {
        if (store.contains(artDelete)) {
            store.remove(artDelete);
            return true;
        }
        return false;
    }

    /**
     * Retrieves all products which their stock is under the stock given
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
