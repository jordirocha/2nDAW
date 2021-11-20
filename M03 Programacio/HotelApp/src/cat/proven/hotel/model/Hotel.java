package cat.proven.hotel.model;


import java.util.*;

public class Hotel {

    private final Map<Room, List<Customer>> hotel;

    public Hotel() {
        hotel = new HashMap<>();
        initData();
    }

    private void initData() {
        List<Customer> customersRoom1 = new ArrayList<>();
        customersRoom1.add(new Customer("19024851X", "Jordi"));
        customersRoom1.add(new Customer("03918971R", "Kevin"));
        customersRoom1.add(new Customer("27669207T", "Matias"));

        List<Customer> customersRoom2 = new ArrayList<>();
        customersRoom2.add(new Customer("16967327C", "Daniel"));
        customersRoom2.add(new Customer("68289094R", "Belen"));

        List<Customer> customersRoom3 = new ArrayList<>();

        hotel.put(new Room(1, 3, 90, Category.STANDARD), customersRoom1);
        hotel.put(new Room(2, 3, 180, Category.SUPERIOR), customersRoom2);
        hotel.put(new Room(3, 8, 70, Category.SUITE), customersRoom3);
    }

    /**
     * Retrieve all rooms from data source
     *
     * @return list of rooms or an empty list in case there aren't available rooms
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
     * Retrieve all customers hosted in rooms from data source
     *
     * @return list of customers or empty list in case there aren't customers hosted
     */
    public List<Customer> getOccupiedRooms() {
        List<Customer> customersList = new ArrayList<>();
        if (!hotel.isEmpty()) {
            hotel.forEach((k, v) -> v.forEach(c -> customersList.add(c)));
        }
        return customersList;
    }

    /**
     * Retrieve the customers that are in specific room
     *
     * @param room number of room
     * @return list of customers or empty list in case there aren't customers hosted
     */
    public List<Customer> findCustomersInRoom(Room room) {
        List<Customer> customersList = new ArrayList<>();
        if (!hotel.isEmpty()) {
            for (Map.Entry<Room, List<Customer>> entry : hotel.entrySet()) {
                if (room.getNumber() == entry.getKey().getNumber()) {
                    customersList = entry.getValue();
                    break;
                }
            }
        }
        return customersList;
    }

    /**
     * Registers a new room in hotel. By default, the new room have an empty list of customers
     *
     * @param room the room to add
     * @return 0 in case successfully added or -1 in case of error
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
     * Deletes a room from hotel and their customers
     *
     * @param room the room to delete
     * @return 0 in case successfully deleted or -1 in case of error
     */
    public int deleteRoom(Room room) {
        if (hotel.containsKey(room)) {
            hotel.remove(room);
            return 0;
        }
        return -1;
    }

    /**
     * Modifies a room from hotel
     *
     * @param oldRoom the room with new values
     * @param newRoom the room with current values
     * @return
     */
    public int modifyRoom(Room oldRoom, Room newRoom) {
        if (hotel.containsKey(oldRoom)) {
            List<Customer> currentCustomers = findCustomersInRoom(oldRoom);
            if (oldRoom.getNumber() != newRoom.getNumber()) hotel.remove(oldRoom);
            hotel.put(newRoom, currentCustomers);
            return 0;
        }
        return -1;
    }

    /**
     * Check in to the customers to be hosted in a room
     *
     * @param room      room to be checked in
     * @param customers list of customers to be hosted
     * @return 0 in case successfully checked in or -1 in case of error
     */
    public int checkInCustomers(Room room, List<Customer> customers) {
        if (hotel.containsKey(room)) {
            hotel.put(room, customers);
            return 0;
        }
        return -1;
    }

    /**
     * Check out to the customers that are host in a room
     *
     * @param room the room to check out
     * @return 0 in case successfully checked out -1 in case of error
     */
    public int checkOutCustomers(Room room) {
        if (hotel.containsKey(room)) {
            List<Customer> empty = new ArrayList<>();
            hotel.put(room, empty);
            return 0;
        }
        return -1;
    }

    /**
     * Retrieves a room from data source
     *
     * @param room the room to find
     * @return a room or null in case not found
     */
    public Room findRoom(Room room) {
        for (Map.Entry<Room, List<Customer>> entry : hotel.entrySet()) {
            if (room.getNumber() == entry.getKey().getNumber()) return entry.getKey();
        }
        return null;
    }

    /**
     * Retrieves possible rooms that match with what customer needs from data source
     *
     * @param capacity quantity of customers
     * @param category type of category
     * @return a list of rooms or empty list in case not found
     */
    public List<Room> getRoomsToCustomers(int capacity, Category category) {
        List<Room> rooms = new ArrayList<>();
        if (capacity > 0) {
            if (!hotel.isEmpty()) {
                hotel.forEach((k, v) -> {
                    if (k.getCapacity() >= capacity && k.getCategory() == category && v.isEmpty()) rooms.add(k);
                });
            }
        }
        return rooms;
    }
}
