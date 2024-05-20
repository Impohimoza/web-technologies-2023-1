class Pizza {
    constructor(type, size) {
        const types = {
            "Маргарита": { price: 500, calories: 300 },
            "Пепперони": { price: 800, calories: 400 },
            "Баварская": { price: 700, calories: 450 }
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
            "Сливочная моцарелла": { price: this.size === "Large" ? 100 : 50, calories: 20  },
            "Сырный борт": { price: this.size === "Large" ? 300 : 150, calories: 50 },
            "Чеддр и пармезан": { price: this.size === "Large" ? 300 : 150, calories: 50 }
        };
        this.toppings.push({ topping, ...toppingDetails[topping] });
    }

    removeTopping(topping) {
        let index = this.toppings.findIndex((top) => top.topping===topping);
        this.toppings.splice(index,1);
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


    let customPizza;
    function choosePizza(chosenPizza) {
    customPizza = chosenPizza;
    document.querySelectorAll('.pizza-item').forEach(item => item.style.border = '');
    document.querySelectorAll('.quantity').forEach(item => item.innerText = '0');
    document.getElementById(chosenPizza.getKind()).style.border='5px solid orange';
    document.getElementById('add-2-cart').textContent = `${customPizza.calculatePrice()} руб., (${customPizza.calculateCalories()} кКал)`;
    document.getElementById('radioS').checked = '0';

}

function resizePizza(){
    if (document.getElementById('radioS').checked == '1') {
        customPizza.size="Small";
        customPizza.basePrice-= 100;
        customPizza.baseCalories-= 100;
        customPizza.toppings.forEach((item)=> {item.price/=2;});
    } 
    else{
        customPizza.size="Large";
        customPizza.basePrice+= 100;
        customPizza.baseCalories+= 100;
        customPizza.toppings.forEach((item)=> {item.price*=2;});
    }

    document.getElementById('add-2-cart').textContent = `${customPizza.calculatePrice()} руб., (${customPizza.calculateCalories()} кКал)`;
}

function addTop(toppingOption)
{
    let option = toppingOption.parentNode.previousSibling.previousSibling.previousSibling.previousSibling;
    let quantity = toppingOption.previousSibling.previousSibling;
    console.log(quantity.innerText++);
    let toppingName = option.textContent.trim();
    console.log(toppingName);
    customPizza.addTopping(toppingName);
    document.getElementById('add-2-cart').textContent = `${customPizza.calculatePrice()} руб., (${customPizza.calculateCalories()} кКал)`;
}
function remTop(toppingOption){
    let option = toppingOption.parentNode.previousSibling.previousSibling.previousSibling.previousSibling;
    let quantity = toppingOption.nextSibling.nextSibling;

    if(+quantity.innerText>0) {
    console.log(quantity.innerText--)
    let toppingName = option.textContent.trim();
    console.log(toppingName)
    customPizza.removeTopping(toppingName);
    document.getElementById('add-2-cart').textContent = `${customPizza.calculatePrice()} руб., (${customPizza.calculateCalories()} кКал)`;
}
}
