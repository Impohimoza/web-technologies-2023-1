class Pizza {
    constructor(type, size) {
        const types = {
            Margarita: { price: 500, calories: 300 },
            Pepperoni: { price: 800, calories: 400 },
            Bavarian: { price: 700, calories: 450 }
        };

        const sizes = {
            Large: { price: 200, calories: 200 },
            Small: { price: 100, calories: 100 }
        }
        
        this.kind = type;
        this.basePrice = types[type].price + sizes[size].price;
        this.baseCalories = types[type].calories + sizes[size].calories;
        this.toppings = [];
        this.size = size;  
    }

    addTopping(topping) {
        const toppingDetails = {
            "mozzarella": { price: this.size === "Large" ? 100 : 50, calories: 20  },
            "cheeseEdge": { price: this.size === "Large" ? 300 : 150, calories: 50 },
            "cheddarParmesan": { price: this.size === "Large" ? 300 : 150, calories: 50 }
        };
        this.toppings.push({ topping, ...toppingDetails[topping] });
    }

    removeTopping(topping) {
        this.toppings = this.toppings.filter(t => t.topping !== topping);
    }

    getToppings() {
        return this.toppings.map(t => t.topping);
    }


    getSize() {
        return this.size;
    }

    calculatePrice() {
        return this.basePrice + this.toppings.reduce((sum, cur) => sum + cur.price, 0);
    }

    calculateCalories() {
        return this.baseCalories + this.toppings.reduce((sum, cur) => sum + cur.calories, 0);
    }

    getKind = () => this.kind
}


let myPizza = new Pizza("Pepperoni", "Large");
myPizza.addTopping("cheeseEdge");
myPizza.addTopping("mozzarella");
console.log(`Total price: ${myPizza.calculatePrice()} rubles`);
console.log(`Total calories: ${myPizza.calculateCalories()} calories`);
console.log(`${myPizza.getSize()}`)
