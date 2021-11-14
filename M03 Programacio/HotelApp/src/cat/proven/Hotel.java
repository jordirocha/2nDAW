package cat.proven;

import java.util.*;

public class Hotel {

    private Map<Room, List<Customer>> hotel;

    public Hotel() {
        hotel = new HashMap<>();
        initData();
    }

    private void initData() {
        Room room1 = new Room(1, 30, 90, Category.STANDARD);
        List<Customer> customersRoom1 = new ArrayList<>();
        customersRoom1.add(new Customer("343444", "Jordi"));
        customersRoom1.add(new Customer("475875", "Paula"));
        customersRoom1.add(new Customer("234532", "Ines"));
        customersRoom1.add(new Customer("256475", "David"));
        customersRoom1.add(new Customer("967892", "Pedro"));
        List<Customer> customersRoom2 = new ArrayList<>();
        customersRoom2.add(new Customer("256475", "Daniel"));
        customersRoom2.add(new Customer("967892", "Belen"));
        hotel.put(room1, customersRoom1);
        hotel.put(new Room(2, 5, 180, Category.SUPERIOR), customersRoom1);
        hotel.put(new Room(3, 9, 70, Category.SUITE), customersRoom1);
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
    public List<Customer> getCustomers() {
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
    public List<Customer> getCustomersByCode(int room) {
        List<Customer> customersList = new ArrayList<>();
        if (!hotel.isEmpty()) {
            for (Map.Entry<Room, List<Customer>> entry : hotel.entrySet()) {
                if (room == entry.getKey().number) {
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
     * @return true in case successfully added or false otherwise
     */
    public boolean addRoom(Room room) {
        if (!hotel.containsKey(room)) {
            List<Customer> customersList = new ArrayList<>();
             hotel.put(room, customersList);
             return true;
        }
        return false;
    }

    /**
     * Delete a room from hotel
     *
     * @param room the room to delete
     * @return true in case successfully added or false otherwise
     */
    public boolean deleteRoom(Room room) {
        return false;
    }

    /**
     * Modifies a room from hotel
     *
     * @param room the room to modify
     * @return true in case successfully added or false otherwise
     */
    public boolean modifyRoom(Room room) {
        return false;
    }

    /**
     * @param category
     * @return
     */
    public boolean checkInClients(String category) {
        return false;
    }

    /**
     * @param category
     * @return
     */
    public boolean checkOutClients(String category) {
        return false;
    }

    /**
     * Retrieves the percentage of used rooms from hotel
     *
     * @return a percentage or 0 in case there aren't used room
     */
    public double getPercentageHotel() {
        return 0;
    }

    public boolean exitsRoom(int room) {
        return false;
    }

}
