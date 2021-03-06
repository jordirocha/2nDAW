package storeapp;

import storeapp.model.Fridge;
import storeapp.model.Product;
import storeapp.model.StoreAppModel;
import storeapp.model.Tv;

import java.util.*;

import static java.lang.Integer.parseInt;
import static java.lang.System.out;

/**
 * @author alro3749
 */
public class Main {

    private final List<String> menu; // The menu of the application
    StoreAppModel storeApp; // The list of products
    private boolean exit; // Flag to exit

    public Main() {
        this.menu = new ArrayList<>();
        this.exit = false;
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Main app = new Main();
        app.run();
    }

    /**
     * To run application
     */
    private void run() {
        storeApp = new StoreAppModel();
        generateMenu();
        do {
            int choice = displaySelector(menu);
            out.println("");
            switch (choice) {
                case 0 -> exitApp();
                case 1 -> displayAllProducts();
                case 2 -> searchByCode();
                case 3 -> addArticle();
                case 4 -> modifyArticle();
                case 5 -> deleteArticle();
                case 6 -> SearchByUnderStock();
                case 7 -> SearchByType();
                default -> out.println("Not valid option");
            }
            out.println();
        } while (!exit);
    }

    /**
     * Creates the menu for the user interaction
     */
    private void generateMenu() {
        menu.add("Exit");
        menu.add("List all products");
        menu.add("Search article by code");
        menu.add("Add article");
        menu.add("Update article");
        menu.add("Delete article");
        menu.add("Search articles that are under stock quantity");
        menu.add("Search articles by type (Tv o Fridge)");
    }

    /**
     * Display all products to user
     */
    private void displayAllProducts() {
        List<Product> allProducts = storeApp.getAllProducts();
        if (allProducts != null) displayList(allProducts);
        else out.println("No data to display");
    }

    /**
     * Closes application
     */
    private void exitApp() {
        this.exit = true;
    }

    /**
     * Displays a list of options and user interacts given an option
     *
     * @param options list of options to print out
     * @return a valid option if its correct or -1 in case of exception
     */
    private int displaySelector(List<String> options) {
        Scanner sc = new Scanner(System.in);
        for (int i = 0; i < options.size(); i++) out.format("%d. %s\n", i, options.get(i));
        out.print("Enter your option: ");
        int option;
        try {
            option = sc.nextInt();
        } catch (InputMismatchException ime) {
            option = -1;
        }
        return option;
    }

    /**
     * Asks the user to input the code of the article to be searched, searches
     * the article in the data, if its found will display all specs of the
     * article in case not found reports to user
     */
    private void searchByCode() {
        String sCode = inputString("Introduce code to search: ");
        Product art = storeApp.findArticle(sCode);
        if (art != null) out.println(art);
        else out.println("Article not found in our store");
    }

    /**
     * Aks the user to input the code, if code doesn't exit will continue with
     * next values to add and then reposts results to user
     */
    private void addArticle() {
        String sCode = inputString("Enter a code: ");
        if (!storeApp.existCode(sCode)) {
            String sName = inputString("Enter name: ");
            try {
                String sPrice = inputString("Enter price: ");
                double price = Double.parseDouble(sPrice);
                String sInches = inputString("Enter a stock: ");
                int stock = parseInt(sInches);
                Product artToAdd = new Product(sCode, sName, price, stock);
                String resultMsg = (storeApp.add(artToAdd) ? "Article successfully added" : "Error adding article");
                out.println(resultMsg);
            } catch (NumberFormatException nfe) {
                out.println("Error on parsing values");
            }
        } else {
            out.println("Code introduced already exists in our store");
        }
    }

