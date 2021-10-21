package shoppinglist;

import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.List;
import java.util.Scanner;

/**
 *
 * @author alro3749
 */
public class ShoppingList {

    // Attributes
    private List<String> articlesToBuy;
    private List<String> bougthArticles;
    private List<String> menu; // The menu of the application
    private double totalAmount;
    private boolean exit; // Flag to exit

    // Constructor 
    public ShoppingList() {
        this.articlesToBuy = new ArrayList<>();
        this.bougthArticles = new ArrayList<>();
        this.menu = new ArrayList<>();
        this.totalAmount = 0.0;
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ShoppingList app = new ShoppingList();
        app.run();
    }

    private void run() {
        generateMenu();
        exit = false;
        generateTestData(); // Fake data, only for production
        Scanner sc = new Scanner(System.in);
        int option;
        do {
//            System.out.print("Escoge opción: ");
            int choice = displaySelector(menu);
            switch (choice) {
                case 0 ->
                    exitApp();
                case 1 ->
                    displayArticlesToBuy();
                case 2 ->
                    displyaBougthArticles();
                case 3 ->
                    addToList();
                case 4 ->
                    buy();
                case 5 ->
                    removeFromList();
                default -> {
                    System.out.println("Not valid option");
                }
            }

        } while (!exit);
    }

    /**
     * Create the menu for the user interaction
     */
    private void generateMenu() {
        menu.add("Exit");
        menu.add("Show articles to buy");
        menu.add("Show bougth articles");
        menu.add("Add item");
        menu.add("Buy item to list");
//        menu.add("Buy");
        menu.add("Remove from list to buy");
    }

    private void displayOptions() {
        for (int i = 0; i < menu.size(); i++) {
            System.out.println(i + 1 + " " + menu.get(i));
        }
    }

    /**
     * displays a list of options and gets option number from user.
     *
     * @param menu to display
     * @return the option selected by user or -1 in case error
     */
    private int displaySelector(List<String> options) {
        Scanner sc = new Scanner(System.in);
        for (int i = 0; i < options.size(); i++) {
            System.out.format("%d. %s\n", i, options.get(i));
        }
        System.out.print("Enter your option: ");
        int option;
        //TODO check range
        try {
            option = sc.nextInt();
            if (option < 0 || option > options.size()) {
                option = -1;
            }
        } catch (InputMismatchException ime) {
            option = -1;
        }
        return option;
    }

    /**
     * exits from application
     */
    private void exitApp() {
        this.exit = true;
        System.out.println("Exit");
    }

    /**
     * display the list of articles to buy
     */
    private void displayArticlesToBuy() {
        displayList(this.articlesToBuy);
    }

    /**
     * display the bought article list and the total amount
     */
    private void displyaBougthArticles() {
        displayList(this.bougthArticles);
        System.out.println("Total amount: " + totalAmount);
    }

    /**
     * Asks the user the item to be added verfies that the item does not exist
     * in any list and adds it to the list Reports result to the user
     */
    private void addToList() {
        // Read new article
        String article = inputString("Input item");
        if (article != null) {
            if (this.articlesToBuy.contains(article) || this.bougthArticles.contains(article)) {
                System.out.println("Item is already in a list");
            } else {
                this.articlesToBuy.add(article);
                System.out.println("Item successfully added");
            }
        } else {
            System.out.println("Error reading article");
        }
    }

    /**
     * display the list of articles to buy, asks to the user what item want to
     * buy aks the user the price of item If correctly selected moves to the
     * article to bougth articles Report the result to the user
     */
    private void buy() {
        int articleSelected = displaySelector(articlesToBuy);
        if (articleSelected != -1) {
            String sPrice = inputString("Input the price");
            try {
                double price = Double.parseDouble(sPrice);
                // retrieves the element to buy
                String article = this.articlesToBuy.get(articleSelected);
                this.articlesToBuy.remove(articleSelected);
                // add the article bougth articles list
                this.bougthArticles.add(article);
                // updates total amount
                this.totalAmount += price;
                // reports result to the user
                System.out.println("Article successfully bougth");
                System.out.println("Total amount: " + this.totalAmount);
            } catch (NumberFormatException e) {
                System.out.println("Error reading price");
            }
        } else {
            System.out.println("Article not found");
        }
    }

    /**
     * init test data
     */
    private void generateTestData() {
        // generate data in articlesToBuy
        this.articlesToBuy.add("Milk");
        this.articlesToBuy.add("Bread");
        this.articlesToBuy.add("Potatoes");
        this.articlesToBuy.add("Tomatoes");
        this.articlesToBuy.add("Tuna");

        // generate data in bougthArticles
        this.bougthArticles.add("Apples");
        this.bougthArticles.add("Sushi");

        // init total amount
        this.totalAmount = 20.0;
    }

    /**
     * display list to the user
     *
     * @param list to be displayed
     */
    private void displayList(List<String> list) {
        for (String elem : list) {
            System.out.println(elem);
        }
        System.out.format("Number of elements: %d\n", list.size());
    }

    /**
     * prompts an answer to the user and read a text from user
     *
     * @param question the question for the user
     * @return the uesr answer
     */
    private String inputString(String question) {
        Scanner sc = new Scanner(System.in);
        System.out.println(question);
        return sc.next();
    }

    /**
     * display a list of articles to remove, asks to the user an item to delete,
     * If correctly selected remove from articles to buy Ask the user what item
     * wants to be removed verifies if item exists in articles to buy list, then
     */
    private void removeFromList() {
        displayList(articlesToBuy);
        String article = inputString("Enter the item to remove: ");
        if (this.articlesToBuy.contains(article)) {
            //show article
            System.out.println("Article to remove is: " + article);
            //ask for confirmation
            if (confirm("Are you sure? [true/false]")) {
                this.articlesToBuy.remove(article);
                System.out.println("Article removed");
            } else {
                System.out.println("Operation cancelled by user");
            }
            //remove
        } else {
            System.out.println("Article not found");
        }
    }

    /**
     * prompts a messag to the use and ask for confirmation
     *
     * @return true is case to confirm else false
     */
    private boolean confirm(String message) {
        System.out.println(message);
        Scanner sc = new Scanner(System.in);
        boolean b = false;
        try {

            b = sc.nextBoolean();
        } catch (InputMismatchException ime) {
            b = false;
        }
        return b;
    }

}
