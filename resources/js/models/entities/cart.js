class Cart {
    constructor(id, bookId, quantity, userId) {
        this.id = id;
        this.bookId = bookId;
        this.quantity = quantity;
        this.userId = userId;
    }

    static fromJson(json) {
        return new Cart(
            json.id,
            json.bookId,
            json.quantity,
            json.userId
        );
    }

}

window.Cart = Cart;