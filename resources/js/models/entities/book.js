class Book {
    constructor(id, title, slug, thumbnail, price, rating, buy_quantity, description, created_at, updated_at) {
        this.id = id;
        this.title = title;
        this.slug = slug;
        this.thumbnail = thumbnail;
        this.price = price;
        this.rating = rating;
        this.buy_quantity = buy_quantity;
        this.description = description;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }

    static fromJson(json) {
        return new Book(
            json.id,
            json.title,
            json.slug,
            json.thumbnail,
            json.price,
            json.rating,
            json.buy_quantity,
            json.description,
            json.created_at,
            json.updated_at
        );
    }
}

window.Book = Book;