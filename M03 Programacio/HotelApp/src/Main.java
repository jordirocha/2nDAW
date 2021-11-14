import cat.proven.Category;
import cat.proven.Customer;
import cat.proven.Hotel;
import cat.proven.Room;

import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.List;
import java.util.Scanner;

public class Main {
    private Hotel hotelApp;
    private final List<String> menu; // The menu of the application
    private boolean exit; // Flag to exit

    public Main() {
        menu = new ArrayList<>();
        this.exit = false;
    }

    public static void main(String[] args) {
        Main app = new Main();
        app.run();
    }

    /**
     * To run application
     */
    private void run() {
        hotelApp = new Hotel();
        generateMenu();
        do {
            int choice = displaySelector(menu);
            System.out.println();
            switch (choice) {
                case 0 -> exitApp();
                case 1 -> displayAllRooms();
                case 2 -> displayCustomersHotel();
                case 3 -> displayCustomersRoom();
                case 4 -> registerRoom();
//                case 5 -> deleteArticle();
//                case 6 -> SearchByUnderStock();
//                case 7 -> SearchByType();
                default -> System.out.println("Not valid option");
            }
            System.out.println();
        } while (!exit);
    }

    private void registerRoom() {
        String sNumber = inputString("Enter number of room: ");
        int number = Integer.parseInt(sNumber);
        String sCapacity = inputString("Enter capacity: ");
        int capacity = Integer.parseInt(sCapacity);
        String sType = inputString("Enter category [standard|superior|suite]: ");
        Category category = getCategory(sType);
        String sPrice = inputString("Enter price: ");
        double price = Double.parseDouble(sPrice);
        Room nRoom = new Room(number, capacity, price, category);
        if (hotelApp.addRoom(nRoom)) {
            System.out.println("Room successfully registered");
        } else {
            System.out.println("Failure on register room");
        }
    }

    private Category getCategory(String sType) {
        if (sType.equalsIgnoreCase("suite")) {
            return Category.SUITE;
        }
        if (sType.equalsIgnoreCase("superior")) {
            return Category.SUPERIOR;
        }
        if (sType.equalsIgnoreCase("standard")) {
            return Category.STANDARD;
        }
        return Category.STANDARD;
    }

    private void displayCustomersRoom() {
        try {
            String sRoom = inputString("Enter number room: ");
            int room = Integer.parseInt(sRoom);
            List<Customer> customers = hotelApp.getCustomersByCode(room);
            if (!customers.isEmpty()) {
                customers.forEach(e -> System.out.println(e.toString()));
            } else {
                System.out.println("No customer in this room");
            }
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    private void displayCustomersHotel() {
        List<Customer> clients = hotelApp.getCustomers();
        if (!clients.isEmpty()) {
            clients.forEach(e -> System.out.println(e.toString()));
        } else {
            System.out.println("No rooms in hotel");
        }
    }

    private void displayAllRooms() {
        List<Room> rooms = hotelApp.getRooms();
        if (!rooms.isEmpty()) {
            displayList(rooms);
        } else {
            System.out.println("No rooms in hotel");
        }
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
     * @param list list of options to print out
     * @return a valid option if its correct or -1 in case of exception
     */
    private int displaySelector(List<String> list) {
        Scanner sc = new Scanner(System.in);
        for (int i = 0; i < list.size(); i++) System.out.format("%d. %s\n", i, list.get(i));
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
     * Creates the menu for the user interaction
     */
    private void generateMenu() {
        menu.add("Exit");
        menu.add("Display all rooms");
        menu.add("Display all customers from hotel");
        menu.add("Display all clients by room");
        menu.add("Register room");
        menu.add("Delete room");
        menu.add("Modify room");
        menu.add("Check-in customers to room");
        menu.add("Check-out customers from room");
        menu.add("Percentage of used room");
    }

    /**
     * display list to the user
     *
     * @param list to be displayed
     */
    private void displayList(List<Room> list) {
        list.forEach(e -> System.out.println(e.toString()));
        System.out.format("Number of elements: %d\n", list.size());
    }

    /**
     * Prompts an answer to the user and read a text from user
     *
     * @param question the question for the user
     * @return a question
     */
    private String inputString(String question) {
        Scanner sc = new Scanner(System.in);
        System.out.print(question);
        return sc.nextLine();
    }

}
