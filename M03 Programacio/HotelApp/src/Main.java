import cat.proven.hotel.model.Category;
import cat.proven.hotel.model.Customer;
import cat.proven.hotel.model.Hotel;
import cat.proven.hotel.model.Room;

import java.util.*;

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
                case 2 -> displayAllCustomersHotel();
                case 3 -> displayCustomersInRoom();
                case 4 -> registerRoom();
                case 5 -> deleteRoom();
                case 6 -> modifyRoom();
                case 7 -> checkIn();
                case 8 -> checkOut();
                default -> System.out.println("Not valid option");
            }
            System.out.println();
        } while (!exit);
    }

    /**
     * Displays a list of rooms, asks the user to input a room then process to check out the room selected and then reports to the user
     */
    private void checkOut() {
        String sCode = inputString("Enter the code room to check out: ");
        int code = Integer.parseInt(sCode);
        Room selectRoom = hotelApp.findRoom(new Room(code));
        if (selectRoom != null) {
            System.out.println(selectRoom);
            if (confirm("Are you sure you want to check out? [True|true/False|false] ")) {
                int result = hotelApp.checkOutCustomers(selectRoom);
                if (result == 0) System.out.println("Successfully check out");
                if (result == -1) System.out.println("Error on check out room");
                if (result == -2) System.out.println("The room is already empty");
            } else {
                System.out.println("Canceled by user");
            }
        } else {
            System.out.println("No room found by code given");
        }
    }

    /**
     * Asks the user to input the category and the quantity of people which ones will be hosted in hotel,
     * then display a list of possible rooms that contains what user puts if there aren't reports the failure.
     * When there are user must select on room and then will ask for the information to introduce abut customers once is finished reports to user if the check in is ok or not
     */
    private void checkIn() {
        List<Customer> newCustomers = new ArrayList<>();

        String sCategory = inputString("Enter a category [standard|superior|suite]: ");
        Category category = getCategory(sCategory);

        String sCustomers = inputString("How many people will be hosted? ");
        int customers = Integer.parseInt(sCustomers);

        List<Room> possibleRooms = hotelApp.getRoomsToCustomers(customers, category);

        if (!possibleRooms.isEmpty()) {
            try {
                for (int i = 0; i < possibleRooms.size(); i++) System.out.format("%d. %s\n", i, possibleRooms.get(i));
                String sChoice = inputString("Enter de code room: ");
                int choice = Integer.parseInt(sChoice);
                if (hotelApp.findRoom(new Room(choice)) != null) {
                    Room roomSelected = hotelApp.findRoom(new Room(choice));
                    System.out.println(roomSelected);
                    for (int i = 0; i < customers; i++) {
                        System.out.println("REGISTERING CUSTOMER " + (i + 1) + ":");
                        Customer newCustomer = inputCustomer();
                        newCustomers.add(newCustomer);
                    }
                    if (hotelApp.checkInCustomers(roomSelected, newCustomers) != -1)
                        System.out.println("Customer successfully registered");
                    else System.out.println("Error on registering customers");
                } else {
                    System.out.println("Hotel selected don't found");
                }
            } catch (NumberFormatException nfe) {
                System.out.println("Error on parsing value");
            }
        } else {
            System.out.println("No rooms found with what you want");
        }
    }

    /**
     * Asks user to input all values from a customer
     *
     * @return an entity room with values
     */
    private Customer inputCustomer() {
        try {
            String sNIF = inputString("Enter NIF: ");
            String sName = inputString("Enter name: ");
            return new Customer(sNIF, sName);
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
            return null;
        }
    }

    /**
     * Aks to user to input the code of the room to be modified, verifies if room exists continues
     * asking the other values if not reports the failure. When exists it process to ask the user for confirmation to modify, in case to cancel reports the user
     * In case to process it reports to the user the results
     */
    private void modifyRoom() {
        try {
            String sCode = inputString("Enter the code room: ");
            int code = Integer.parseInt(sCode);
            if (hotelApp.findRoom(new Room(code)) != null) {
                Room oldRoom = hotelApp.findRoom(new Room(code));
                Room upRoom = inputRoom();
                if (confirm("Are you sure you want to delete it? [True|true/False|false] ")) {
                    int result = hotelApp.modifyRoom(upRoom, oldRoom);
                    System.out.println((result == 0 ? "Successfully modified" : "Error modifying room"));
                } else {
                    System.out.println("Canceled by user");
                }
            } else {
                System.out.println("No room found by code given");
            }
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    /**
     * Asks user to input code of the room to delete a room, once introduced it asks for confirmation to do the operation in case the user process to cancel reports the user.
     * In case to delete reports to the user the result
     */
    private void deleteRoom() {
        try {
            String sCode = inputString("Enter the code room: ");
            int code = Integer.parseInt(sCode);
            if (confirm("Are you sure you want to delete it? [True|true/False|false] ")) {
                int result = hotelApp.deleteRoom(new Room(code));
                System.out.println((result == 0 ? "Successfully deleted" : "Error on deleting room"));
            } else {
                System.out.println("Canceled by user");
            }
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    /**
     * Asks the user to input all values of a room, if the room obtained not exists will be registered, if already exists reports to the user the failure
     */
    private void registerRoom() {
        Room r = inputRoom();
        if (r != null) {
            if (hotelApp.addRoom(r) != -1) System.out.println("Room successfully registered");
            else System.out.println("Failure on register room");
        } else {
            System.out.println("Error getting room");
        }

    }

    /**
     * Asks user to input all values of a room
     *
     * @return a room or null in case of error
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
        if (sType.equalsIgnoreCase("suite")) return Category.SUITE;
        if (sType.equalsIgnoreCase("superior")) return Category.SUPERIOR;
        return Category.STANDARD;
    }

    /**
     * Asks the user to input a number of a room, if the room contains customers hosted will display them if not reports to the user the failure
     */
    private void displayCustomersInRoom() {
        try {
            String sRoom = inputString("Enter number room: ");
            int room = Integer.parseInt(sRoom);
            List<Customer> customers = hotelApp.findCustomersInRoom(new Room(room));
            if (!customers.isEmpty()) customers.forEach(e -> System.out.println(e.toString()));
            else System.out.println("No customers hosted in this room");
        } catch (NumberFormatException nfe) {
            System.out.println("Error on parsing values");
        }
    }

    /**
     * Displays to the user all customers hosted in the hotel, if there are it display otherwise reports to user the failure
     */
    private void displayAllCustomersHotel() {
        List<Customer> clients = hotelApp.getOccupiedRooms();
        if (!clients.isEmpty()) clients.forEach(e -> System.out.println(e.toString()));
        else System.out.println("No rooms in hotel");
    }

    /**
     * Displays to user all rooms from hotel, if there are it displays otherwise reports to user
     */
    private void displayAllRooms() {
        List<Room> rooms = hotelApp.getRooms();
        if (!rooms.isEmpty()) displayList(rooms);
        else System.out.println("No rooms to display");
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

    /**
     * Ask user to confirm an operation
     *
     * @param message the message to user
     * @return true to process false in case not
     */
    private boolean confirm(String message) {
        Scanner sc = new Scanner(System.in);
        try {
            System.out.println(message);
            return sc.nextBoolean();
        } catch (InputMismatchException ime) {
            System.out.println("Error on reading confirmation");
            return false;
        }
    }
}
