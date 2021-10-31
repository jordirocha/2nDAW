package storeapp;

import static java.lang.Integer.parseInt;
import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.List;
import java.util.Scanner;
import storeapp.model.Product;
import storeapp.model.StoreAppModel;

/**
 *
 * @author alro3749
 */
public class Main {

    StoreAppModel storeApp;
    private List<String> menu; // The menu of the application
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
     * To run aplication
     */
    private void run() {
        storeApp = new StoreAppModel();
        generateMenu();
        do {
            int choice = displaySelector(menu);
            System.out.println("");
            switch (choice) {
                case 0 ->
                    exitApp();
                case 1 ->
                    displayAllProducts();
                case 2 ->
                    searchByCode();
                case 3 ->
                    addArticle();
                case 4 ->
                    modifyArticle();
                case 5 ->
                    deleteArticle();
                case 6 ->
                    SearchByUnderStock();
//                case 7 ->
//                    SearchByType();
                default -> {
                    System.out.println("Not valid option");
                }
            }
            System.out.println("");

        } while (!exit);

    }

    /**
     * Create the menu for the user interaction
     */
    private void generateMenu() {
        menu.add("Exit");
        menu.add("Llistar tots els productes");
        menu.add("Cercar producte per codi");
        menu.add("Afegir producte");
        menu.add("Modificar producte");
        menu.add("Eliminar producte");
        menu.add("Cercar productes amb un stock per sota d'un valor");
        menu.add("Cercar productes per tipus (Tv o Fridge)");
    }

    /**
     * Display all products from data source
     */
    private void displayAllProducts() {
        List<Product> allProducts = storeApp.getAllProducts();
        if (allProducts != null) {
            displayList(allProducts);
        } else {
            System.out.println("No data to display");
        }
    }

    /**
     * Close application changin flag to true
     */
    private void exitApp() {
        this.exit = true;
    }

    /**
     * Displays a list of options and user interacts given a option
     *
     * @param options list of Strings to print out
     * @return a valid option if its correct -1 in case of exeception
     */
    private int displaySelector(List<String> options) {
        Scanner sc = new Scanner(System.in);
        for (int i = 0; i < options.size(); i++) {
            System.out.format("%d. %s\n", i, options.get(i));
        }
        System.out.print("Enter your option: ");
        int option;
        try {
            option = sc.nextInt();
        } catch (InputMismatchException ime) {
            option = -1;
        }
        return option;
    }

    /**
     * Search an article by code
     */
    private void searchByCode() {
        String sCode = inputString("Introduce code to search: ");
        Product art = storeApp.getArticle(sCode);
        if (art != null) {
            System.out.println(art.toString());
        } else {
            System.out.println("Article not found in our store");
        }
    }

    /**
     * Adds an article to source data
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
                Product temp = new Product(sCode, sName, price, stock);
                if (storeApp.add(temp)) {
                    System.out.println("New product " + sName + " added correctly");
                } else {
                    System.out.println("Error on adding product");
                }
            } catch (NumberFormatException nfe) {
                System.out.println("Error on parsing values");
            }
        } else {
            System.out.println("Already exists in our store");
        }
    }

    /**
     * Firstly prompts to user the article to modify, then asks new values of
     * the article selected
     */
    private void modifyArticle() {
        displayAllProducts();
        String scode = inputString("Enter code: ");
        if (storeApp.existCode(scode)) {
            String sNewCode = inputString("Enter new code: ");
            String sName = inputString("Enter new name: ");
            try {
                String sPrice = inputString("Enter new price: ");
                double newPrice = Double.parseDouble(sPrice);
                String sStock = inputString("Enter new stock: ");
                int newStock = parseInt(sStock);
                if (confirm("Are you sure you want to update it? [True/False] ")) {
                    Product selected = storeApp.getArticle(scode);
                    Product newValues = new Product(sNewCode, sName, newPrice, newStock);
                    if (storeApp.update(selected, newValues)) {
                        System.out.println("Article successfuly updated");
                    } else {
                        System.out.println("Error on updating article");
                    }
                } else {
                    System.out.println("Canceled by user");
                }

            } catch (NumberFormatException nfe) {
                System.out.println("Error on parsing values");
            }
        } else {
            System.out.println("Product don't found");
        }
    }

    /**
     * Aks to user what article want delete from list, must confirm the
     * operation to completly delete the article
     */
    private void deleteArticle() {
        displayAllProducts();
        String sCode = inputString("Enter the code to remove: ");
        if (storeApp.existCode(sCode)) {
            System.out.println("Article to remove is: " + sCode);
            if (confirm("Are you sure? [True/False] ")) {
                Product artDelete = storeApp.getArticle(sCode);
                if (storeApp.delete(artDelete)) {
                    System.out.println("Article successfully remove from store");
                } else {
                    System.out.println("Error on removing article");
                }
            } else {
                System.out.println("Canceled by user");
            }
        } else {
            System.out.println("Product selected don't exist");
        }
    }

    /**
     * Prompts an answer to the user and read a text from user
     *
     * @param question the question for the user
     * @return the uesr answer
     */
    private String inputString(String question) {
        Scanner sc = new Scanner(System.in);
        System.out.print(question);
        return sc.nextLine();
    }

    /**
     * Displays all articles from a list given
     *
     * @param store
     */
    private void displayList(List<Product> store) {
        System.out.println(GREEN_BOLD + "-----------------------------------------------------------------------------");
        System.out.printf(GREEN_BOLD + "%5s %25s %20s %15s", "ART. ID", "NAME", "PRICE", "STOCK");
        System.out.println();
        System.out.println(GREEN_BOLD + "-----------------------------------------------------------------------------");
        for (Product art : store) {
            System.out.format(GREEN_BOLD + "%5s %25s %20s %15d", art.getCode(), art.getName(), art.getPrice(), art.getStock());
            System.out.println();
        }
        System.out.format("\n" + GREEN_BOLD + "Number of elements: %d\n", store.size());
    }

    /**
     * Ask to user to confirma a operation
     *
     * @param message the message to user
     * @return true to process false in case not
     */
    private boolean confirm(String message) {
        Scanner sc = new Scanner(System.in);
        System.out.print(message);
        return sc.nextBoolean();
    }

    /**
     * Displays a list of products which ones are under stock given by user
     */
    private void SearchByUnderStock() {
        String sStock = inputString("Enter a stock: ");
        try {
            int stock = parseInt(sStock);
            List<Product> products = storeApp.getArticlesByUnderStock(stock);
            if (products.size() > 0) {
                displayList(products);
            } else {
                System.out.println("No products under stock given");
            }
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing value");
        }
    }
    /**
     * GREEN color for console
     */
    public static final String GREEN_BOLD = "\033[1;32m";

}
