import cat.proven.hotel.model.Category;
import cat.proven.hotel.model.Customer;
import cat.proven.hotel.model.Hotel;
import cat.proven.hotel.model.Room;

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
                case 5 -> deleteRoom();
                case 6 -> modifyRoom();
//                case 7 -> SearchByType();
                default -> System.out.println("Not valid option");
            }
            System.out.println();
        } while (!exit);
    }

    /**
     * Aks to user to input the code of the room, verifies if room exists continues
     * asking the other values, then reports to user
     */
    private void modifyRoom() {
        try {
            String sCode = inputString("Enter the code room: ");
            int code = Integer.parseInt(sCode);
            if (hotelApp.findRoom(new Room(code)) != null) {
                Room oldRoom = hotelApp.findRoom(new Room(code));
                Room upRoom = inputRoom();
                int result = hotelApp.modifyRoom(upRoom, oldRoom);
                System.out.println((result == 0 ? "Successfully modified" : "Error modifying room"));
            } else {
                System.out.println("No room found by code given");
            }
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    /**
     * Aks the user to input the code of room
     */
    private void deleteRoom() {
        try {
            String sCode = inputString("Enter the code room: ");
            int code = Integer.parseInt(sCode);
            int result = hotelApp.deleteRoom(new Room(code));
            System.out.println((result == 0 ? "Successfully deleted" : "Error on deleting room"));
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    /**
     * Asks the user to input all values of a room, finally reports to user
     */
    private void registerRoom() {
        Room r = inputRoom();
        if (r != null) {
            if (hotelApp.addRoom(r) != -1) {
                System.out.println("Room successfully registered");
            } else {
                System.out.println("Failure on register room");
            }
        } else {
            System.out.println("Error getting room");
        }

    }

    /**
     * Asks user to input all values from a room
     *
     * @return an entity room with values
     */
    private Room inputRoom() {
        try {
            String sNumber = inputString("Enter number of room: ");
            int number = Integer.parseInt(sNumber);
            String sCapacity = inputString("Enter capacity: ");
            int capacity = Integer.parseInt(sCapacity);
            String sType = inputString("Enter category [standard|superior|suite]: ");
            Category category = getCategory(sType);
            String sPrice = inputString("Enter price: ");
            double price = Double.parseDouble(sPrice);
            return new Room(number, capacity, price, category);
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
            return null;
        }
    }

    /**
     * Obtains a category in enum format
     *
     * @param sType the type of category
     * @return By default, STANDARD otherwise the others enums
     */
    private Category getCategory(String sType) {
        if (sType.equalsIgnoreCase("suite")) {
            return Category.SUITE;
        }
        if (sType.equalsIgnoreCase("superior")) {
            return Category.SUPERIOR;
        }
        return Category.STANDARD;
    }

    /**
     * Asks the user a room to display all customers hosted in that room, finally reports to user
     */
    private void displayCustomersRoom() {
        try {
            String sRoom = inputString("Enter number room: ");
            int room = Integer.parseInt(sRoom);
            Room r = new Room(room);
            List<Customer> customers = hotelApp.findCustomersInRoom(r);
            if (!customers.isEmpty()) {
                customers.forEach(e -> System.out.println(e.toString()));
            } else {
                System.out.println("No customer in this room");
            }
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    /**
     * Displays all customers hosted in hotel, finally reports to user
     */
    private void displayCustomersHotel() {
        List<Customer> clients = hotelApp.getOccupiedRooms();
        if (!clients.isEmpty()) {
            clients.forEach(e -> System.out.println(e.toString()));
        } else {
            System.out.println("No rooms in hotel");
        }
    }

    /**
     * Displays to user all rooms from hotel, then reports to user
     */
    private void displayAllRooms() {
        List<Room> rooms = hotelApp.getRooms();
        if (!rooms.isEmpty()) {
            displayList(rooms);
        } else {
            System.out.println("No rooms to display");
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