    /**
     * Asks user to input code to modify an article, verifies that the article
     * exists in data, then aks to user to input the other values to add, before
     * to add aks for confirmation and then reports results to user
     */
    private void modifyArticle() {
        displayAllProducts();
        String sCode = inputString("Enter code: ");
        if (storeApp.existCode(sCode)) {
            String sNewCode = inputString("Enter new code: ");
                String sName = inputString("Enter new name: ");
            try {
                String sPrice = inputString("Enter new price: ");
                double newPrice = Double.parseDouble(sPrice);
                String sStock = inputString("Enter new stock: ");
                int newStock = Integer.parseInt(sStock);
                if (confirm("Are you sure you want to update it? [True|true/False|false] ")) {
                    Product oldArt = storeApp.findArticle(sCode);
                    Product artToUpd = new Product(sNewCode, sName, newPrice, newStock);
                    String resultMsg = (storeApp.update(oldArt, artToUpd) ? "Article successfully updated" : "Error on updating article");
                    out.println(resultMsg);
                } else {
                    out.println("Canceled by user");
                }
            } catch (NumberFormatException nfe) {
                out.println("Error on parsing values");
            }
        } else {
            out.println("Product don't found");
        }
    }

    /**
     * Asks user to input code to delete an article, verifies that the article
     * exits in data, displays the article to remove and aks to user for
     * confirmation finally reports to user results
     */
    private void deleteArticle() {
        displayAllProducts();
        String sCode = inputString("Enter the code to remove: ");
        if (storeApp.existCode(sCode)) {
            out.println("Article to remove is: " + sCode);
            if (confirm("Are you sure? [True/False] ")) {
                Product artToDel = storeApp.findArticle(sCode);
                String resultMsg = (storeApp.delete(artToDel) ? "Article successfully removed" : "Error on removing article");
                out.println(resultMsg);
            } else {
                out.println("Canceled by user");
            }
        } else {
            out.println("Product selected don't exist");
        }
    }

    /**
     * Prompts an answer to the user and read a text from user
     *
     * @param question the question for the user
     * @return a question
     */
    private String inputString(String question) {
        Scanner sc = new Scanner(System.in);
        out.print(question);
        return sc.nextLine();
    }

    /**
     * Displays all articles to user
     *
     * @param store the list to display
     */
    private void displayList(List<Product> store) {
        out.println("------------------------------------------------------------------------------------------------------------------------");
        out.printf("%5s %25s %20s %15s %15s %15s %15s", "ART. ID", "NAME", "PRICE", "STOCK", "INCHES", "CAPACITY", "NO FROST");
        out.println();
        out.println("------------------------------------------------------------------------------------------------------------------------");
        for (Product art : store) {
            if (art instanceof Tv) {
                out.format("%5s %25s %20s %15d %15s %15s %15s", art.getCode(), art.getName(), art.getPrice(), art.getStock(), ((Tv) art).getInches(), "NULL", "NULL");
            } else {
                out.format("%5s %25s %20s %15d %15s %15s %15s", art.getCode(), art.getName(), art.getPrice(), art.getStock(), "NULL", ((Fridge) art).getCapacity(), ((Fridge) art).isNoFrost());
            }
            out.println();
        }
        out.format("\nNumber of articles: %d\n", store.size());
    }

    /**
     * Ask user to confirm an operation
     *
     * @param message the message to user
     * @return true to process false in case not
     */
    private boolean confirm(String message) {
        Scanner sc = new Scanner(System.in);
        try {
             out.print(message);
             return sc.nextBoolean();
        } catch (InputMismatchException ime) {
            System.out.println("Error on reading confirmation");
            return false;
        }
    }

    /**
     * Aks to user to input a quantity of stock, display a list of products
     * which ones are under quantity stock to user then reports results to user
     */
    private void SearchByUnderStock() {
        String sStock = inputString("Enter a stock: ");
        try {
            int stock = parseInt(sStock);
            List<Product> products = storeApp.getArticlesByUnderStock(stock);
            if (products.size() > 0) displayList(products);
            else out.println("No products under quantity stock given");
        } catch (NumberFormatException nfe) {
            out.println("Error on parsing value");
        }
    }

    /**
     * Aks to user to input a type of article, display a list of products which
     * ones are a type of, then reposts results to user
     */
    private void SearchByType() {
        String sType = inputString("What you want to display Tv or Fridge? [T|t/F|f]: ");
        if (sType.equalsIgnoreCase("T") || sType.equalsIgnoreCase("F")) {
            List<Product> products = storeApp.displayByType(sType.toUpperCase());
            if (products.size() > 0) displayList(products);
            else out.println("There aren't articles of this type");
        } else {
            out.println("Incorrect type of article");
        }
    }

}
