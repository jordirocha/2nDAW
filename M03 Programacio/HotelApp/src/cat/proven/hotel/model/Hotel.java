package cat.proven.hotel.model;


import java.util.*;

public class Hotel {

    private final Map<Room, List<Customer>> hotel;

    public Hotel() {
        hotel = new HashMap<>();
        initData();
    }

    private void initData() {
        Room room1 = new Room(1, 30, 90, Category.STANDARD);
        List<Customer> customersRoom1 = new ArrayList<>();
        customersRoom1.add(new Customer("343444", "Jordi"));
        customersRoom1.add(new Customer("475875", "Kevin"));
        customersRoom1.add(new Customer("234532", "Matias"));

        List<Customer> customersRoom2 = new ArrayList<>();
        customersRoom2.add(new Customer("256475", "Daniel"));
        customersRoom2.add(new Customer("967892", "Belen"));

        List<Customer> customersRoom3 = new ArrayList<>();

        hotel.put(room1, customersRoom1);
        hotel.put(new Room(2, 5, 180, Category.SUPERIOR), customersRoom1);
        hotel.put(new Room(3, 9, 70, Category.SUITE), customersRoom3);
        hotel.put(new Room(4, 12, 60, Category.SUITE), customersRoom2);
    }

    /**
     * Retrieve all rooms from data source
     *
     * @return hotel rooms or an empty list
     */
    public List<Room> getRooms() {
        List<Room> roomList = new ArrayList<>();
        if (!hotel.isEmpty()) {
            Set<Room> roomKeys = hotel.keySet();
            roomKeys.forEach((k) -> roomList.add(k));
        }
        return roomList;
    }

    /**
     * Retrieve all customers from data source
     *
     * @return customers hosted or empty list
     */
    public List<Customer> getOccupiedRooms() {
        List<Customer> customersList = new ArrayList<>();
        if (!hotel.isEmpty()) {
            hotel.forEach((k, v) -> v.forEach(c -> customersList.add(c)));
        }
        return customersList;
    }

    /**
     * Retrieve all customers hosted in a room
     *
     * @param room number of room
     * @return customers hosted or empty list
     */
    public List<Customer> findCustomersInRoom(Room room) {
        List<Customer> customersList = new ArrayList<>();
        if (!hotel.isEmpty()) {
            for (Map.Entry<Room, List<Customer>> entry : hotel.entrySet()) {
                if (room.number == entry.getKey().number) {
                    customersList = entry.getValue();
                    break;
                }
            }
        }
        return customersList;
    }

    /**
     * Register a new room in hotel
     *
     * @param room the room to add
     * @return 0 in case successfully modified -1 otherwise
     */
    public int addRoom(Room room) {
        if (!hotel.containsKey(room)) {
            List<Customer> customersList = new ArrayList<>();
            hotel.put(room, customersList);
            return 0;
        }
        return -1;
    }

    /**
     * Delete a room from hotel
     *
     * @param room the room to delete
     * @return 0 in case successfully deleted or -1 otherwise
     */
    public int deleteRoom(Room room) {
        if (hotel.containsKey(room)) {
            hotel.remove(room);
            return 0;
        }
        return -1;
    }

    /**
     * Modifies a room from data source
     *
     * @param newR room with new values
     * @param oldR room with current values
     * @return 0 in case successfully modified -1 otherwise
     */
    public int modifyRoom(Room newR, Room oldR) {
        if (hotel.containsKey(oldR)) {
            List<Customer> currentCustomers = findCustomersInRoom(oldR);
            if (newR.number == oldR.number) {
                hotel.put(newR, currentCustomers);
            }
            hotel.remove(oldR);
            hotel.put(newR, currentCustomers);
            return 0;
        }
        return -1;
    }

    /**
     * Check in a room with customers
     *
     * @param r         room to check in
     * @param customers list of customers hosted in that room
     * @return 0 in case successfully checked out -1 otherwise
     */
    public int checkInCustomers(Room r, List<Customer> customers) {
        if (hotel.containsKey(r)) {
            hotel.replace(r, customers);
            return 0;
        }
        return -1;
    }

    /**
     * Check out a room from data source
     *
     * @param r the room to check out
     * @return 0 in case successfully checked out -1 otherwise
     */
    public int checkOutCustomers(Room r) {
        if (hotel.containsKey(r)) {
            List<Customer> currentCustomer  = hotel.get(r);
            if (!currentCustomer.isEmpty()) {
                //System.out.println(currentCustomer.size());
                List<Customer> empty = new ArrayList<>();
                hotel.put(r, empty);
                return 0;
            }
        }
        return -1;
    }

    /**
     * Retrieves a room from data source
     *
     * @param room the room
     * @return an entity room or null in case not found
     */
    public Room findRoom(Room room) {
        for (Map.Entry<Room, List<Customer>> entry : hotel.entrySet()) {
            if (room.number == entry.getKey().number) return entry.getKey();
        }
        return null;
    }

    public List<Room> getRoomsToCustomers(int customers, Category category) {
        List<Room> rooms = new ArrayList<>();
        if (customers > 0) {
            if (!hotel.isEmpty()) {
                hotel.forEach((k, v) -> {
                    if (k.capacity >= customers && k.category == category && v.isEmpty()) rooms.add(k);
                });
            }
        }
        return rooms;
    }
}
