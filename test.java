class Animal{
    protected String nama;

    public String getNama() {
        return nama;
    }
}

class Dog extends Animal {
    protected String nama = "Dog";
}

public class test {
    public static void main(String[] args) {
        Dog dog = new Dog();
System.out.println(dog.getNama());
    }
}